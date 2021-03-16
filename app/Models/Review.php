<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    public $table="reviews";
    public  $timestamps=false;

    public static function addEdit($order_id,$customer_service_rate,$user_rate,$desciption ,$id=null){
        if($id ==null) $rate=new self(); else $rate=self::find($id);
        $rate->customer_service_rate=$customer_service_rate;
        $rate->user_rate=$user_rate;
        $rate->order_id=$order_id;
        $rate->desciption=$desciption;
        $rate->created_at=Carbon::now();
        $rate->Save();
    }


    public  function Order(){
        return $this->belongsTo(Order::class);
    }



}
