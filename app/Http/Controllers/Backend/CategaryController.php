<?php

namespace App\Http\Controllers\Backend;

use App\Categary;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    public function index()
    {
        $categary=Categary::orderby('id','desc')->get();        
        return view('backend.categary.index',['categaries'=>$categary]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categary=new Categary;
        $categary->categary_name=$request->name;
        $categary->save();

        return redirect('/categary')->with('success','Successfully Add parent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categary=Categary::findOrFail($id);
        return view('backend.categary.show',compact('categary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categary_id=Categary::findOrFail($id);
        $products = Product::where('categary_id',$id)->get();

        foreach($products as $pro){
            $categary_pro = DB::table('products')->where('id',$pro->id)->delete();
        }

        $categary_id->delete();
        
        return redirect('/categary')->with('success','Successfully Deleted'); 
    }
}
