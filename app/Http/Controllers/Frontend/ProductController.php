<?php

namespace App\Http\Controllers\Frontend;

use App\Product;
use App\Categary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id){
        $categary=Categary::all();
        $product=Product::find($id);
        return view('frontend.product.index',compact('product','categary'));
    }
}
