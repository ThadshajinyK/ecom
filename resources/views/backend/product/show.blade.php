@extends('layouts.backend.dashboard')
@section('content')
<link rel="stylesheet" href="{{ asset('css/froent.css') }}">

<div class="container">
		<div class="card" style="margin-top:-30px;">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{asset('images/products/' . $pro->image)}}"/></div>
						  <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{asset('images/products/' . $pro->image)}}"/></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
                 
	                <h3 class="title mb-3">{{ $pro->product_name }}</h3>

                    <p class="price-detail-wrap"> 
	                    <span class="price h3 text-warning"> 
		                <span class="currency">LKR </span><span class="num">{{ $pro->price }}/-</span> 
                    <dl class="item-property">
                        <dt>Description</dt>
                        <dd> {{ $pro->description }} </dd>
                    </dl>
					<dl class="param param-feature">
                        <dt>Categaries</dt>
                        <dd>
							<a href="{{ route('categary.show',$pro->categary->id) }}"> {{ $pro->categary->categary_name }} </a><br>
						</dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Quantity</dt>
                        <dd>{{ $pro->qty }}</dd>
                    </dl>

                    <br>
                    <a href="{{ route('product.index') }}" class="btn btn-primary"> Back </a>
	                <hr>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

