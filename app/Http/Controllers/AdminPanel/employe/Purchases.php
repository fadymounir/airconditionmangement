<?php

namespace App\Http\Controllers\AdminPanel\employe;

use App\Http\Controllers\Controller;
use App\Models\UserLog;
use App\Models\usersPurchases;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Auth;
class Purchases extends Controller
{
    public function addNewPurchases(Request $request){
        $validate = Validator::make($request->all(), [
            'purchases_id'=>'required|integer|exists:purchases,id',
            'quantity' => 'required|numeric',
            'total' => 'required|numeric',
            'bill' => 'nullable|image',
        ]);
        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);


        // get user Log here
        $logId=UserLog::getLogId(Auth::user()->id,Carbon::now());



        usersPurchases::addEdit($request->purchases_id,$request->quantity,$request->total,$request->bill,Auth::user()->id,null,$logId);

        return response()->json(['status'=>200]);
    }
}
