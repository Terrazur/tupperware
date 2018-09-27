<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\topUp;
use App\User;
use Auth;

class TopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        topUp::create([
            'user_id' => $request['user_id'],
            'amount' => $request['final'],
            'status' => $request['status'],
        ]);

        return redirect('prof')->with('alert','Silahkan Melakukan Transfer ke 7991*nomor hp anda* untuk BCA atau 7229*nomor hp anda* untuk Mandiri');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
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

    public function verify(Request $request){
        $topup = $request->input('amount');
        $user = $request->input('user_id');
        $id = $request->input('id');
        $custs = User::all();
        foreach ($custs as $cust) {
            if ($cust->user_id == $user) {
                $wallet = $cust->wallet;
            }
        }
        
        $total = $topup + $wallet;

        $update = array(
            'wallet' => $total,
        );

        $upd1 = array(
            'status' => 'V',
        );

        User::where('user_id',$user)->update($update);
        topUp::where('id',$id)->update($upd1);

        return redirect('home'); 
    }
}
