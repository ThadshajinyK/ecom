
@extends('layouts.frontend.header')
@section('content')

<div id="mainBody">
	<div class="container">
	    <div class="row">


            <div class="span7" style="width:400px;">             

                @if(empty($shipping->user_id) or $shipping->user_id != Auth::user()->id)
                
                <!----------- store ---------------->
                <form action="{{ route('shippingproduct.store') }}"  method="POST" class="form-horizontal">
                @csrf

                <div style="margin-top:0px; width:600px; margin-left:20px">
                    <div class="card-header"> <b> Shipping Information </b></div><br>
                    <div style="padding-top:30px" class="panel-body" >
                        <div class="form-group">  

                            @if(!empty($product_id))
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product_id }}">   
                            <input type="hidden" name="qty" id="qty" value="{{ $qty }}">
                            @endif

                            <div class="row">  
                                <div class="col-sm-6">
                                    <span class="required-lbl">* </span><label class="control-label" for="fname">First Name</label>
                                    <input id="fname" name="fname" type="text" placeholder="FirstName" class="form-control" value="{{ Auth()->user()->fname }}" size="8" required>                                      
                                </div>  
                                <div class="col-sm-6">
                                    <span class="required-lbl">* </span><label class="control-label" for="lname">Last Name</label>
                                    <input id="lname" name="lname" type="text" placeholder="LastName" class="form-control" value="{{ Auth()->user()->lname }}" required>                                      
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-sm-4">
                                    <span class="required-lbl">* </span><label class="control-label" for="province"> Shipping Province </label>
                                    <select id="province" name="province" class="form-control" onchange="dis()">
                                        <option> Select Province</option>
                                        <option value="northern"> Northern </option>
                                        <option value="eastern"> Eastern </option>
                                        <option value="Central"> Central </option>
                                        <option value="North Central"> North Central </option>
                                        <option value="North Western"> North Western </option>
                                        <option value="Sabaragamuwa"> Sabaragamuwa </option>
                                        <option value="Southern"> Southern </option>
                                        <option value="Uva"> Uva </option>
                                        <option value="Western"> Western </option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <span class="required-lbl">* </span><label class="control-label" for="district"> Shipping District </label>
                                    <select id="district" name="district" class="form-control">
                                        <option> Select District</option>
                                        <div id="northern">
                                            <option value="jaffna"> jaffna </option>
                                            <option value="kilinochi"> Kilinochi </option>
                                        </div>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <span class="required-lbl">* </span><label class="control-label" for="district"> Shipping Area </label>
                                    <select id="area" name="area" class="form-control">
                                        <option> Select Area</option>
                                        <option value="jaffna_town"> jaffna town </option>
                                        <option value="nallur"> Nallur </option>
                                    </select>
                                </div>
                            </div><br>

                            <div class="row">  
                                <div class="col-sm-12">
                                    <span class="required-lbl">* </span><label class="control-label" for="address"> Shipping Address</label>
                                    <input id="address" name="address" type="text" placeholder="Delivery Address" class="form-control" required>                                      
                                </div>
                            </div>
                        </div>
                              
                        <hr>

                        <div class="card-header"> <b> Contact Information </b></div><br>
                            <div style="padding-top:-60px" class="panel-body" >

                                <div class="form-group">       
                                    <div class="row">  
                                        <div class="col-sm-6">
                                            <span class="required-lbl">* </span><label class="control-label" for="email"> Email </label>
                                            <input id="email" name="email" type="text" placeholder="Email" class="form-control" readonly value="{{ Auth()->user()->email }}" required>                                      
                                        </div>  
                                        <div class="col-sm-6">
                                            <span class="required-lbl">* </span><label class="control-label" for="phone">Phone</label>
                                            <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" required>                                      
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="next">
                                <button class="btn btn-danger" type="button" onclick=history.go(-1)> Cancel </button>

                            </div>
                        </div>
                    
                </form>

