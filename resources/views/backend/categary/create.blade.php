@extends('layouts.backend.dashboard')
@section('content')

<div class="product_create">
<h4 align="center" style="margin-bottom:30px;"> <b>  Add Your New Categary </b> </h4>
<div class="container">
    <form action="{{ route('categary.store') }}" method="post" enctype="multipart/form-data" onsubmit="return(validate());" name="createform">
    @csrf
    
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="name" class="text-uppercase"> Categary Name </label>
                <input type="text" class="form-control " id="name" name="name" placeholder="Categary Name" required>
            </div>            
        </div>
        <br>
        <div style="margin-bottom:30px;">
            <input type="submit" value="Add" class="btn btn-primary">
            <a href="{{ route('categary.index') }}" class="btn btn-danger"> Cancel </a>
        </div>
</form>
</div>

@endsection