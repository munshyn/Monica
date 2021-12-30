<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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

        return view('profile');
    }
    public function edit()
    {

        return view('edit');
    }

    public function new(Request $request)
    {
        $name=$request->name;
        $email=$request->email;
        $user=Auth::user()->name;
        DB::update('update users set name = ?, email= ? where name = ?',
        [$name,$email,$user]);
        
        return back()->with('status', 'Successfully updated');
    }
}
