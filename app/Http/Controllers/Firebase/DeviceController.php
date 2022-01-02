<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $devRef = app('firebase.firestore')->database()->collection('Devices');

        foreach($devRef as $secret)
        {
            if($secret == $request->secret_key)
            {
                $devRef->document($secret)->set([
                    'userID' => Auth::user()->id,
                    'userName' => Auth::user()->name,
                    'deviceName' => $request->device_name
                ]);

                $add = app('firebase.firestore')->database()->collection('Users')->document(Auth::user()->name);
                $add->set([
                    'userID' => Auth::user()->id,
                    'userName' => Auth::user()->name,
                    'secretKey' => $secret,
                    'deviceName' => $request->device_name
                ]);

                // return redirect('firebase.add')->with('status', 'Device Added Successfully');
            }
            else
                continue;
        }
        return redirect()->back()->with('status', 'Device Added Successfully');
    }

    public function dashboard(Request $request){
        return view('firebase.dashboard');
    }
}
