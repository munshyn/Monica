<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

                if($setNew->data()['userID'] == '')
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
        $first_time=1640962800;
        //3600 in one hour
        $i=1;
        $w=$current_timestamp-$first_time;
        $w=$w/604800;
        $w=(int)$w;
        $i=$i+$w;
        $week="week".$i;
        // for($i=0;$current_timestamp>$first_time;$current_timestamp-604800){
        //     $i++;
        // }
        $i=1;
        $d=$current_timestamp-$first_time;
        $d=$d/86400;
        $d=(int)$d;
        $i=$i+$d;
        $day="day".$i;
        // $current_timestamp = now()->timestamp;
        // for($i=0;$current_timestamp<$first_time;$current_timestamp-86400){
        //     $i++;
        //     if($i==8){
        //         $i=1;
        //     }
        // }
        //$day="day".$i;

        $data = app('firebase.firestore')->database()->collection('Devices')->document($request->secret)->collection('data')->document($week)->collection($day)->documents();
        return view('firebase.dashboard', compact('data'));
    }
}
{{  }}{{  }}