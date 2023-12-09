@extends('layouts.frontend.header')
@section('content')

<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">

		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>

<div id="mainBody">
	<div class="container">
	<div class="row">

<!-- Sidebar ================================================== -->

	@include('frontend/categary/index')
    
<!-- Sidebar end=============================================== -->
		<div class="span9">	

        <ul class="breadcrumb">
            <li><a href="{{ route('/') }}">Home</a> <span class="divider">/</span></li>
            <li class="active"> product </li>
        </ul>
	
		<div class="product-information"><!--/product-information-->
            <a href=""> <img src="{{ asset('images/products/'.$product->image) }}" class="newarrival" alt="" width="250px;" height="250px;"/> </a>
            <h4> {{ $product->product_name }} </h4>
            <h4> {{ $product->description }} </h4>
            <p>Web ID: {{ $product->id }}</p>
            <p  @if($product->qty>0) @else style="color:red" @endif><b>Availability:</b> @if($product->qty>0) Instock @else No stock @endif </p>
            <p><b>Condition:</b> New</p>
                
            <span> <span>LKR {{ $product->price }} /-</span> </span> <br><br>
        
                <form action="{{ route('shippingproduct.create') }}" method="get">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                    <span> <label>Quantity:</label><br>
                    <input type="number" value="1" name="qty" id="qty"/> </span><br>
                    @if(empty(Auth()->user()->id))
                        <input type="submit" value="buynow" class="btn btn-success" data-toggle="modal" data-target="#login">
                        <a data-toggle="modal" data-target="#login" class="btn btn-info"> Add to card</a>
                    @else
                    <table><tr> 
                        <td>
                        <input type="submit" value="buynow" class="btn btn-success">
                        </td>
                        <td>
                            <a href="" class="btn btn-info"> Add to card </a>  
                    @endif
                        </td>
                    </tr></table>
                </form>
                
            </span>
        </div><!--/product-information-->

		</div>
		</div>
	</div>
</div>

@endsection
