<?php

namespace App\Models;

use App\Http\Controllers\AdminPanel\tools\helperController;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class usersPurchases extends Model
{
    protected  $table="users_purchases";
    public  $timestamps=false;


    public static function addEdit($purchases_id,$quantity,$total,$bill=null,$user_id,$id=null,$logId){
        if($id !=null) $orderPurchases=self::find($id); else $orderPurchases=new self();
        $orderPurchases->purchases_id=$purchases_id;
        $orderPurchases->quantity=$quantity;
        $orderPurchases->total=$total;
        if($bill !=NULL) $orderPurchases->bill=helperController::uploadImage($bill); else $orderPurchases->bill=null;
        $orderPurchases->created_at=Carbon::now();
        $orderPurchases->user_id=$user_id;
        $orderPurchases->user_log_id=$logId;
        $orderPurchases->save();
    }

    public  function  Purchases(){
        return $this->belongsTo(Purchase::class);
    }

    public  function User(){
        return $this->belongsTo(User::class);
    }


    public function Log(){
        return $this->belongsTo(UserLog::class,'user_log_id','id');
    }
}
