<?php

namespace App\Http\Controllers\AdminPanel\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class reviewsController extends Controller
{
    public function index($orderId){
        $order=Order::find($orderId);

        if($order->Review != null)
            return redirect(route('adminpanel.orders.getOrderBill',['orderId'=>$orderId]));



        return view('rateOrder',['order'=>$order]);
    }


    public function submitRate(Request  $request){
        Review::addEdit($request->order_id,$request->customer_service_rate,$request->user_rate,$request->desciption);
        return response()->json(['status'=>200]);
    }
}
