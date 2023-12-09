<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categary extends Model
{
    protected $fillable = [
        'categary_name'
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
