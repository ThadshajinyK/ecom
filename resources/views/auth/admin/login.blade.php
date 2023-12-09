@extends('layouts.frontend.header')
@section('content')

<div id="mainBody">
	<div class="container">
	<div class="row">

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> Login </li>
    </ul>
	<h3> Admin Login </h3>	
	<div class="well">
	<form class="form-horizontal" method="POST" action="{{ route('login.admin') }}">
    @csrf
		
		<div class="control-group">
			<label class="control-label" for="inputFname1">E-mail Address<sup>*</sup></label>
			<div class="controls">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
		 </div>

		 <div class="control-group">
			<label class="control-label" for="inputFname1">Password <sup>*</sup></label>
			<div class="controls">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
		 </div>	  
		
	  </div>

	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Login" />
			</div>
		</div>		
	</form>
</div>

</div>
</div>
</div>
</div>

@endsection