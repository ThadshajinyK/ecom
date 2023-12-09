@extends('layouts.backend.dashboard')
@section('content')

<div class="product_create">
<h4 align="center" style="margin-bottom:30px;"> <b>  Edit {{ $pro->product_name }} </b> </h4>
<div class="container">
    <form action="{{ route('product.update',$pro->id) }}" method="post" enctype="multipart/form-data" onsubmit="return(validate());" name="createform">
    @csrf
    @method('put')
    
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="name" class="text-uppercase"> Product Name </label>
                <input type="text" class="form-control " id="name" name="name" placeholder="Product Name" value="{{ $pro->product_name }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="barcode" class="text-uppercase"> Categary </label>
                <select name="categary" id="categary" class="form-control">
                    <option value="select"> Select Your Categary </option>
                        <option value="{{ $categaries->id }}" {{ $pro->categary_id == $categaries->id ? "selected" : " "}}> {{ $categaries->categary_name }} </option>
                </select>
                <span class="error"><p id="categary_error"> </p></span>
            </div>
            <div class="col-md-3 mb-3">
                <label for="price" class="text-uppercase"> Price </label>
                <input type="text" class="form-control " id="price" name="price" placeholder="Price" value="{{ $pro->price }}"  required>
                <span class="error"><p id="price_error"> </p></span>
            </div>
            
        </div>


        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="image" class="text-uppercase"> Main Image </label> <br>
                <img id="blsh" src="{{ asset('images/products/'.$pro->image) }}" style="width:150px; height:150px; margin-left:60px;" /> <br><br>
                <input type="file" class="form-control " id="image" name="image"  onchange="readURL(this);" required value="{{ $pro-> image}}">
                <span class="error"><p id="image_error"> </p></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="qty" class="text-uppercase"> Quantity </label>
                <input type="text" class="form-control " id="qty" name="qty" placeholder="Quantity"  value="{{ $pro->qty }}" required>
                <span class="error"><p id="qty_error"> </p></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="color" class="text-uppercase"> Color </label>
                <input type="text" class="form-control " id="color" name="color" placeholder="Color" value="{{ $pro->color }}" required>
                <span class="error"><p id="qty_error"> </p></span>
            </div>            
        </div>

        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="description" class="text-uppercase"> Description </label>
                <textarea name="description" id="description" cols="description" rows="1" cols="4" class="form-control"  required> {{ $pro->description }} </textarea>
            </div>
        </div>

        <br>
        <br>

        <br>
        <div style="margin-bottom:30px;">
            <input type="submit" value="Edit" class="btn btn-primary">
            <a href="{{ route('product.index') }}" class="btn btn-danger"> Cancel </a>
        </div>
</form>
</div>

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blsh')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

@endsection