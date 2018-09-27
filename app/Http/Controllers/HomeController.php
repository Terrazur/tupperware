<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\User;
use App\topUp;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $users = User::all();
        $tops = topUp::all();

        $ttlTop = topUp::where('status', 'NV')->count();
        $ttlOdr = Order::where([['pay_status', 'NV'], ['pay_method', 'Cash']])->count();

        // if (Auth::user()->role == 'CST') {
        //     return view('home', compact('orders'));
        // }
        
        if(Auth::user()->role == 'CS' || Auth::user()->role == 'PD'){
            return view('adminView', compact('orders','users','tops','ttlTop','ttlOdr'));
        }

        
            return view('home', compact('orders'));
        
    }
}
