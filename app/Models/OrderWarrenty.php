<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderWarrenty extends Model
{
    protected $table = "orders_warrenty";
    public $timestamps = false;

    public static function addEdit($description, $order_id, $id = null)
    {
        if ($id != null) $warrenty = self::find($id); else $warrenty = new self();
        $warrenty->description = $description;
        $warrenty->order_id = $order_id;
        if ($id == null)
            $warrenty->created_at = Carbon::now();
        $warrenty->save();
    }

    public function Order(){
       return  $this->belongsTo(Order::class);
    }
}
