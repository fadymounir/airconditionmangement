<?php

namespace App\Http\Controllers\AdminPanel\Products;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class productsController extends Controller
{
    public function index()
    {

        if (\request()->ajax()) {
            $products = Product::query()->whereNUll('delated_at')->orderBy('id', 'DESC');
            return datatables($products)
                ->addColumn('checkbox_operation', function ($row) {
                    return view('dashboard.layouts.components.checkbox_operation', ['id' => $row->id]);
                })
                ->addColumn('name', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->name]);
                })
                ->addColumn('price', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->price]);
                })
                ->addColumn('updateInfo', function ($row) {
                    return view('dashboard.layouts.components.spanTag', [
                        'name' => 'تعديل',
                        'class' => 'btn btn-success',
                        'onclick' => 'showModal("edit",' . $row->id . ')']);
                })
                ->addColumn('deleteInfo', function ($row) {
                    return view('dashboard.layouts.components.spanTag', [
                        'name' => 'تعديل',
                        'class' => 'btn btn-danger',
                        'onclick' => 'deleterecord(' . $row->id . ')']);
                })
                ->addColumn('addQuantity',function($row){
                    return view('dashboard.layouts.components.spanTag', [
                        'name' => '<i class="fas fa-plus"></i>',
                        'class' => 'btn btn-primary',
                        'onclick' => 'addQuantity(' . $row->id . ')']);
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->setRowClass(function($row){
                    if ($row->quantity <= 0) return "text text-danger";
                    else return "text text-success";
                })
                ->make();
        }


        return view("dashboard.Products.index");
    }

    public function addEdit(Request $request)
    {
        $validateArray = [
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'actionType' => 'required|in:add,edit',
        ];

        if ($request->actionType == "edit") $validateArray['id'] = 'required|integer';

        $validate = Validator::make($request->all(), $validateArray);

        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);

        Product::addEdit($request->name, $request->price, $request->id);

        return response()->json(['status' => 200]);
    }

    public function getRecord(Request  $request){
        return response()->json(['stauts'=>200,'info'=>Product::find($request->id)]);
    }

    public function deleteProduct(Request $request){
        $product=Product::find($request->id)->update(['delated_at'=>Carbon::now()]);
        return response()->json(['stauts'=>200]);
    }

    public function addQuantity(Request $request){
        $product=Product:: ProductQuantityAction($request->productId,$request->quantity, "add");
        return response()->json(['stauts'=>200]);
    }
}
