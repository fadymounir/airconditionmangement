<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public $table="maintenance";
    public  $timestamps=false;
    public  $fillable=["delated_at"];

    public static function addEdit($name_ar,$name_en, $id = null)
    {
        if ($id != null) $Maintenance = self::find($id); else $Maintenance = new self();
        $Maintenance->name_ar = $name_ar;
        $Maintenance->name_en = $name_en;
        if ($id == null)
            $Maintenance->created_at = Carbon::now();
        $Maintenance->save();
    }

    public static function allActive(){
        return self::whereNull('delated_at')->get();
    }

}
