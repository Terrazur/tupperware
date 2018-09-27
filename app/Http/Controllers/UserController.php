<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Input;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Res";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role == 'CST'){    
            return view('profileUpdate');
        }
        else{
            return view('adminUpdate');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role == 'CST') {
            $update = array(
                'name'=>$request['name'],
                'password'=> bcrypt($request['password']),
                'addr' => $request['addr'],
                'phone' => $request['phone'],
            );    
            User::where('user_id', $id)->update($update);
        
            return redirect('prof');
        }
        else{
            $update = array(
                
                'name' => $request['name'],
                'email' => $request['email'],
                'password'=>bcrypt($request['pass']),
            );
            User::where('user_id', $id)->update($update);
        
            return redirect('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
