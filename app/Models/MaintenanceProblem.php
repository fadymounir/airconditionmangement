<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MaintenanceProblem extends Model
{
    public $table="maintenance_problems";
    public  $timestamps=false;
    public  $fillable=["delated_at"];

    public static function addEdit($name_ar,$name_en, $id = null)
    {
        if ($id == null) $MaintenanceProblem = new self();
        else $MaintenanceProblem = self::find($id);
        $MaintenanceProblem->name_ar = $name_ar;
        $MaintenanceProblem->name_en=$name_en;
        if ($id == null) $MaintenanceProblem->created_at = Carbon::now();
        $MaintenanceProblem->save();
    }

    public static function allActive(){
        return self::whereNULL('delated_at')->get();
    }
}
