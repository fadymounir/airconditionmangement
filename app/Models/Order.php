<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\False_;

class Order extends Model
{
    protected $table = "orders";
    public $timestamps = false;
    public $fillable = ['closed_at'];
    public $with = ['orderDescription'];


    public static function addEdit($name, $phone, $address, $type, $desciption = null, $total_invoice, $user_id = null, $id = null, $cityId, $dateAction, $closed_at = null,$user_log_id=null)
    {
        if ($id != null) $order = self::find($id);
        else             $order = new self();
        $order->name = $name;
        $order->phone = $phone;
        $order->desciption = $desciption;
        $order->address = $address;
        $order->service_type = $type;
        $order->total_invoice = $total_invoice;
        $order->city_id = $cityId;
        $order->user_log_id=$user_log_id;
        if ($dateAction != null) $order->date_action = $dateAction;
        $order->user_id = $user_id;
        if ($id == null) $order->created_at = Carbon::now();
        if ($closed_at != null) $order->closed_at = $closed_at;
        $order->save();

        return $order;
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function City()
    {
        return $this->belongsTo(City::class);
    }

    public function Installation()
    {
        return $this->hasMany(OrdersInstallation::class);
    }

    public function Maintenance()
    {
        return $this->hasMany(OrdersMaintenance::class);
    }

    public function PipesExtension()
    {
        return $this->hasMany(OrdersPipesExtension::class);
    }


    public function OfferProduct()
    {
        return $this->hasMany(OrderOfferProducts::class);
    }

    public function OrderElement()
    {
        return $this->hasMany(OrdersPurchasesElement::class);
    }


    public function orderType()
    {
        $orderType = $this->attributes['service_type'];
        if ($orderType == "other") return "تركيبات وصيانة";
        else if ($orderType == "order_offer_product") return "عروض اسعار المنتجات";
    }


    public function orderName()
    {
        $orderType = $this->attributes['service_type'];
        $orderId = $this->attributes['id'];
        if ($orderType == "other") return "F_" . $orderId;
        else if ($orderType == "order_offer_product") return "O_" . $orderId;
        else  return $orderId;
    }


    public static function updatCalTotalTax($orderId)
    {
        $order = self::find($orderId);
        $orderType = $order->service_type;
        $tax = 0;
        $quantity = 0;
        $total_invoice = 0;
        if ($orderType == "other") {
            $total_invoice = $order->Installation->sum('total') + $order->Maintenance->sum('total') + $order->PipesExtension->sum('total');
            $quantity = $order->Installation->sum('quantity') + $order->Maintenance->sum('quantity') + $order->PipesExtension->sum('conditioners_number');
            $tax = (15 / 100) * $total_invoice;
        } else if ($orderType == "order_offer_product") {
            // in the front i have calcluate the total
            $total_invoice = $order->total_invoice;
            $tax = (15 / 100) * $total_invoice;
            $quantity = $order->OfferProduct->sum('quantity');
        }

        $order->tax = $tax;
        $order->total_invoice = $total_invoice;
        $order->quantity = $quantity;
        $order->save();


    }


    public function reopenWarrenty()
    {
        return $this->hasMany(OrderWarrenty::class);
    }

    public function orderDescription()
    {
        return $this->hasMany(OrderMaintenanceProblem::class);
    }

    public function Review()
    {
        return $this->hasOne(Review::class);
    }

    public static function calAttr($orders)
    {
        $cash = 0;
        $later = 0;
        $bank = 0;
        $all = 0;
        foreach ($orders as $row) {
            foreach ($row->Installation as $installationRow) {
                $all += $installationRow->total;
                if ($installationRow->payment_type == "cash") $cash += $installationRow->total;
                elseif ($installationRow->payment_type == "bank") $bank += $installationRow->total;
                elseif ($installationRow->payment_type == "later") $later += $installationRow->total;
            }
            foreach ($row->Maintenance as $MaintenanceRow) {
                $all += $MaintenanceRow->total;
                if ($MaintenanceRow->payment_type == "cash") $cash += $MaintenanceRow->total;
                elseif ($MaintenanceRow->payment_type == "bank") $bank += $MaintenanceRow->total;
                elseif ($MaintenanceRow->payment_type == "later") $later += $MaintenanceRow->total;
            }
            foreach ($row->PipesExtension as $PipesExtensionRow) {
                $all += $PipesExtensionRow->total;
                if ($PipesExtensionRow->payment_type == "cash") $cash += $PipesExtensionRow->total;
                elseif ($PipesExtensionRow->payment_type == "bank") $bank += $PipesExtensionRow->total;
                elseif ($PipesExtensionRow->payment_type == "later") $later += $PipesExtensionRow->total;
            }
        }

        return [
            'all'=>$all,
            'cash'=>$cash,
            'bank'=>$bank,
            'later'=>$later
        ];
    }


    public function Log(){
        return $this->belongsTo(UserLog::class,'user_log_id','id');
    }

}
