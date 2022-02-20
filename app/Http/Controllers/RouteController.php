<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class RouteController extends Controller
{
    public function index(){return view('index');}
    public function donate() {return view('donate');}
    public function login() {

        if(Session::has('NickName'))
            return redirect()->route('profile');

        return view('login');
    }

//    profile
    public function profile() {

        $users = DB::table('s_users')->where('Name', Session::get('NickName'))->first();
        $house = DB::table('house')->where('hOwner', Session::get('NickName'))->first();
        $businesses = DB::table('businesses')->where('bOwner', Session::get('NickName'))->first();
        $farms = DB::table('farms')->where('owner', Session::get('NickName'))->first();
        $cars = DB::table('s_vehicle_player')->where('vOwner', Session::get('user_id'))->select('vModel')->get();
        $admin = DB::table('s_admin')->where('Name', Session::get('NickName'))->first();

        if(!Session::has('NickName'))
            return redirect()->route('login');


        return view('profile.index', compact('users','admin', 'businesses', 'house', 'farms', 'cars'));
    }

    public function admin() {

        $users = DB::table('s_users')->count();
        $admin = DB::table('s_admin')->count();

        if(!Session::has('ANickName'))
            return redirect()->route('login');


        return view('admin.index', compact('admin', 'users'));
    }

    public function admins() {

        $admins = DB::table('s_admin')->get();

        if(!Session::has('ANickName'))
            return redirect()->route('login');

        return view('admin.admins', compact('admins'));
    }

    public function promocode() {

        $promocode = DB::table('s_promocode')->get();

        if(!Session::has('ANickName'))
            return redirect()->route('login');

        return view('admin.promocode', compact('promocode'));
    }

    public function update() {
        if(!Session::has('ANickName'))
            return redirect()->route('login');

        return view('admin.update');
    }

}
