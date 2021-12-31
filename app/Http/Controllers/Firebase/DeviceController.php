<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        $devicekey = $this->database->getReference('test/hus')->getSnapshot();

        $devRef = app('firebase.firestore')->database()->collection('Devices')->document($request->secret_key);
        $devRef->set([
            'userID' => Auth::user()->id,
            'userName' => Auth::user()->name,
            'deviceName' => $request->device_name,
            'currentValue' => $devicekey->getValue()
        ]);

        return redirect('firebase.add')->with('status', 'Device Added Successfully');
    }

    public function dashboard(Request $request){
        return view('firebase.dashboard');
    }
}
