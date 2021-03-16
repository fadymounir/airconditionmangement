<?php

namespace App\Http\Controllers\AdminPanel\OrdersWarrenty;

use App\Http\Controllers\Controller;
use App\Models\OrderWarrenty;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ordersWarrenty extends Controller
{
    public  function  index(){

        if (\request()->ajax()) {
            $purchases = OrderWarrenty::query()->orderBy('id', 'DESC');
            return datatables($purchases)
                ->addColumn('checkbox_operation', function ($row) {
                    return view('dashboard.layouts.components.checkbox_operation', ['id' => $row->id]);
                })
                ->addColumn('order_id', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->Order->orderName()]);
                })
                ->addColumn('description	', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->description	]);
                })

                ->addColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->make();
        }


        return view('dashboard.ordersWarrenty.index');
    }
}
