@extends('layouts.backend.dashboard')
@section('content')
<link rel="stylesheet" href="{{ asset('css/froent.css') }}">

<div class="container">
		<div class="card" style="margin-top:-30px;">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="details col-md-6">
                 
						<h3 class="title mb-3">{{ $categary->categary_name }}</h3>
						<dl class="param param-feature">
							<dt>Products</dt>
							<dd>
								@foreach($categary->products as $product)
									<a href="{{ route('product.show',$product->id) }}"> {{ $product->product_name }} </a><br>
								@endforeach
							</dd>
						</dl>
						<br>
						<a href="{{ route('categary.index') }}" class="btn btn-primary"> Back </a>
						<hr>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection

