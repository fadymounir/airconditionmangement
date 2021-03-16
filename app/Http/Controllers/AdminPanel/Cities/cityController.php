<?php

namespace App\Http\Controllers\AdminPanel\Cities;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
class cityController extends Controller
{
    public function index(){

        if (\request()->ajax()) {
            $cities = City::query()->whereNull('delated_at')->orderBy('id', 'DESC');
            return datatables($cities)
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
        return view('dashboard.Cities.index');
    }

    public function deleteRecord(Request  $request){
        $City=City::find($request->id)->update(['delated_at'=>Carbon::now()]);
        return response()->json(['status'=>200]);
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

        City::addEdit($request->name_ar,$request->name_en,$request->id);

        return response()->json(['status'=>200]);


    }

    public function getRecord(Request $request){
        return response()->json(['stauts'=>200,'info'=>city::find($request->id)]);
    }



}
