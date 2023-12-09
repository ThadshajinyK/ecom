<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_date','quantity','user_id','total','shipping_id','payment_id','attributes'
    ];

    public function orderproducts(){
        return $this->hasmany('App\Order_Product');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function shipping(){
        return $this->belongsTo('App\Shipping');
    }
}
