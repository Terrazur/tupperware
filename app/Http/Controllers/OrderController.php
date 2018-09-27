<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Template;
use Image;

class OrderController extends Controller
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
        $templates = Template::all();
        $i = 0;
        return view('order',compact('templates', 'i'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pay_type = $request->input('pay_method');
        $all_price= $request->input('total');

        if ($pay_type == 'Cash') {
            $status = 'P';
            $py_stat= 'NV';
        }
        elseif ($pay_type == 'Tupperware Wallet') { 
            $user = Auth::user();
            if ($all_price > $user->wallet) {
                return redirect()->back()->with('danger', 'Jumlah Saldo Tupperware anda tidak cukup! Silahkan Top Up terlebih dahulu!');
            }

            else{
                $status = 'SP';
                $py_stat= 'V;';

                
                $user->wallet = $user->wallet - $all_price;
                $user->save();    
            }
        }

        if ($request->hasFile('designs')) {
            $design = $request->file('designs');
            $filename = Auth::user()->name.time().'.'.$design->getClientOriginalExtension();
            Image::make($design)->save(public_path('../resources/assets/img/product/custom/'.$filename));

            Order::create([
                'user_id' => $request['user_id'],
                'color' => $request['color'],
                'design' => $filename,
                'design_type' => $request['dtype'],
                'item' => $request['type'],
                'qty' => $request['qty'],
                'pay_method' => $request['pay_method'],
                'pay_status' => $py_stat,
                'addr' => $request['addr'],
                'order_status' => $status,
            ]);
        }
        
        else{
            Order::create([
                'user_id' => $request['user_id'],
                'color' => $request['color'],
                'design' => $request['final'],
                'design_type' => $request['dtype'],
                'item' => $request['type'],
                'qty' => $request['qty'],
                'pay_method' => $request['pay_method'],
                'pay_status' => $py_stat,
                'addr' => $request['addr'],
                'order_status' => $status,
            ]);
        }

        return redirect('home');
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
    public function update(Request $request, $id)
    {
        //
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

    public function verify(Request $request)
    {
        $id = $request->input('order_id');

        $update = array(
            'pay_status'=>$request['payStatus'],
            'order_status'=>$request['orderStat'],
        );

        Order::where('order_id', $id)->update($update);
        
        return redirect('home');
    }
}
