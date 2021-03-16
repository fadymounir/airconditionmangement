<?php

namespace App;
use App\Models\Order;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $table="users";
    public  $timestamps=false;

    protected $fillable=['is_loged'];


    public static function getUseActive(){
        return self::where('is_active',1)->where('type','employe')->get();
    }

    public function ordersClosed(){
        return $this->hasMany(Order::class)->whereNotNull('closed_at')->count();
    }

    public function ordersOpen(){
        return $this->hasMany(Order::class)->whereNull('closed_at')->count();
    }

}
