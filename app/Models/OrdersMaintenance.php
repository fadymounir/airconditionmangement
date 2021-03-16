<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Auth;
class OrdersMaintenance extends Model
{
    protected $table = "orders_maintenance";
    public $timestamps = false;

    public static function addEdit($order_id, $maintaince_id, $conditioner_type, $service_pirce, $quantity, $total, $payment_type, $id = null)
    {
        if ($id != null) $order = self::find($id); else $order = new self();
        $order->order_id = $order_id;
        $order->maintaince_id = $maintaince_id;
        $order->conditioner_type = $conditioner_type;
        $order->service_pirce = $service_pirce;
        $order->quantity = $quantity;
        $order->total = $total;
        $order->payment_type = $payment_type;
        $order->created_at = Carbon::now();
        $order->save();
    }


    public function conditioner_type_attr()
    {

        $attr_ar = [
            "window" =>"شباك",
            "Split"  => "سيلت",
            "cupboard"  =>"دولابي",
            "cassette"  =>"كاسيت",

        ];
        $attr_en = [
            "window" =>"window",
            "Split"  => "Split",
            "cupboard"  =>"cupboard",
            "cassette"  =>"cassette",
        ];
        $type="ar";
        $attr=[
            "ar"=>$attr_ar,
            "en"=>$attr_en
        ];
        if(Auth::check() == true && Auth::user()->type !="admin") $type="en";

        $conditioner_type = $this->attributes['conditioner_type'];
        if ($conditioner_type == "window") return $attr[$type]["window"];
        else if ($conditioner_type == "Split") return $attr[$type]["Split"];
        else if ($conditioner_type == "cupboard") return $attr[$type]["cupboard"];
        else if ($conditioner_type == "cassette") return $attr[$type]["cassette"];

    }

    public function payment_type_attr()
    {
        $attr_ar = [
            "cash" =>"كاش",
            "later"  => "اجل",
            "bank"  =>"بنك",
        ];
        $attr_en = [
            "cash" =>"cash",
            "later"  => "later",
            "bank"  =>"bank",

        ];
        $type="ar";
        $attr=[
            "ar"=>$attr_ar,
            "en"=>$attr_en
        ];
        if(Auth::check() == true && Auth::user()->type !="admin") $type="en";


        $paymentType = $this->attributes['payment_type'];
        if ($paymentType == "cash") return $attr[$type]["cash"];
        else if ($paymentType == "later") return $attr[$type]["later"];
        else if ($paymentType == "bank") return $attr[$type]["bank"];
    }


    public function Maintenance()
    {
        return $this->belongsTo(Maintenance::class,'maintaince_id','id');
    }


}
