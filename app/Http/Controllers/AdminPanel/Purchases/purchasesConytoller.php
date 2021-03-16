<?php

namespace App\Http\Controllers\AdminPanel\Purchases;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
class purchasesConytoller extends Controller
{
    public  function  index(){

        if (\request()->ajax()) {
            $purchases = Purchase::query()->whereNull('delated_at')->orderBy('id', 'DESC');
            return datatables($purchases)
                ->addColumn('checkbox_operation', function ($row) {
                    return view('dashboard.layouts.components.checkbox_operation', ['id' => $row->id]);
                })
                ->addColumn('name_ar', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->name_ar]);
                })
                ->addColumn('name_en', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->name_en]);
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->addColumn('updateInfo', function ($row) {
                    return view('dashboard.layouts.components.spanTag',[
                        'name' => 'تعديل',
                        'class' => 'btn btn-success',
                        'onclick'=>'showModal("edit",'.$row->id.')'
                    ]);
                })
                ->addColumn('deleteInfo', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => 'مسح',
                        'class' => 'btn btn-danger', 'onclick' => 'deleterecord('. $row->id . ')']);
                })
                ->make();
        }


        return view('dashboard.Purchases.index');
    }


    public function addEdit(Request $request){
        $validateArray = [
            'name_ar' => 'required|min:3',
            'name_en' => 'required|min:3',
            'actionType' => 'required|in:add,edit',
        ];

        if($request->actionType == "edit") $validateArray['id']='required|integer';

        $validate = Validator::make($request->all(), $validateArray);

        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);

        Purchase::addEdit($request->name_ar,$request->name_en,$request->id);

        return response()->json(['status'=>200]);

    }

    public function getRecord(Request $request){
            return response()->json(['stauts'=>200,'info'=>Purchase::find($request->id)]);
    }

    public function deleteeRcord(Request  $request){
        $purchase=Purchase::find($request->id)->update(['delated_at'=>Carbon::now()]);
        return response()->json(['status'=>200]);
    }
}
