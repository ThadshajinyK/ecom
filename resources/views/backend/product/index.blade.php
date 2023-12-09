@extends('layouts.backend.dashboard')
@section('content')

<div class="container">
    <div class="row col-md-12 col-md-offset-2 custyle">
        <h4 id="count"></h4>
        <table class="table table" style="margin-bottom:-40px; margin-top:0px;" id="table">
            <tr>
                <td> <h5> Products - {{ $products->count() }}</h5> </td>
                <td class="text-right"> <h5> <a href="{{ route('product.create') }}" class="btn btn-primary" style="margin-bottom:0px; margin-left:70px; margin-bottom:10px;"><b>+</b> Add New Product </a> </h5>
            </tr>
        </table>
        <table class="table table-striped custab" id="product_table">
                <thead id="tabelcontents">
                    <tr>
                        <th>ID</th>
                        <th>Produt Name</th>
                        <th> Image </th>
                        <th> Categary </th>
                        <th> Price </th>
                        <th> Qty </th>
                        <th>Edit</th>
                        <th> Show </th>
                        <th> Delete </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td> {{ $product->id }} </td>
                        <td> {{ $product->product_name }} </td>
                        <td> <img src="{{ asset('images/products/'.$product->image)}}" height="100px" width="100px" alt=""> </td>
                        <td> {{ $product->categary->categary_name }} </td>
                        <td> {{ $product->price }} </td>
                        <td> {{ $product->qty }} </td>
                        <td>
                            <a href="{{ route('product.edit',$product->id) }}"><i class="material-icons">edit</i></a>
                        </td>
                        <td>
                            <a href="{{ route('product.show',$product->id) }}"><i class="material-icons">done</i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('product.destroy',[$product->id])}}" method="post">
                                @csrf   
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>
</div>

@endsection