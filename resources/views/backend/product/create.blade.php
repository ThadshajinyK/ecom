@extends('layouts.backend.dashboard')
@section('content')

<div class="product_create">
<h4 align="center" style="margin-bottom:30px;"> <b>  Add Your New Product </b> </h4>
<div class="container">
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" onsubmit="return(validate());" name="createform">
    @csrf
    
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="name" class="text-uppercase"> Product Name </label>
                <input type="text" class="form-control " id="name" name="name" placeholder="Product Name" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="barcode" class="text-uppercase"> Categary </label>
                <select name="categary" id="categary" class="form-control">
                    <option value="select"> Select Your Categary </option>
                    @foreach($categaries as $categary)
                        <option value="{{ $categary->id }}"> {{ $categary->categary_name }} </option>
                    @endforeach
                </select>
                <span class="error"><p id="categary_error"> </p></span>
            </div>
            <div class="col-md-3 mb-3">
                <label for="price" class="text-uppercase"> Price </label>
                <input type="text" class="form-control " id="price" name="price" placeholder="Price"  required>
                <span class="error"><p id="price_error"> </p></span>
            </div>
            
        </div>


        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="image" class="text-uppercase"> Main Image </label> <br>
                <input type="file" class="form-control " id="image" name="image" required>
                <span class="error"><p id="image_error"> </p></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="qty" class="text-uppercase"> Quantity </label>
                <input type="text" class="form-control " id="qty" name="qty" placeholder="Quantity"  required>
                <span class="error"><p id="qty_error"> </p></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="qty" class="text-uppercase"> Color </label>
                <input type="text" class="form-control " id="color" name="color" placeholder="Color"  required>
                <span class="error"><p id="qty_error"> </p></span>
            </div>            
        </div>

        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="description" class="text-uppercase"> Description </label>
                <textarea name="description" id="description" cols="description" rows="1" cols="4" class="form-control"  required></textarea>
            </div>
        </div>

        <br>
        <br>

        <br>
        <div style="margin-bottom:30px;">
            <input type="submit" value="Add" class="btn btn-primary">
            <a href="{{ route('product.index') }}" class="btn btn-danger"> Cancel </a>
        </div>
</form>
</div>

@endsection