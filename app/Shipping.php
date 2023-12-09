<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'fname','lname','user_id','address','phone_no','email'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->hasmany('App\Order');
    }
}
