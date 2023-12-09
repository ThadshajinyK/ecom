@extends('layouts.backend.dashboard')
@section('content')
<link rel="stylesheet" href="{{ asset('css/froent.css') }}">

<div class="container">
		<div class="card" style="margin-top:-30px;">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="details col-md-6">
                 
						<h3 class="title mb-3"> First Name : {{ $user->fname }}</h3>
						<h3 class="title mb-3"> Last Name : {{ $user->lname }}</h3>
						<h3 class="title mb-3"> Email : {{ $user->email }}</h3>
						
						<br>
						<a href="{{ route('customer.index') }}" class="btn btn-primary"> Back </a>
						<hr>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection

