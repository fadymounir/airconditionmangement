<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'price', 'created_at', 'delated_at','quantity'];


    public static function addEdit($name, $price, $id = null)
    {
        if ($id == null) $product = new self();
        else $product = self::find($id);

        $product->name = $name;
        $product->price = $price;
        if ($id == null)
            $product->created_at = Carbon::now();
        $product->save();
    }

    public static function allActive()
    {
        return self::whereNull('delated_at')->get();
    }


    public static function ProductQuantityAction($productId,$quantity, $addOrMinus)
    {
        $product=self::find($productId);
        if ($addOrMinus == "add")
            $product->update(['quantity' => $product->quantity + $quantity]);
        elseif($addOrMinus == "minus")
            $product->update(['quantity' => $product->quantity - $quantity]);



    }


}
