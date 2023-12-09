<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Shipping;
use App\Order;
use App\Order_Product;
Use Carbon;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function create(Request $request){
        if(!empty($request->product_id)){
            $product = DB::table('products')->where('id',$request->product_id)->first();

            $order = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'qty' => $request->qty,
                'price' => $product->price,
                'product_image' => $product->image,
                'order_total' => $product->price*$request->qty,
                'image' => $product->image,
                'description' => $product->description,
            ];       

            $user_id = Auth()->user()->id;
            $shipping = DB::table('shippings')->where('user_id',$user_id)->first();

            return view('frontend.shipping.create',compact('shipping'))->with($order);
        }else{
            $user_id = Auth()->user()->id;
            $shipping = DB::table('shippings')->where('user_id',$user_id)->first();

            return view('frontend.shipping.create',compact('shipping'));
        }
    }


    public function store(Request $request){
        $user_id = Auth()->user()->id;
        $old = Shipping::where('user_id',$user_id)->delete();

        $del_add = new Shipping;
        $del_add->user_id=$user_id;
        $del_add->fname=$request->fname;
        $del_add->lname=$request->lname;
        $del_add->province=$request->province;
        $del_add->district=$request->district;
        $del_add->area=$request->area;
        $del_add->address=$request->address;
        $del_add->phone_no=$request->phone;
        $del_add->email=$request->email;       
        $del_add->save(); 

        $product = DB::table('products')->where('id',$request->product_id)->first();
        $shipping = DB::table('shippings')->where('user_id',$user_id)->first();

        $order = [
            'product_id' => $request->product_id,
            'product_name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $product->price,
            'product_image' => $product->image,
            'order_total' => $product->price*$request->qty,
            'image' => $product->image,
            'description' => $product->description,
            'district' => $shipping->district,
            'province' =>$shipping->province,
            'city' => $shipping->area,
            'phone' => $shipping->phone_no,
            'email' => $shipping->email,
            'address' => $shipping->address,
            'shipping_id' => $shipping->id,
        ];

        return view('frontend.payment.index')->with($order);
    }

    
    public function update(Request $request,$id){
        $user_id = Auth()->user()->id;

        $del_add = Shipping::find($id);
        $del_add->user_id=$user_id;
        $del_add->fname=$request->fname;
        $del_add->lname=$request->lname;
        $del_add->province=$request->province;
        $del_add->district=$request->district;
        $del_add->area=$request->area;
        $del_add->address=$request->address;
        $del_add->phone_no=$request->phone;
        $del_add->email=$request->email;       
        $del_add->update(); 

        $product = DB::table('products')->where('id',$request->product_id)->first();
        $shipping = DB::table('shippings')->where('user_id',$user_id)->first();

        $order = [
            'product_id' => $request->product_id,
            'product_name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $product->price,
            'product_image' => $product->image,
            'order_total' => $product->price*$request->qty,
            'image' => $product->image,
            'description' => $product->description,
            'district' => $shipping->district,
            'province' =>$shipping->province,
            'city' => $shipping->area,
            'phone' => $shipping->phone_no,
            'email' => $shipping->email,
            'address' => $shipping->address,
            'shipping_id' => $shipping->id,
        ];

        return view('frontend.payment.index')->with($order); 
    }

    public function orderconform(Request $request){
        $user_id =  Auth()->user()->id;
        $shipping_id = DB::table('shippings')->where('user_id',$user_id)->first()->id;

        $product_id = $request->product_id;
        $qty = $request->qty;

        $product = DB::table('products')->where('id',$product_id)->first();
        $product_price=$product->price;

        $order_total = $product_price * $qty;
    
        $order = new Order;
        $order->user_id=$user_id;
        $order->order_date=Carbon\Carbon::now();
        $order->shipping_id=$shipping_id;
        $order->payment_id=$request->payment_id;
        $order->total=$order_total;
        $order->quantity = $qty;
        $order->save();  

        $order_id=DB::table('orders')->latest()->first()->id;

        $order_product = new Order_Product;
        $order_product->order_id= $order_id;
        $order_product->product_id=$product->id;
        $order_product->price=$product->price;
        $order_product->qty=$qty;
        $order_product->save();

        $shipping = DB::table('shippings')->where('id',$shipping_id)->first();

        $data = [
            'order_id' => $order_id,
            'product_name' => $product->product_name,
            'qty' => $qty,
            'price' => $product->price,
            'total' => $order_total,
            'payment_method' => $request->payment_id,
            'province' =>  $shipping->province,
            'district' =>  $shipping->district,
            'area' =>  $shipping->area,
            'address' =>  $shipping->address, 
            'phone' => $shipping->phone_no,
            'email' => $shipping->email,
            'image' => $product->image,
        ];

        DB::table('products')->where('id',$product->id)->update(
            ['qty'=>($product->qty - $qty)]
        );

        return view('frontend.order.index')->with($data);
    }
}