<!--------------store end  ------------>

                @else
                    <form action="{{ route('shippingproduct.update',[$shipping->id]) }}"  method="get" class="form-horizontal">
                    @csrf
                    @method('put')

                    <div style="margin-top:0px; width:600px; margin-left:20px">
                        <div class="card-header"> <b> Shipping Information </b></div>
                            <div style="padding-top:30px" class="panel-body" >

                                <div class="form-group">  
                                    @if(!empty($product_id))
                                    <input type="hidden" name="product_id" id="product_id" value="{{ $product_id }}">   
                                    <input type="hidden" name="qty" id="qty" value="{{ $qty }}">
                                    @else
                                    @endif

                                    <div class="row">  
                                        <div class="col-sm-6">
                                            <span class="required-lbl">* </span><label class="control-label" for="fname">First Name</label>
                                            <input id="fname" name="fname" type="text" placeholder="FirstName" class="form-control" value="{{ Auth()->user()->fname }}" required>                                      
                                        </div>  
                                        <div class="col-sm-6">
                                            <span class="required-lbl">* </span><label class="control-label" for="lname">Last Name</label>
                                            <input id="lname" name="lname" type="text" placeholder="LastName" class="form-control" value="{{ Auth()->user()->lname }}" required>                                      
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="required-lbl">* </span><label class="control-label" for="province"> Shipping Province </label>
                                            <select id="province" name="province" class="form-control">
                                                <option> Select Province</option>
                                                <option value="northern" {{ ($shipping->province == 'northern') ? "selected" : "" }}> Northern </option>
                                                <option value="eastern" {{ ($shipping->province == 'eastern') ? "selected" : "" }}> Eastern </option>
                                                <option value="Central" {{ ($shipping->province == 'Central') ? "selected" : "" }}> Central </option>
                                                <option value="North Central" {{ ($shipping->province == 'North Central') ? "selected" : "" }}> North Central </option>
                                                <option value="North Western" {{ ($shipping->province == 'North Western') ? "selected" : "" }}> North Western </option>
                                                <option value="Sabaragamuwa" {{ ($shipping->province == 'Sabaragamuwa') ? "selected" : "" }}> Sabaragamuwa </option>
                                                <option value="Southern" {{ ($shipping->province == 'Southern') ? "selected" : "" }}> Southern </option>
                                                <option value="Uva" {{ ($shipping->province == 'Uva') ? "selected" : "" }}> Uva </option>
                                                <option value="Western" {{ ($shipping->province == 'Western') ? "selected" : "" }}> Western </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="required-lbl">* </span><label class="control-label" for="district"> Shipping District </label>
                                            <select id="district" name="district" class="form-control">
                                                <option> Select District</option>
                                                <option value="jaffna" {{ ($shipping->district == 'jaffna') ? "selected" : "" }}> jaffna </option>
                                                <option value="kilinochi" {{ ($shipping->district == 'kilinochi') ? "selected" : "" }}> Kilinochi </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="required-lbl">* </span><label class="control-label" for="district"> Shipping Area </label>
                                            <select id="area" name="area" class="form-control">
                                                <option> Select Area</option>
                                                <option value="jaffna_town" {{ ($shipping->area == 'jaffna_town') ? "selected" : "" }}> jaffna town </option>
                                                <option value="nallur" {{ ($shipping->area == 'nallur') ? "selected" : "" }}> Nallur </option>
                                            </select>
                                        </div>
                                    </div><br>

                                    <div class="row">  
                                        <div class="col-sm-12">
                                            <span class="required-lbl">* </span><label class="control-label" for="address"> Shipping Address</label>
                                            <input id="address" name="address" type="text" placeholder="Delivery Address" class="form-control" value="{{ $shipping->address }}" required>                                      
                                        </div>
                                    </div>
                                </div>
            
                                <hr>

                                <div class="card-header"> <b> Contact Information </b> </div><br>
                                    <div class="form-group">       
                                        <div class="row">  
                                            <div class="col-sm-6">
                                                <span class="required-lbl">* </span><label class="control-label" for="email"> Email </label>
                                                <input id="email" name="email" type="text" placeholder="Email" class="form-control" readonly value="{{ Auth()->user()->email }}" required>                                      
                                            </div>  
                                            <div class="col-sm-6">
                                                <span class="required-lbl">* </span><label class="control-label" for="phone">Phone</label>
                                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" value="{{ $shipping->phone_no }}" required>                                      
                                            </div>
                                        </div>
                                    </div>
                      
                                <input type="submit" class="btn btn-primary" value="next">
                                <button class="btn btn-danger" type="button" onclick=history.go(-1)> Cancel </button>
                            </div>
                        
                    </form>
                @endif 
            </div>
        </div>

        <div class="span5">	
            @if(!empty($product_id))
                <div class="col-md-12" style="padding-left:150px;">
                    <h4> Your Order </h4>
                    <div class="col-sm-7">
                        <img src="{{asset('images/products/' .$image)}}" height="300px" width="250px"> 
                    </div>
                    <div class="col-sm-5" style="margin-left:10px; color:ask">
                        <h4 style="color:red"> {{ $product_name }} </h4>
                        <p style="color:ask"> {{ $description }} </p>
                        <span>
                            <span> <h5> Product Price: LKR {{ $price }} /- </h5></span>
                            <span> <h5> Quantity: {{ $qty }} </h5></span>
                            <span> <h5> Order Total: LKR {{ $order_total }} /- </h5></span>
                        </span>
                    </div>
                </div>
            @endif
        </div>


		</div>
	</div>
</div>

@endsection