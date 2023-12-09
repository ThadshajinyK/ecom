@extends('layouts.frontend.header')
@section('content')


<div id="mainBody">
	<div class="container">
	    <div class="row">

            <div class="span7" style="width:400px;">             

                <h3 style="margin-left:50px;">  Select Your Payment Method </h3>  
                    <article class="card">
                        <div class="card-body p-5">

                            <ul>
                                <li class="nav-item">
                                    <input type="radio" name="payment_id" id="card" onchange="card();" value="1">
                                    <label for="card">  Card </label>
                                </li>
                                <li class="nav-item">
                                    <input type="radio" name="payment_id" id="cash" onchange="cash()" value="2" checked>
                                    <label for="cash">  Cash On Delivery </label>
                                </li>
                            </ul>

                            <div id="cardform" style="visibility:hidden">
                                <form action="" method="post" >
                                    <input type="hidden" name="payment_id" id="payment_id" value="1">
                                    <div class="form-group">
                                        <label for="username">Full name (on the card)</label>
                                        <input type="text" class="form-control" name="username" placeholder="Visa/Credit/Debit" required>
                                    </div> 

                                    <div class="form-group">
                                        <label for="cardNumber">Card number</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="cardNumber" placeholder="**** **** **** ****">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-muted">
                                                    <i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>   
                                                    <i class="fab fa-cc-mastercard"></i> 
                                                </span>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">Expiration</span> </label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="MM" name="">
                                                    <input type="number" class="form-control" placeholder="YY" name="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                                <input type="number" class="form-control" required="">
                                            </div> 
                                        </div>
                                    </div> 

                                    <button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>
                                </form>
                            </div>

                            <div id="cashform" style="margin-top:-340px; margin-left:220px;">
                                    <form action="{{ route('order.confirm') }}" method="post">
                                    @csrf
                                        <input type="hidden" name="payment_id" id="payment_id" value="cashondelivery">
                                        <input type="hidden" name="product_id" id="product_id" value="{{ $product_id }}">
                                        <input type="hidden" name="qty" id="qty" value="{{ $qty }}">
                                        <input type="submit" value="CashOnDelivery" class="btn btn-success">
                                    </form>
                            </div>
    
                        </div> 
                    </article>
            </div>
            

            <div class="span5">	
                
            </div>


		</div>
	</div>
</div>


<script>
function card(){
    document.getElementById('cardform').style.visibility = 'visible';
    document.getElementById('cashform').style.visibility = 'hidden';
}

function cash(){
    document.getElementById('cashform').style.visibility = 'visible';
    document.getElementById('cardform').style.visibility = 'hidden';
}

</script>

@endsection 