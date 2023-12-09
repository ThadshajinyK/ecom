@extends('layouts.frontend.header')
@section('content')

<div id="mainBody">
	<div class="container">
	<div class="row">

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> Registration</li>
    </ul>
	<h3> Admin Registration</h3>	
	<div class="well">
	<form class="form-horizontal" method="POST" action="{{ route('register.admin') }}">
    @csrf
		<h4>Your personal information</h4>
		
		<div class="control-group">
			<label class="control-label" for="inputFname1"> Name <sup>*</sup></label>
			<div class="controls">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>
		 </div>

		<div class="control-group">
            <label class="control-label" for="input_email">Email <sup>*</sup></label>
            <div class="controls">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
	    </div>	  

        <div class="control-group">
            <label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
            <div class="controls">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

         <div class="control-group">
            <label class="control-label" for="inputPassword1"> Confirm Password <sup>*</sup></label>
            <div class="controls">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
            </div>
        </div>	  
		
	  </div>

	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Register" />
			</div>
		</div>		
	</form>
</div>

</div>
</div>
</div>
</div>

@endsection