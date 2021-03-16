<?php

namespace App\Http\Controllers\AdminPanel\employe;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersPipesExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PipesExtension extends Controller
{
    public function index($orderId)
    {
        $order=Order::find($orderId);
        return view('employe.PipesExtension.index',['order'=>$order]);
    }

    public function getRow(Request $request)
    {
        return (string)view('employe.PipesExtension.PipesElement', ['id' => $request->rowId]);
    }

    public function createNewPipes(Request $request)
    {
        // validate our request
        $validate = Validator::make($request->all(), [
            'orderId'=>'required|integer|exists:orders,id',
            'name' => 'required|min:3',
            'phone' => 'required|min:3',
            'total_invoice' => 'required|numeric',
            'numberofRow' => 'required|integer',
            'cityId'=>'required|integer|exists:cities,id',
        ]);
        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);

        // now check if the user is employe
        if (Auth::user()->type == "admin")
            return response()->json(['status' => 402]);

        // now check if the exist an element
        if ($request->total_invoice == 0)
            return response()->json(['status' => 401]);


        // now create Our Order in Detail
        $order = Order::addEdit($request->name, $request->phone, $request->address,"pipes_extension",$request->desciption, $request->total_invoice, Auth::user()->id,$request->orderId,$request->cityId);
        OrdersPipesExtension::where('order_id','=',$request->orderId)->delete();
        for ($i = 0; $i <= $request->numberofRow; $i++) {
            if ($request->has('service_type_' . $i) == true) {
                OrdersPipesExtension::addEdit($order->id, $request['service_type_' . $i], $request['room_number_' . $i], $request['meters_number_' . $i], $request['conditioners_number_' . $i], $request['meter_price_' . $i], $request['total_' . $i], $request['payment_type_' . $i]);
            }
        }

        Order::updatCalTotalTax($order->id);
        return response()->json(['status' => 200, 'messsage' => 'Order Number is ' . $order->orderName()]);
    }
}
