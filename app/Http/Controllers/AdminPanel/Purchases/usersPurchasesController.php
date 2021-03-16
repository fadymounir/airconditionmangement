<?php

namespace App\Http\Controllers\AdminPanel\Purchases;

use App\Http\Controllers\Controller;
use App\Models\usersPurchases;
use Illuminate\Http\Request;

class usersPurchasesController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            $usersPurchases = usersPurchases::query()->orderBy('id', 'DESC');
            return datatables($usersPurchases)
                ->addColumn('checkbox_operation', function ($row) {
                    return view('dashboard.layouts.components.checkbox_operation', ['id' => $row->id]);
                })
                ->addColumn('purchasesnName', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->Purchases->name_ar]);
                })
                ->addColumn('userName', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->User->name]);
                })
                ->addColumn('quantity', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->quantity]);
                })
                ->addColumn('total', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->total]);
                })
                ->addColumn('bill', function ($row) {
                    if ($row->bill != null)
                        return view('dashboard.layouts.components.aTag', ['class' => 'btn btn-primary', 'link' => $row->bill, 'name' => 'الفاتورة المحلقة', 'blank' => 'blank']);
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->make();
        }


        return view('dashboard.usersPurchases.index');
    }
}
