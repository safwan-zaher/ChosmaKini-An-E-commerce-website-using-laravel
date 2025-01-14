
<style>
#top-header {
  background-color: #EEE2DC;

}


#header {
  background-color: #EDC7B7;

}






</style>

<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> 01765537681</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> safwandrmc727@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> KUET</a></li>
					</ul>
					<ul class="header-links pull-right">
						@php

						$customer_id = Session::get('id');
						

						@endphp
						@if($customer_id!=Null)
				
						<li><a href="{{url('/cus-logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>

						@else

						<li><a href="{{url('/login-check')}}"><i class="fa fa-user-o"></i> Login</a></li>

						@endif
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form actions="{{url('/search')}}" method= "GET">
									<select class="input-select" name="category">
										<option value="01">All Categories</option>
										@foreach($categories as $category)
										<option >{{$category->name}}</option>
										@endforeach
									</select>
									<input class="input" name="product" placeholder="Search here" value="{{request('')}}">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								

								<!-- Cart -->
								@php
								function cardArray()
                                {
   									 $cartCollection = \Cart::getContent();
  									 return $cartCollection->toArray();
								}
								$cart_array = cardArray();
								@endphp
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?=count($cart_array) ?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@foreach($cart_array as $v_add_cart)
											@php
											$productId = $v_add_cart['id'];
										    $images = Session::get('cart_image_'.$productId);
   											 if (!empty($images)) {
  										      $images = explode('|', $images);
       											 $firstImage = $images[0];
    										}
											@endphp
											<div class="product-widget">
												<div class="product-img">
													<img src="{{asset('/image/'.$firstImage)}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$v_add_cart['name']}}</a></h3>
													<h4 class="product-price"><span class="qty">{{$v_add_cart['quantity']}}</span>&#2547;{{$v_add_cart['price']}}</h4>
												</div>
												<a class="action" href="{{url('/delete-cart/'.$v_add_cart['id'])}}" ><i class="fa fa-close"></i></a>
											</div>
											@endforeach
										</div>
										<div class="cart-summary">
											<small><?=count($cart_array)?> Item(s) selected</small>
											<h5>SUBTOTAL: &#2547;{{Cart::getTotal()}}</h5>
										</div>
										<div class="cart-btns">
											@if($customer_id!=Null)

											<a style="width:100%; background-color: #D10024;" href="{{url('/checkout')}}"> <i class="fa fa-arrow-circle-right"></i>Checkout </a>

											@else
											<a style="width:100%; background-color: #D10024;" href="{{url('/login-check')}}"> <i class="fa fa-arrow-circle-right"></i>Checkout </a>
											@endif
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>