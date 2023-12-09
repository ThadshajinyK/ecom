
@extends('layouts.frontend.header')
@section('content')

<div id="mainBody">
	<div class="container">
	    <div class="row">

<!-- Sidebar ================================================== -->
    @include('frontend/categary/index')
<!-- Sidebar end=============================================== -->
            <div class="span9">
                Customer
            </div>

        </div>
    </div>
</div>


@endsection
