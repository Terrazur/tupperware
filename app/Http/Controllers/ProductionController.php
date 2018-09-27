<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Input;

class ProductionController extends Controller
{
    public function updateStatus(Request $request){
    	$id=$request->input('order_id');
        echo $id;

    	$finds = Order::all();

        foreach ($finds as $find) {
            if ($find->order_id == $id) {
                echo $find->order_status;
                if ($find->order_status == 'SP') {
                    echo "test";
                    $update=array(
                        'order_status' => 'OP1'
                    );
                    Order::where('order_id',$id)->update($update);
                }
                elseif ($find->order_status == 'OP1') {
                    $update=array(
                        'order_status' => 'OP2'
                    );
                    Order::where('order_id',$id)->update($update);
                }
                elseif ($find->order_status == 'OP1') {
                    $update=array(
                        'order_status' => 'OP2'
                    );
                    Order::where('order_id',$id)->update($update);
                }
                elseif ($find->order_status == 'OP2') {
                    $update=array(
                        'order_status' => 'OD'
                    );
                    Order::where('order_id',$id)->update($update);
                }
                elseif ($find->order_status == 'OD') {
                    $update=array(
                        'order_status' => 'AR'
                    );
                    Order::where('order_id',$id)->update($update);
                }
                elseif ($find->order_status == 'AR') {
                    $update=array(
                        'order_status' => 'DONE'
                    );
                    Order::where('order_id',$id)->update($update);
                }
            }
        }
    	return redirect('home');
    }

    public function verifyOrder(Request $request){
        $id=$request->input('order_id');

        $update=array(
            'order_status' => 'Done',
        );

        Order::where('order_id', $id)->update($update);

        return redirect('home');
    }
}
