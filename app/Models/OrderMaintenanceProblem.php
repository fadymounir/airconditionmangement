<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderMaintenanceProblem extends Model
{
    public  $table="orders_maintenance_problems";
    public  $timestamps=false;

    public static function addEdit($order_id,$maintenance_problems){
        $problem=new self();
        $problem->order_id=$order_id;
        $problem->maintenance_problems=$maintenance_problems;
        $problem->created_at=Carbon::now();
        $problem->Save();
    }


    public static  function deleteFromOrder($orderId){
        self::where('order_id',$orderId)->delete();
    }

    public  function MaintenanceProblems(){
        return $this->belongsTo(MaintenanceProblem::class);
    }
}
