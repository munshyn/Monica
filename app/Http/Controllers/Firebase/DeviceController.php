<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Charts\CO2;

class DeviceController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $devRef = app('firebase.firestore')->database()->collection('Devices')->documents();

        foreach($devRef as $secret)
        {
            if($secret->id() == $request->secret_key)
            {
                $setNew = app('firebase.firestore')->database()->collection('Devices')->document($secret->id())->snapshot();

                if($setNew->data()['userID'] == 0 )
                {
                    $setNew->set([
                        'userID' => Auth::user()->id,
                        'deviceName' => $request->device_name
                    ]);
                    $add = app('firebase.firestore')->database()->collection(Auth::user()->name)->document($secret->id());
                    $add->set([
                        'userID' => Auth::user()->id,
                        'deviceName' => $request->device_name
                    ]);

                    return redirect()->back()->with('status', 'Device Added Successfully');
                }
                else
                    return redirect()->back()->with('fail', 'Device is already in use!');

            }
            else
                continue;
        }
        return redirect()->back()->with('fail', 'Device No Found!');
        
    }

    public function dashboard(Request $request){
        //$current_date_time = Carbon::now()->toDateTimeString();
        $current_timestamp = Carbon::now()->timestamp;
        $first_time=1641059558;
        //1640962800;
        //3600 in one hour
        $i=1;
        $w=$current_timestamp-$first_time;
        $w=$w/604800;
        $w=(int)$w;
        $i=$i+$w;
        $week="week".$i;

        $i=1;
        $d=$current_timestamp-$first_time;
        $d=$d/86400;
        $d=(int)$d;
        $i=$i+$d;
        $day="day".$i;
        //area chart
        $data = app('firebase.firestore')->database()->collection('Devices')->document($request->secret)->collection('data')->document($week)->collection($day)->documents();
        $jam=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,);

        for($i=0;$i<24;$i++){
            foreach( $data as $hour){
                $h="hour".$i;
                if($h==$hour->id())
                    $jam[$i]=$hour->data()['CO2'];
     
            }
        }
        $achart=new CO2;
        $achart->labels(['12.00 A.M','1.00 A.M','2.00 A.M','3.00 A.M','4.00 A.M','5.00 A.M','6.00 A.M','7.00 A.M','8.00 A.M','9.00 A.M','10.00 A.M','11.00 A.M','12.00 P.M','1.00 P.M','2.00 P.M','3.00 P.M','4.00 P.M','5.00 P.M','6.00 P.M','7.00 P.M','8.00 P.M','9.00 P.M','10.00 P.M','11.00 P.M']);
        $achart->dataset('CO2','line',[$jam[0],$jam[1],$jam[2],$jam[3],$jam[4],$jam[5],$jam[6],$jam[7],$jam[8],$jam[9],$jam[10],$jam[11],$jam[12],$jam[13],$jam[14],$jam[15],$jam[16],$jam[17],$jam[18],$jam[19],$jam[20],$jam[21],$jam[22],$jam[23]]);
        //Bar chart
        $d=array(0,0,0,0,0,0,0);
        for($x=0;$x<8;$x++){
            $y=$x+1;
            $data = app('firebase.firestore')->database()->collection('Devices')->document($request->secret)->collection('data')->document($week)->collection('day'.$y)->documents();
            foreach( $data as $hari){
                $d[$x]=$hari->data()['CO2'];
                break;
            }
        }
        $bchart=new CO2;
        $bchart->labels(['SUNDAY','MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY']);
        $bchart->dataset('CO2','bar',[$d[0],$d[1],$d[2],$d[3],$d[4],$d[5],$d[6]]);


        return view('Firebase.dashboard', compact('achart','bchart'));
    }
}