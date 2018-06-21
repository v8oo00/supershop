<?php

namespace App\Http\Controllers;

use Auth;
use App\Sku;
use App\Cart;
use App\User;
use App\Order;
use App\Address;
use App\Commodity;
use App\Order_details;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //生成订单页面
    public function index(){
        //查询购物车中的数据
        $carts = Cart::where('uid',Auth::id())->with('commodities','sku')->get();

        //查询用户的地址
        $address = Address::where('uid',Auth::id())->get();

        return view('home.order.index',compact('address','carts'));
    }

    //添加订单
    public function add(Request $request){

        //判断用户的余额是否能够买该订单的商品
        if(Auth::user()->money > $request->total){
            //先减去用户的消费
            User::findOrFail(Auth::id())->update(['money'=>Auth::user()->money - $request->total]);

            //再插入订单表
            $order = Order::create([
                'order_num' => $this->getOrderNum(32),
                'uid' => Auth::id(),
                'address_id' => $request->address_id,
                'total' => $request->total,
                'status' => 0 // 0 新订单 1 已发货  2 已收货
            ]);

            //接下来插入订单详情表
            $carts = Cart::where('uid',Auth::id())->get();
            foreach($carts as $cart){
                //插入订单详情表
                Order_details::create([
                    'order_id' => $order->id,
                    'sku_id' => $cart['sku_id'],
                    'num' => $cart['num']
                ]);

                //减少商品的sku库存
                $sku = Sku::findOrFail($cart['sku_id']);
                $sku->update(['stock'=>$sku->stock - $cart['num']]);

                //增加商品表的售量
                $commodity = Commodity::findOrFail($cart['c_id']);
                $commodity->update(['sale'=>$commodity->sale + $cart['num']]);
            }

            //清空该用户的购物车
            Cart::where('uid',Auth::id())->delete();

            return redirect('/order/success/'.$order->id);

        }else{

            flash("<a href='/account' style='color:black;'>您的余额不足，点击前往个人中心充值</a>")->error()->important();

            return back();
        }

    }

    //订单成功页面
    public function order_suc($id){
        $order = Order::findOrFail($id);
        $address = Address::findOrFail($order->address_id);
        return view('home.order.order_suc',compact('order','address'));
    }

    //生成32位随机数
    public function getOrderNum($length){
		$str = null;
		$strPol = "0123456789";
		$max = strlen($strPol)-1;

		for($i=0;$i<$length;$i++){
			$str.=$strPol[rand(0,$max)];//生成字符串中随机的一个整数
		}
		return $str;
	}
}
