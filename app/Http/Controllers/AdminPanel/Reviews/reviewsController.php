<?php

namespace App\Http\Controllers\AdminPanel\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class reviewsController extends Controller
{
    public function index()
    {

        if (\request()->ajax()) {
            $Review = Review::orderBy('id', 'DESC');
            return datatables($Review)
                ->addColumn('orderName', function ($row) {
                    return $row->Order->orderName();
                })
                ->make();
        }


        return view('dashboard.Reviews.index');
    }
}
