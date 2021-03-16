<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Auth;
class OrdersInstallation extends Model
{
    protected $table = "orders_Installation";
    public $timestamps = false;

    public static function addEdit($service_type, $conditioner_type, $quantity, $pipes_meters, $chairs_number, $total, $payment_type, $order_id,$product_id=null,$product_price=null)
    {
        $orderInstallation = new self();
        $orderInstallation->service_type = $service_type;
        $orderInstallation->conditioner_type = $conditioner_type;
        $orderInstallation->quantity = $quantity;
        $orderInstallation->pipes_meters = $pipes_meters;
        $orderInstallation->chairs_number = $chairs_number;
        $orderInstallation->total = $total;
        $orderInstallation->payment_type = $payment_type;
        $orderInstallation->order_id = $order_id;
        $orderInstallation->product_id=$product_id;
        $orderInstallation->product_price=$product_price;
        $orderInstallation->created_at = Carbon::now();
        $orderInstallation->save();
    }

    public  function Product(){
        return $this->belongsTo(Product::class);
    }

    public function service_type_attr()
    {
        $attr_ar = [
            "new_installation" =>"تركيب جديد",
            "old_installation"  => "تركيب قديم",
            "reassemble_and_assemble"  =>"فك وتركيب",
            "reassemble"  =>"فك فقط",
            "washing"=> "غسيل"
        ];
        $attr_en = [
            "new_installation" =>"new installation",
            "old_installation"  =>'old installation',
            "reassemble_and_assemble"  =>'reassemble and assemble',
            "reassemble"  =>'reassemble',
            "washing"=> 'washing',
        ];
        $type="ar";
        $attr=[
            "ar"=>$attr_ar,
            "en"=>$attr_en
        ];
        if(Auth::check() == true &&  Auth::user()->type !="admin") $type="en";

        $service_type = $this->attributes['service_type'];
        if ($service_type == "new_installation") return $attr[$type]["new_installation"];
        else if ($service_type == "old_installation") return $attr[$type]["old_installation"];
        else if ($service_type == "reassemble_and_assemble") return $attr[$type]["reassemble_and_assemble"];
        else if ($service_type == "reassemble") return $attr[$type]["reassemble"];
        else if ($service_type == "washing") return $attr[$type]["washing"];
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


}
