<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";
    public $timestamps = false;
    public $fillable = ['delated_at'];

    public static function addEdit($name_ar,$name_en, $id = null)
    {
        if ($id == null) $city = new self();
        else $city = self::find($id);
        $city->name_ar = $name_ar;
        $city->name_en=$name_en;
        if ($id == null) $city->created_at = Carbon::now();
        $city->save();
    }

    public static function  allActive(){
        return self::whereNull('delated_at')->get();
    }
}
