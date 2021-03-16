<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchases";
    public $timestamps = false;
    protected $fillable = ['id','name_ar','name_en','created_at','delated_at'];

    public static function addEdit($name_ar,$name_en, $id = null)
    {
        if ($id != null) $purchase = self::find($id); else $purchase = new self();
        $purchase->name_ar = $name_ar;
        $purchase->name_en = $name_en;
        if ($id == null)
            $purchase->created_at = Carbon::now();
        $purchase->save();
    }

    public static function allActive(){
        return self::whereNull('delated_at')->get();
    }
}
