@extends('frontend.master')
@section('content')
<!-- Order Details -->
<div class="col-md-4"></div>
<div class="col-md-4 order-details" style="margin-top: 100px; margin-bottom: 50px;">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							@foreach($cart_array as $cart)
							<div class="order-products">
								<div class="order-col">
									<div>{{$cart['quantity']}} x {{$cart['name']}}</div>
									<div>&#2547;{{Cart::get($cart['id'])->getPriceSum()}}</div>
								</div>
							</div>
							@endforeach
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>&#2547;50</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">&#2547;{{Cart::getTotal()+50}}</strong></div>
							</div>
						</div>
						<form action="{{url('/order-place')}}" method="post">
							@csrf
						<div class="section-title text-center" style="margin-top: 40px;">
							<h4 class="title" style="color: #D10024;">Please Select a payment method</h4>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1" value="cash">
								<label for="payment-1">
									<span></span>
									Cash on Delivery
								</label>
								<div class="caption">
									<p>you can also select cash on delivery</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2" value="bkash">
								<label for="payment-2">
									<span></span>
									Bkash
								</label>
								<div class="caption">
									<p>Bkash No: 01*********</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3" value="nogod">
								<label for="payment-3">
									<span></span>
									Nogod
								</label>
								<div class="caption">
									<p>Nogod No: 01*********</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-4" value="rocket">
								<label for="payment-4">
									<span></span>
									Rocket
								</label>
								<div class="caption">
									<p>Rocket No: 01*********</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<input type="submit" class="primary-btn order-submit" value="Place Order" style="float: right;"/>
						</form>
					</div>
					<div class="col-md-4"></div>
					<!-- /Order Details -->

@endsection