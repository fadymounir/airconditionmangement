<?php

namespace App\Http\Controllers\AdminPanel\employe;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersMaintenance;
use App\Models\usersPurchases;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function index($orderId)
    {
        $order = Order::find($orderId);
        return view('employe.Maintenance.index', ['order' => $order]);
    }

    public function getRow(Request $request)
    {
        return (string)view('employe.Maintenance.MaintenanceElement', ['id' => $request->rowId]);
    }

    public function getRowPurchases(Request $request)
    {
        return (string)view('employe.Maintenance.MaintenancePurchasesElement', ['id' => $request->rowId]);
    }


    public function createNewMaintenance(Request $request)
    {
        // validate our request
        $validate = Validator::make($request->all(), [
            'orderId' => 'required|integer|exists:orders,id',
            'name' => 'required|min:3',
            'phone' => 'required|min:3',
            'total_invoice' => 'required|numeric',
            'numberofRow' => 'required|integer',
            'numberofRowPurchases' => 'required|integer',
            'cityId' => 'required|integer|exists:cities,id',
        ]);
        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);

        // now check if the user is employe
        if (Auth::user()->type == "admin")
            return response()->json(['status' => 402]);

        // now check if the exist an element
        if ($request->total_invoice == 0)
            return response()->json(['status' => 401]);


        // now create Our Order in Detail
        $order = Order::addEdit($request->name, $request->phone, $request->address, "maintenance", $request->desciption, $request->total_invoice, Auth::user()->id, $request->orderId, $request->cityId);

            // now create the order detail in maintenance table
            OrdersMaintenance::where('order_id', '=', $request->orderId)->delete();


        for ($i = 0; $i <= $request->numberofRow; $i++) {
            if ($request->has('conditioner_type_' . $i) == true) {
                OrdersMaintenance::addEdit($order->id, $request['maintaince_id_' . $i], $request['conditioner_type_' . $i], $request['service_pirce_' . $i], $request['quantity_' . $i], $request['total_' . $i], $request['payment_type_' . $i]);
            }
        }

        // now create the purchases if it exists
        usersPurchases::where('orders_maintenance_id', '=', $request->orderId)->delete();
        for ($i = 0; $i <= $request->numberofRowPurchases; $i++) {
            if ($request->has('purchases_id_' . $i) == true) {

                $bill = null;
                if ($request->file('bill_' . $i) == true) $bill = $request['bill_' . $i];

                usersPurchases::addEdit($order->id, $request['purchases_id_' . $i], $request['quantity_purchases_' . $i], $request['total_purchases_' . $i], $bill, Auth::user()->id);
            }
        }
        Order::updatCalTotalTax($order->id);

        return response()->json(['status' => 200, 'messsage' => 'Order Number is ' . $order->orderName()]);
    }
}
