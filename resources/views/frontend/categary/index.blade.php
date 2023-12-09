<div id="sidebar" class="span3">
	<div class="well well-small"><a id="myCart"><img src="{{ asset('images/ico-cart.png') }}" alt="cart"> Categaries </a></div>
	
	<ul id="sideManu" class="nav nav-tabs nav-stacked">
		@foreach($categary as $c)
			<li class="subMenu open"><a> {{ $c->categary_name }} [{{ $c->products->count() }}] </a></li>
		@endforeach
	</ul>

	<br/>
</div>
