@extends('layouts.frontend.header')
@section('content')

<div id="mainBody">
	<div class="container">
    <h3 align="center" style="color:green"> Your Order Confirmed </h3>
    @if(!empty($product_name))
	    <div class="row">

            <div id="sidebar" class="span4">
                <div class="well well-small"><a id="myCart"><img src="{{ asset('images/ico-cart.png') }}" alt="cart"> Your Order </a></div>
                    <p> <img src="{{asset('images/products/' . $image)}}" height="200px" width="150px"> </p>
                    <p> Name: {{ $product_name }} </p>
                    <p> Product Price: {{ $price }} </p>
                    <p> Quantity: {{ $qty }} </p>
                    <p> Total Price: {{ $total }} </p>
            </div>

            <div id="sidebar" class="span4">
                <div class="well well-small"><a id="myCart"><img src="{{ asset('images/ico-cart.png') }}" alt="cart"> Shipping To </a></div>
                    <p> Address: {{ $address }} </p>
                    <p> Area: {{ $area }} </p>
                    <p> District: {{ $district }} </p>
                    <p> Province: {{ $province }} </p>
            </div>

            <div id="sidebar" class="span4">
                <div class="well well-small"><a id="myCart"><img src="{{ asset('images/ico-cart.png') }}" alt="cart"> Contact </a></div>
                    <p> Email: {{ $email }} </p>
                    <p> Phone: {{ $phone }} </p>
                    <p> District: {{ $district }} </p>
                    <p> Province: {{ $province }} </p>
            </div>

        </div>
    @endif
    <a href="{{ url('/') }}" style="margin-left:1050px; margin-bottom:200px;" class="btn btn-info"> Done </a>
	</div>
</div>


@endsection
