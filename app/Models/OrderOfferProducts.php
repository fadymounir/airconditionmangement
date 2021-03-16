<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderOfferProducts extends Model
{
    protected $table = "order_offer_products";
    public $timestamps = false;


    public static function addEdit($order_id, $product_id, $quantity, $price, $id = null)
    {
        if ($id != null) $offer = self::find($id);
        else $offer = new self();
        $offer->order_id = $order_id;
        $offer->product_id = $product_id;
        $offer->quantity = $quantity;
        $offer->price = $price;
        if ($id == null)
            $offer->created_at = Carbon::now();
        $offer->save();
    }

    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
