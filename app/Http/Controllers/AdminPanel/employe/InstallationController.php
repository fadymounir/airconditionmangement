<?php

namespace App\Http\Controllers\AdminPanel\employe;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersInstallation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class InstallationController extends Controller
{
    public function index($orderId)
    {
        $order=Order::find($orderId);
        return view('employe.Installation.index',['order'=>$order]);
    }


    public function getRow(Request $request)
    {
        return (string)view('employe.Installation.installationElement', ['id' => $request->rowId]);
    }


    public function creeNewInstallation(Request $request)
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
        $order = Order::addEdit($request->name, $request->phone,$request->address, "Installation",$request->desciption, $request->total_invoice, Auth::user()->id,$request->orderId,$request->cityId);

        // now create the order detail in installation table
        OrdersInstallation::where('order_id','=',$order->id)->delete();
        for ($i = 0; $i <= $request->numberofRow; $i++) {
            if ($request->has('service_type_' . $i) == true) {
                OrdersInstallation::addEdit($request['service_type_' . $i],
                    $request['conditioner_type_' . $i],
                    $request['quantity_' . $i],
                    $request['pipes_meters_' . $i],
                    $request['chairs_number_' . $i],
                    $request['total_' . $i],
                    $request['payment_type_' . $i],
                    $order->id);
            }
        }

        Order::updatCalTotalTax($order->id);


        return response()->json(['status' => 200, 'messsage' => 'Order Number is ' . $order->orderName()]);
    }


}
