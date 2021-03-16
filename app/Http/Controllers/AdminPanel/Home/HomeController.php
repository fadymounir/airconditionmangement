<?php

namespace App\Http\Controllers\AdminPanel\Home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersInstallation;
use App\Models\OrdersMaintenance;
use App\Models\OrdersPipesExtension;
use App\Models\OrdersPurchasesElement;
use App\Models\OrderWarrenty;
use App\Models\UserLog;
use App\Models\usersPurchases;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.Home.index');
    }


    public function fetchingStats(Request $request)
    {

        if ($request->dateFrom != null && $request->dateTo != null)
            if ($request->dateFrom > $request->dateTo)
                return response()->json(['status' => 400]);

        $getOrders = Order::query();
        $OrdersInstallation = OrdersInstallation::join('orders', 'orders.id', 'orders_Installation.order_id');
        $OrdersPipesExtension = OrdersPipesExtension::join('orders', 'orders.id', 'orders_pipes_extension.order_id');
        $OrdersMaintenance = OrdersMaintenance::join('orders', 'orders.id', 'orders_maintenance.order_id');
        $purchases = usersPurchases::query();
        $warrenty = OrderWarrenty::query();
        $orderElement = OrdersPurchasesElement::query();


        if ($request->dateFrom != null) {
            $getOrders = $getOrders->where('created_at', '>=', $request->dateFrom);
            $OrdersInstallation = $OrdersInstallation->where('orders_Installation.created_at', '>=', $request->dateFrom);
            $OrdersPipesExtension = $OrdersPipesExtension->where('orders_pipes_extension.created_at', '>=', $request->dateFrom);
            $OrdersMaintenance = $OrdersMaintenance->where('orders_maintenance.created_at', '>=', $request->dateFrom);
            $purchases = $purchases->where('users_purchases.created_at', '>=', $request->dateFrom);
            $warrenty = $warrenty->where('created_at', '>=', $request->dateFrom);
            $orderElement = $orderElement->where('created_at', '>=', $request->dateFrom);

        }
        if ($request->dateTo != null) {
            $getOrders = $getOrders->where('created_at', '<=', $request->dateTo);
            $OrdersInstallation = $OrdersInstallation->where('orders_Installation.created_at', '<=', $request->dateTo);
            $OrdersPipesExtension = $OrdersPipesExtension->where('orders_pipes_extension.created_at', '<=', $request->dateTo);
            $OrdersMaintenance = $OrdersMaintenance->where('orders_maintenance.created_at', '<=', $request->dateTo);
            $purchases = $purchases->where('users_purchases.created_at', '<=', $request->dateTo);
            $warrenty = $warrenty->where('created_at', '<=', $request->dateTo);
            $orderElement = $orderElement->where('created_at', '<=', $request->dateTo);
        }


        $OrdersInstallation = $OrdersInstallation->selectRaw("
                        COUNT(IF(!isNULL(orders.closed_at),1, NULL)) as   installationClosed,
                        COUNT(IF(isNULL(orders.closed_at),1, NULL)) as   installationOpen")->first();

        $OrdersPipesExtension = $OrdersPipesExtension->selectRaw("
                COUNT(IF(!isNULL(orders.closed_at),1, NULL)) as   pipes_extensionClosed,
                COUNT(IF(isNULL(orders.closed_at),1, NULL)) as   pipes_extensionOpen")->first();

        $OrdersMaintenance = $OrdersMaintenance->selectRaw("
             COUNT(IF(!isNULL(orders.closed_at),1, NULL)) as   maintenanceClosed,
             COUNT(IF(isNULL(orders.closed_at),1, NULL)) as   maintenanceOpen")->first();

        $getOrders = $getOrders->selectRaw("IFNULL(SUM(orders.total_invoice),0) as sales")->first();

        $purchases = $purchases->selectRaw("IFNULL(SUM(total),0) as purchases")->first();
        $warrenty = $warrenty->selectRaw('COUNT(*) as warrenty')->first();
        $orderElement = $orderElement->selectRaw('IFNULL(SUM(quantity),0)  as orderElement')->first();


        $results = [
            'installationClosed' => $OrdersInstallation->installationClosed,
            'installationOpen' => $OrdersInstallation->installationOpen,
            'pipes_extensionClosed' => $OrdersPipesExtension->pipes_extensionClosed,
            'pipes_extensionOpen' => $OrdersPipesExtension->pipes_extensionOpen,
            'maintenanceClosed' => $OrdersMaintenance->maintenanceClosed,
            'maintenanceOpen' => $OrdersMaintenance->maintenanceOpen,
            'sales' => $getOrders->sales,
            'purchases' => $purchases->purchases,
            'warrenty' => $warrenty->warrenty,
            'orderElement' => $orderElement->orderElement,

        ];


        return response()->json(['status' => 200, 'fetchingStats' => $results]);


    }

    public function homeUser()
    {
        if (\request()->ajax()) {
            $orders = Order::query()->where('user_id', Auth::user()->id)->whereDate('date_action', Carbon::now())->orderBy('date_action');

            $orderStatus = \request('_order_status', 'all');
            if ($orderStatus == "complete") $orders = $orders->whereNotNull('closed_at');
            elseif ($orderStatus == "notComplete") $orders = $orders->whereNull('closed_at');
            return datatables($orders)
                ->addColumn('id', function ($row) {
                    return view('dashboard.layouts.components.aTag', [
                        'name' => $row->orderName(),
                        'onclick' => 'orderDescriptionModal("orderInfo",' . $row->id . ')']);
                })
                ->addColumn('name', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->name]);
                })
                ->addColumn('phone', function ($row) {
                    return view('dashboard.layouts.components.aTag', ['link' => "tel:" . $row->phone, 'name' => $row->phone]);
                })
                ->addColumn('address', function ($row) {
                    return view('dashboard.layouts.components.aTag', ['name' => "address", 'link' => $row->address, 'blank' => 'blank']);
                })
                ->addColumn('city', function ($row) {
                    return $row->City->name_en;
                })
                ->addColumn('quantity', function ($row) {
                    return $row->quantity;
                })
                ->addColumn('orderDetail', function ($row) {
                    return view('dashboard.layouts.components.spanTag',
                        ['name' => '<i class="fas fa-info-circle"></i> orderDetail',
                            'class' => 'btn btn-danger',
                            'onclick' => 'orderDetail("' . $row->service_type . '",' . $row->id . ');'
                        ]);
                })
                ->addColumn('description', function ($row) {
                    return view('dashboard.layouts.components.spanTag', [
                        'name' => 'Description Detail',
                        'class' => 'btn btn-success',
                        'onclick' => 'showOrdersMaintenanceProblems(' . $row->id . ')']);
                })
                ->addColumn('action', function ($row) {
                    if($row->closed_at ==null)
                        return view('dashboard.layouts.components.aTag', [
                            'name' => 'Finish',
                            'class'=>'btn btn-warning',
                            'link' => route('employe.orders.finishOrder',['order'=>$row->id])]);
                })
                ->addColumn('date_action', function ($row) {
                    return $row->date_action;
                })
                ->addColumn('is_closed', function ($row) {
                    return $row->closed_at;
                })
                ->setRowClass(function ($row) {
                    if ($row->closed_at == null) return "text-danger";
                    else return "alert alert-success";
                })
                ->make();
        }


        return view('employe.home');
    }


    public function getReports($date){

        $orders=Order::whereDate('closed_at','=',$date)->get();
        $userPurchases=usersPurchases::whereDate('created_At','=',$date)->get();
        return view('dashboard.Home.dailyReports',['userPurchases'=>$userPurchases,'orders'=>$orders,'date'=>$date]);
    }


    public function getLogs($date){
          $logs=UserLog::whereDate('is_closed',$date)->get();
        return view('dashboard.Home.dailyLogs',['logs'=>$logs,'date'=>$date]);
    }


    public function finishLog(){
        $userId=Auth::user()->id;
        $UserLog=UserLog::whereNULL('is_closed')->where('user_id',$userId)->first();
        $UserLog->finishLog();
        // make the user is not Loged = 0
        Auth::user()->update(['is_loged'=>0]);
        Auth::logout();

        return response()->json(['status'=>200]);
    }

}
