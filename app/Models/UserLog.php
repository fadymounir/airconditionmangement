<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Auth;
class UserLog extends Model
{
    protected $table = "users_log";
    public $timestamps = false;
    protected $fillable=['is_closed'];


    public static function addEdit($userId, $id = null,
                                   $complete_order = 0,
                                   $total_complete_order = 0,
                                   $purchases_count = 0,
                                   $purchases_total = 0,
                                   $product_count = 0,
                                   $product_store_count = 0,
                                   $product_total = 0,$closed_at=null)
    {
        if ($id == null) $log = new self(); else $log = self::find($id);

        $log->complete_order = $complete_order;
        $log->total_complete_order = $total_complete_order;
        $log->purchases_count = $purchases_count;
        $log->purchases_total = $purchases_total;
        $log->product_count = $product_count;
        $log->product_store_count = $product_store_count;
        $log->product_total = $product_total;
        $log->user_id = $userId;
        if ($id == null)
            $log->created_at = Carbon::now();

        if($closed_at !=null)
            $log->is_closed=$closed_at;

        $log->save();
    }

    /** this function to return the log is that is not Closed yet
     * @param $userId
     * @return LogId
     */
    public static function getLogId($userId)
    {
        return self::where('user_id', $userId)->whereNUll('is_closed')->first()->id;
    }


    public function User()
    {
        return $this->belongsTo(User::class);
    }


    public function usersPurchases()
    {
        return $this->hasMany(usersPurchases::class);
    }

    public function Orders()
    {
        return $this->hasMany(Order::class);
    }


    /**
     * this function to calculate what is happend in this log and closed it
     */
    public function finishLog()
    {
        $orders = $this->Orders;
        $usersPurchases = $this->usersPurchases;


        $complete_order = 0;
        $total_complete_order = 0;
        $purchases_count = 0;
        $purchases_total = 0;
        $product_count = 0;
        $product_store_count = 0;
        $product_total = 0;


        foreach ($orders as $row){
            $complete_order++;
            $total_complete_order+=$row->tax+$row->total_invoice;
            $product_count +=$row->quantity;
            foreach($row->Installation as $installationRow)
                if($installationRow->product_id !=null){
                    $product_store_count+=$installationRow->quantity;
                    $product_total+=$installationRow->product_price;
                }
        }

        $purchases_count=$usersPurchases->sum('quantity');
        $purchases_total=$usersPurchases->sum('total');

        self::addEdit($this->attributes['user_id'],
                      $this->attributes['id'],
                      $complete_order,
                      $total_complete_order,
                      $purchases_count,
                      $purchases_total,
                      $product_count,
                      $product_store_count,
                      $product_total,
                      Carbon::now());




    }


}
