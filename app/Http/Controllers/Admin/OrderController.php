<?php

namespace App\Http\Controllers\Admin;
use App\Order;
use App\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    //

    public function index(){
        $orders = Order::get();
        return view('admin.order.index',compact('orders'));
    }

    public function check_status(Request $request){
    // dd($request->id);
        $order = Order::findOrFail($request->id);
        if($order['status'] == 0){
            if($order->update(['status'=>1])){
                return 'warning';
            }else{
                return 'danger';
            }
        }else if($order['status'] == 1){
            if($order->update(['status'=>2])){
                return 'info';
            }else{
                return 'warning';
            }
        }else{
            return 'info';
        }

    }
}
