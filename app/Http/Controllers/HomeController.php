<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $deviceKey = app('firebase.firestore')->database()->collection('Users')->documents(Auth::user()->name);        

        return view('home', compact('deviceKey'));
    }

    public function add()
    {
        return view('firebase.add');
    }
}