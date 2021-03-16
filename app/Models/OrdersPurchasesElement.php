<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrdersPurchasesElement extends Model
{
    protected $table = "orders_purchases_element";
    public $timestamps = false;

    public static function addEdit($order_id, $purchases_id,$quantity ,$id = null){
        if ($id == null) $orderEle = new self(); else $orderEle = self::find($id);
        $orderEle->order_id = $order_id;
        $orderEle->quantity=$quantity;
        $orderEle->purchases_id = $purchases_id;
        if ($id == null)
            $orderEle->created_at = Carbon::now();
        $orderEle->save();
    }

    public function Purchase(){
        return $this->belongsTo(Purchase::class,'purchases_id','id');
    }

    public function Order(){
        return $this->belongsTo(Order::class);
    }
}
