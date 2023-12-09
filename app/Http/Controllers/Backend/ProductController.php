<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use App\Categary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::orderby('id','desc')->get();
        return view('backend.product.index',['products'=>$product]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categary = Categary::all();
        return view('backend.product.create',['categaries'=>$categary]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->all()){

            $pro=new Product;
            $pro->product_name=$request->name;
            $pro->categary_id=$request->categary;
            $pro->description=$request->description;
            $pro->price=$request->price;
            $pro->description=$request->description;
            $pro->qty=$request->qty;

            if($file=$request->file('image')){
                $extention=$file->getClientOriginalExtension();
                $filename=time().".".$extention;
                $file->move('images/products',$filename);
                $pro->image=$filename; 
            }
            $pro->save();             

            return redirect('/product')->with('success', 'Product Added Successfully');   
        }
        else{
            return back()->with('error','Please fill all');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro=Product::findOrFail($id);
        return view('backend.product.show',compact('pro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro=Product::findOrFail($id);
        $categaries = Categary::all()->first();
        return view('backend.product.edit',compact('pro','categaries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $pro=Product::findOrFail($id);
        $pro->product_name=$request->name;
        $pro->categary_id=$request->categary;
        $pro->description=$request->description;
        $pro->price=$request->price;
        $pro->description=$request->description;
        $pro->qty=$request->qty;

        if($file=$request->file('image')){
            $extention=$file->getClientOriginalExtension();
            $filename=time().".".$extention;
            $file->move('uploads/products',$filename);
            $pro->image=$filename; 
        }
        
         $pro->update();        

       return redirect('/product')->with('success', 'Product Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro=Product::findOrFail($id);
        $pro->delete();
        return redirect('/product')->with('success','Successfully Deleted');
    }
}
