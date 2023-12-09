<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','categary_id','description','price','image','Quantity','color'
    ];

    public function categary(){
        return $this->belongsTo('App\Categary');
    }

    public function orderproduct(){
        return $this->hasOne('App\Order_Product');
    }
}
