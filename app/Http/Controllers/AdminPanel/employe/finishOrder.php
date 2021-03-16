<?php

namespace App\Http\Controllers\AdminPanel\employe;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersInstallation;
use App\Models\OrdersMaintenance;
use App\Models\OrdersPipesExtension;
use App\Models\OrdersPurchasesElement;
use App\Models\Product;
use App\Models\UserLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class finishOrder extends Controller
{
    public function finishOrder($order)
    {
        return view('employe.finishOrder', ['order' => Order::find($order)]);
    }

    public function finishOrderSubmit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'orderId' => 'required|integer|exists:orders,id',
            'name' => 'required|min:3',
            'phone' => 'required|min:3',
            'total_invoice' => 'required|numeric',
            'cityId' => 'required|integer|exists:cities,id',
            'date_action' => 'required'
        ]);
        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);


        // now check if the user is employe
        if (Auth::user()->type == "admin")
            return response()->json(['status' => 402]);

        // now check if the exist an element
        if ($request->total_invoice == 0)
            return response()->json(['status' => 401]);


        $logId=UserLog::getLogId(Auth::user()->id,Carbon::now());

        // now create Our Order in Detail
        $order = Order::addEdit($request->name, $request->phone, $request->address, "other", $request->desciption, $request->total_invoice, Auth::user()->id, $request->orderId, $request->cityId, $request->date_action,Carbon::now(),$logId);

        // now delete the order detail in installation table and check if the order installation element has an product so that we get the quantity back to thie product
        $OrdersInstallation=OrdersInstallation::where('order_id', '=', $order->id)->get();

        // chk if the order installation has an product and return it to the product quanttiy
        foreach ($OrdersInstallation as $row){
                if($row->product_id !=null)
                    Product::ProductQuantityAction($row->product_id,$row->quantity, "add");

                $row->delete();
        }

        // now delete the order detail in maintenance table
        OrdersMaintenance::where('order_id', '=', $request->orderId)->delete();
        // now delete the order detail in maintenance table
        OrdersPipesExtension::where('order_id', '=', $request->orderId)->delete();
        // now delete the order detail in elemetn table
        OrdersPurchasesElement::where('order_id', '=', $request->orderId)->delete();


        // now create the order details in all tables that we need
        /**
         * InstallationNumberofRow
         * MaintainceNumberofRow
         * pipesExtensionNumberofRow
         * orderElementNumberofRow
         */

        // installation
        for ($i = 0; $i <= $request->InstallationNumberofRow; $i++) {
            if ($request->has('installation_service_type_' . $i) == true) {

                $product_id=$request['installation_product_id_'.$i];
                $product_price=$request['installation_product_price_'.$i];
                if($product_id == "null"){
                    $product_price=null;
                    $product_id=null;
                }else{
                    // in that case we minus the product Quantity
                    Product::ProductQuantityAction($request['installation_product_id_'.$i],$request['installation_quantity_'.$i],"minus");
                }


                OrdersInstallation::addEdit($request['installation_service_type_' . $i],
                    $request['installation_conditioner_type_' . $i],
                    $request['installation_quantity_' . $i],
                    $request['installation_pipes_meters_' . $i],
                    $request['installation_chairs_number_' . $i],
                    $request['installation_total_' . $i],
                    $request['installation_payment_type_' . $i],
                    $order->id,
                    $product_id,
                    $product_price);
            }
        }

        // maintainece
        for ($i = 0; $i <= $request->MaintainceNumberofRow; $i++) {
            if ($request->has('maintaince_conditioner_type_' . $i) == true) {
                OrdersMaintenance::addEdit($order->id,
                    $request['maintaince_maintaince_id_' . $i],
                    $request['maintaince_conditioner_type_' . $i],
                    $request['maintaince_service_pirce_' . $i],
                    $request['maintaince_quantity_' . $i],
                    $request['maintaince_total_' . $i],
                    $request['maintaince_payment_type_' . $i
                ]);
            }
        }

        // pipes extension
        for ($i = 0; $i <= $request->pipesExtensionNumberofRow; $i++) {
            if ($request->has('pipes_service_type_' . $i) == true) {
                OrdersPipesExtension::addEdit($order->id,
                    $request['pipes_service_type_' . $i],
                    $request['pipes_room_number_' . $i],
                    $request['pipes_meters_number_' . $i],
                    $request['pipes_conditioners_number_' . $i],
                    $request['pipes_meter_price_' . $i],
                    $request['pipes_total_' . $i],
                    $request['pipes_payment_type_' . $i]);
            }
        }

        // order element
        for ($i = 0; $i <= $request->orderElementNumberofRow; $i++) {
            if ($request->has('orderElement_purchases_id_' . $i) == true) {
                OrdersPurchasesElement::addEdit($order->id,
                    $request['orderElement_purchases_id_' . $i],
                    $request['orderElement_quantity_' . $i]);
            }

        }

        // cal the  order and cal tax
        Order::updatCalTotalTax($order->id);



        return response()->json(['status' => 200,'messsage'=>"You Have Finish the order Number ".$order->id,'orderId'=>$order->id,'phone'=>$order->phone]);
    }
}
