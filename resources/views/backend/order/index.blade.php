@extends('layouts.backend.dashboard')
@section('content')

<div class="container">
    <div class="row col-md-12 col-md-offset-2 custyle">
        <h4 id="count"></h4>
        <table class="table table" style="margin-bottom:-40px; margin-top:0px;" id="table">
            <tr>
                <td> <h5> Orders - {{ $orders->count() }}</h5> </td> <br><br>
            </tr>
        </table>
        <table class="table table-striped custab" id="product_table">
                <thead id="tabelcontents">
                    <tr>
                        <th>ID</th>
                        <th> Customer </th>
                        <th> Order_products (id - qty) </th>
                        <th> Order Date</th>
                        <th> Payment </th>
                        <th> Total </th>
                        <th> Shipping to </th>
                        <th class="text-center" style="width:50px;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td> {{ $order->id }} </td>
                        <td> <a href="" class="btn btn-success"> {{ $order->user->id }} </a></td>
                        <td> 
                            @foreach($order->orderproducts as $product)
                                <a href="{{ route('product.show',$product->product_id) }}" class="btn btn-info"> {{ $product->product_id }} - qty {{ $product->qty }} </a> <br><br>
                            @endforeach
                        </td>
                        <td> {{ $order->order_date }} </td>
                        <td> {{ $order->payment_id }} </td>
                        <td> LKR {{ $order->total }}/- </td>
                        <td> {{ $order->shipping->address }} </td>
                        <td class="text-left">
                            <form action="{{route('order.destroy',[$order->id])}}" method="post">
                                @csrf   
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@endsection