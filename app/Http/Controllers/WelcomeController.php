<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categary;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $product = Product::all();
        $categary = Categary::all();
        return view('/welcome',compact('product','categary'));
    }
}
