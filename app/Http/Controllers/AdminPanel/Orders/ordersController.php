<?php

namespace App\Http\Controllers\AdminPanel\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderMaintenanceProblem;
use App\Models\OrderOfferProducts;
use App\Models\OrdersInstallation;
use App\Models\OrdersMaintenance;
use App\Models\OrdersPipesExtension;
use App\Models\OrdersPurchasesElement;
use App\Models\OrderWarrenty;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnValue;

class ordersController extends Controller
{
    public function index()
    {


        if (\request()->ajax()) {
            $orders = Order::query()->orderBy('id', 'DESC');

            $data_action = \request('_data_action', 'all');
            $orderStaus = \request('_orderStaus', 'all');

            if ($data_action != "all") $orders = $orders->whereDate('date_action', '=', $data_action);
            if ($orderStaus != "all"){
              if($orderStaus == "complete")
                  $orders = $orders->whereNotNull('closed_at');
              elseif($orderStaus == "notComplete")
                  $orders = $orders->whereNull('closed_at');
            }


            return datatables($orders)
                ->addColumn('checkbox_operation', function ($row) {
                    return view('dashboard.layouts.components.checkbox_operation', ['id' => $row->id]);
                })
                ->addColumn('orderId', function ($row) {
                    return view('dashboard.layouts.components.aTag', [
                        'name' => $row->orderName(),
                        'onclick' => 'orderDescriptionModal("orderInfo",' . $row->id . ')']);
                })
                ->addColumn('name', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->name]);
                })
                ->addColumn('updateInfo', function ($row) {
                    if ($row->service_type == "other")
                        return view('dashboard.layouts.components.spanTag', [
                            'name' => "<i class='fas fa-user-edit'></i>",
                            'class' => 'btn btn-success',
                            'onclick' => 'updateInfo("' . $row->id . '")'
                        ]);
                })
                ->addColumn('description', function ($row) {
                    return view('dashboard.layouts.components.spanTag', [
                        'name' => '<i class="fas fa-info"></i>',
                        'class' => 'btn btn-primary',
                        'onclick' => 'orderDescriptionModal("description",' . $row->id . ')']);
                })
                ->addColumn('city', function ($row) {
                    return $row->City->name_ar;
                })
                ->addColumn('phone', function ($row) {
                    return view('dashboard.layouts.components.aTag', ['link' => "tel:" . $row->phone, 'name' => $row->phone]);
                })
                ->addColumn('service_type', function ($row) {
                    if ($row->service_type == "other") $service_type = "صيانة وتركيبات";
                    else if ($row->service_type == "order_offer_product") $service_type = "طلب منتجات";
                    return view('dashboard.layouts.components.spanTag', ['name' => $service_type]);
                })
                ->addColumn('user', function ($row) {
                    if ($row->user_id != null)
                        return view('dashboard.layouts.components.spanTag', ['name' => $row->User->name]);
                })
                ->addColumn('addElement', function ($row) {
                    if ($row->service_type != "order_offer_product" && $row->closed_at == null)
                        return view('dashboard.layouts.components.spanTag', [
                            'name' => '<i class="fas fa-plus-square"></i>',
                            'class' => 'btn btn-danger',
                            'onclick' => 'adddetail(' . $row->id . ')']);
                })
                ->addColumn('ordersMaintenanceProblems', function ($row) {
                    if ($row->service_type != "order_offer_product" && $row->closed_at == null)
                        return view('dashboard.layouts.components.spanTag', [
                            'name' => '<i class="fas fa-notes-medical"></i>',
                            'class' => 'btn btn-success',
                            'onclick' => 'showOrdersMaintenanceProblems(' . $row->id . ')']);
                })
                ->addColumn('orderDetail', function ($row) {
                    return view('dashboard.layouts.components.spanTag',
                        ['name' => '<i class="fas fa-info-circle"></i> تفاصيل الطلب',
                            'class' => 'btn btn-info',
                            'onclick' => 'orderDetail("' . $row->service_type . '",' . $row->id . ');'
                        ]);
                })
                ->addColumn('orderBill', function ($row) {
                    return view('dashboard.layouts.components.aTag', [
                        'name' => '<i class="fas fa-money-bill"></i> الفاتورة',
                        'class' => 'btn btn-success',
                        'blank' => 'blank',
                        'link' => route('adminpanel.orders.getOrderBill', ['orderId' => $row->id])
                    ]);
                })
                ->addColumn('sendViaWhatsapp', function ($row) {
                    $message = "لاستخراج الفاتورة الخاصة بطلبك  برجاء الضغط علي الرابط التالي " . route('adminpanel.orders.rateOrder', ['orderId' => $row->id]);
                    $link = "https://api.whatsapp.com/send?phone=+966" . $row->phone . "&text=" . $message;
                    return view('dashboard.layouts.components.aTag', [
                        'name' => '<i class="fas fa-phone"></i>',
                        'class' => 'btn btn-info',
                        'blank' => 'blank',
                        'link' => $link
                    ]);


                })
                ->addColumn('is_closed', function ($row) {
                    return $row->closed_at;
                })
                ->addColumn('re_open', function ($row) {
                    if ($row->closed_at != null)
                        return view('dashboard.layouts.components.spanTag', [
                            'name' => '<i class="fas fa-info"></i> اعادة فتح',
                            'class' => 'btn btn-danger',
                            'onclick' => 'reopenOrder("' . $row->id . '");'
                        ]);
                })
                ->addColumn('date_action', function ($row) {
                    return $row->date_action;
                })
                ->setRowClass(function ($row) {
                    if ($row->closed_at == null) return "text text-danger";
                    else return "text text-success";
                })
                ->make();
        }

        return view('dashboard.Orders.index');
    }


    public function getOrderDetail(Request $request)
    {
        $orer = Order::find($request->orderId);
        if ($orer->service_type == "order_offer_product")
            return (string)view('dashboard.Orders.orderDetail.orderOfferProduct', ['Order' => $orer]);

        return (string)view('dashboard.Orders.orderDetail.generalOrderDetail', ['Order' => $orer]);
    }


    public function getOrderBill($orderId)
    {
        // get order Type
        $order = Order::find($orderId);
        return view('dashboard.Orders.orderBill.layout', ['order' => $order]);
    }

    public function createNewORder(Request $request)
    {
        $validateArray = [
            'addEditOrderType' => 'required',
            'name' => 'required|min:3',
            'phone' => 'required|min:3',
            'address' => 'required|min:3',
            'user_id' => 'required|integer|exists:users,id',
            'cityId' => 'required|integer|exists:cities,id',
//            'desciption'=>'required'
        ];

        if ($request->addEditOrderType == "add") {
            $validateArray['problemsId'] = "required|array";
            $validateArray['date_action'] = "required";
        }
        $validate = Validator::make($request->all(), $validateArray);


        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);

        // now create new order
        $addEditOrderId = $request->addEditOrderId;
        if ($request->addEditOrderType == "add") $addEditOrderId = null;
        $order = Order:: addEdit($request->name, $request->phone, $request->address, 'other', $request->desciption, 0, $request->user_id, $request->addEditOrderId, $request->cityId, $request->date_action);


        // create order Problems
        if ($request->problemsId != null) {
            OrderMaintenanceProblem::deleteFromOrder($order->id);
            foreach ($request->problemsId as $row)
                OrderMaintenanceProblem::addEdit($order->id, $row);
        }

        return response()->json(['status' => 200]);
    }


    public function createProductOffer()
    {
        return view('dashboard.Orders.createProductOffer');
    }

    public function getRowProduct(Request $request)
    {
        return (string)view('dashboard.Orders.productElement', ['id' => $request->id]);
    }

    public function createProductOfferSubmit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'phone' => 'required|min:3',
            'address' => 'required|min:3',
            'cityId' => 'required|integer|exists:cities,id',
            'total_invoice' => 'required|numeric',
            'date_action' => 'required',
        ]);
        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);


        if ($request->total_invoice == 0)
            return response()->json(['status' => 401]);

        $order = Order::addEdit($request->name, $request->phone, $request->address, "order_offer_product", $request->desciption, $request->total_invoice, null, null, $request->cityId, $request->date_action);


        // now create the order Detail
        for ($i = 0; $i <= $request->numberOfRows; $i++) {
            if ($request->has('product_id_' . $i) == true) {
                OrderOfferProducts::addEdit($order->id, $request['product_id_' . $i], $request['quantity_' . $i], $request['price_' . $i]);
            }
        }


        Order::updatCalTotalTax($order->id);

        return response()->json(['status' => 200]);
    }


    public function getOrderDescription(Request $request)
    {
        if ($request->type == "description")
            return Order::find($request->orderId)->desciption;
        else if ($request->type == "orderInfo")
            return (string)view('dashboard.Orders.orderElement.ulOrderInfo', ['order' => Order::find($request->orderId)]);
    }


    public function createOrderDetail(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'orderId' => 'required|integer|exists:orders,id',
            'serviceType' => 'required'
        ]);
        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);


        if ($request->serviceType == "Installation") {
            $product_id = $request->installation_product_id_1;
            $product_price = $request->installation_product_price_1;
            if ($product_id == "null") {
                $product_price = null;
                $product_id = null;
            } else {
                // in that case we minus the product Quantity
                Product::ProductQuantityAction($request->installation_product_id_1, $request->installation_quantity_1, "minus");
            }
            OrdersInstallation::addEdit($request->installation_service_type_1, $request->installation_conditioner_type_1, $request->installation_quantity_1, $request->installation_pipes_meters_1, $request->installation_chairs_number_1, $request->installation_total_1, $request->installation_payment_type_1, $request->orderId, $product_id, $product_price);

        } elseif ($request->serviceType == "maintenance")
            OrdersMaintenance::addEdit($request->orderId, $request->maintaince_maintaince_id_1, $request->maintaince_conditioner_type_1, $request->maintaince_service_pirce_1, $request->maintaince_quantity_1, $request->maintaince_total_1, $request->maintaince_payment_type_1);
        elseif ($request->serviceType == "pipes_extension")
            OrdersPipesExtension::addEdit($request->orderId, $request->pipes_service_type_1, $request->pipes_room_number_1, $request->pipes_meters_number_1, $request->pipes_conditioners_number_1, $request->pipes_meter_price_1, $request->pipes_total_1, $request->pipes_payment_type_1);


        // cal the  order and cal tax
        Order::updatCalTotalTax($request->orderId);

        return response()->json(['status' => 200]);

    }


    public function reopenOrder(Request $request)
    {
        Order::find($request->orderId)->update(['closed_at' => null]);
        OrderWarrenty::addEdit($request->description, $request->orderId);
        return response()->json(['status' => 200]);
    }


    public function showMaintenanceProblems(Request $request)
    {
        if (Auth::user()->type == "admin") $select = 'maintenance_problems.name_ar as name';
        else $select = 'maintenance_problems.name_en as name';
        $items = OrderMaintenanceProblem::where('order_id', $request->orderId)
            ->join('maintenance_problems', 'orders_maintenance_problems.maintenance_problems', 'maintenance_problems.id')
            ->select($select)->get();
        return (string)view('dashboard.layouts.tools.list', ['rows' => $items]);
    }


    public function deleteElement(Request $request)
    {

        if ($request->type == "Installation") {
            $element = OrdersInstallation::find($request->orderElementId);
            $orderId = $element->order_id;
            // chk if the elemtn has an product so that we in add the quantity on it
            if ($element->product_id != null)
                Product::ProductQuantityAction($element->product_id, $element->quantity, "add");

            $element->delete();

        } elseif ($request->type == "Maintenance") {
            $element = OrdersMaintenance::find($request->orderElementId);
            $orderId = $element->order_id;
            $element->delete();
        } elseif ($request->type == "PipesExtension") {
            $element = OrdersPipesExtension::find($request->orderElementId);
            $orderId = $element->order_id;
            $element->delete();
        } elseif ($request->type == "order_offer_product") {
            $element = OrderOfferProducts::find($request->orderElementId);
            $orderId = $element->order_id;
            $element->delete();
        } elseif ($request->type == "orderElement") {
            $element = OrdersPurchasesElement::find($request->orderElementId);
            $orderId = $element->order_id;
            $element->delete();
        } else  return response()->json(['status' => 400]);


        Order::updatCalTotalTax($orderId);
        return response()->json(['status' => 200, 'orderId' => $orderId]);
    }


    public function getRecord(Request $request)
    {
        return Order::find($request->orderId);
    }

}
