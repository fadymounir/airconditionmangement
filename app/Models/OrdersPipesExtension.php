<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Auth;
class OrdersPipesExtension extends Model
{
    protected $table = "orders_pipes_extension";
    public $timestamps = false;


    public static function addEdit($order_id, $service_type, $room_number, $meters_number, $conditioners_number, $meter_price, $total, $payment_type, $id = null)
    {
        if($id !=null) $pipes=self::find($id);
        else $pipes=new self();
        $pipes->order_id=$order_id;
        $pipes->service_type=$service_type;
        $pipes->room_number=$room_number;
        $pipes->meters_number=$meters_number;
        $pipes->conditioners_number=$conditioners_number;
        $pipes->meter_price=$meter_price;
        $pipes->total=$total;
        $pipes->payment_type=$payment_type;
        $pipes->created_at=Carbon::now();
        $pipes->save();
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


    public function service_type_attr(){

        $attr_ar=[
          "bidding"=>"تسعيرة",
          "actual_extension"=>" تمديد فلي"
        ];

        $attr_en=[
            "bidding"=>"bidding",
            "actual_extension"=>"actual extension"
        ];

        $type="ar";
        $attr=[
            "ar"=>$attr_ar,
            "en"=>$attr_en
        ];
        if(Auth::check() == true && Auth::user()->type !="admin") $type="en";


        $serviceType=$this->attributes['service_type'];
        if($serviceType == "bidding") return  $attr[$type]["bidding"];
        else if($serviceType == "actual_extension") return  $attr[$type]["actual_extension"];
    }






}
