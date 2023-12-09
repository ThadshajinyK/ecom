@extends('layouts.frontend.header')
@section('content')

<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">

		  <div class="item active">
		  <div class="container">
			<a href="register.html"><img style="width:100%" src="{{ asset('/images/carousel/1.png') }}" alt="special offers"/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>

		  <div class="item">
		  <div class="container">
			<a href="register.html"><img style="width:100%" src="{{ asset('images/carousel/2.png') }}" alt=""/></a>
				<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>

		  <div class="item">
		  <div class="container">
			<a href="register.html"><img src="{{ asset('images/carousel/3.png') }}" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>

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
		<h4>Latest Products </h4>
			  <ul class="thumbnails">
			@foreach($product as $pro)
				<li class="span3">
				  <div class="thumbnail">
					<a  href="{{ route('item.view',[$pro->id]) }}"><img src="{{ asset('images/products/'.$pro->image) }}" width="200px;" height="200px;" alt=""/></a>
					<div class="caption">
					  <h5>Product Name : {{ $pro->product_name }}</h5>
					  <p> 
						{{ $pro->description }}
					  </p>
					  <h4 style="text-align:center"> <p class="btn btn-primary"> LKR {{ $pro->price }} /- </p></h4>
					</div>
				  </div>
				</li>
			@endforeach
			  </ul>	

		</div>
		</div>
	</div>
</div>

@endsection
