@extends('frontend.master')
@section('content')

    		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					@foreach($categories as $category)
					<div class="col-md-4 col-xs-6">
						
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('/storage/'.$category->image)}}" style="height:140px;width:400px">
							</div>
							<div class="shop-body">
								<h3>{{$category->name}}<br>Collection</h3>
								<a href="{{url('/product_by_cat/'.$category->id)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					@endforeach
					<!-- /shop -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">	
								@foreach($categories as $category)
						        <li><a href="{{url('/product_by_cat/'.$category->id)}}">{{$category->name}}</a></li>
						        @endforeach
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach($products as $product)
										<!-- multiple image seperation -->
										@php

										$product['image']=explode('|',$product->image);
										$images = $product->image[0];


										@endphp
										<!-- product -->
										<div class="product">
											<div class="product-img"><a href="{{url('/view-details'.$product->id)}}">
												<img src="{{asset('/image/'.$images)}}" height="250px" widhth="550px" >
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div></a>
											</div>
											<div class="product-body">
												<p class="product-category"><a href="{{url('/view-details'.$product->id)}}">{{$product->category->name}}</a></p>
												<h3 class="product-name"><a href="{{url('/view-details'.$product->id)}}">{{$product->name}}</a></h3>
												<h4 class="product-price"><a href="{{url('/view-details'.$product->id)}}">&#2547;{{$product->price}}<del class="product-old-price">&#2547;{{$product->price}}</del></a></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
			
													<button class="quick-view"><a href="{{url('/view-details'.$product->id)}}"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<form action="{{url('add-to-cart')}}" method="post">
											@csrf
											<div class="add-to-cart">
												<input type="hidden" name="quantity" value="1">
												<input type="hidden" name="id" value="{{$product->id}}">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
													
											</form>
										</div>
										<!-- /product -->
										@endforeach

									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
								@foreach($categories as $category)
						        <li><a href="{{url('/product_by_cat/'.$category->id)}}">{{$category->name}}</a></li>
						        @endforeach
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->





					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach($topProducts as $topProduct)
										<!-- multiple image seperation -->
										@php

										$topProduct['image']=explode('|',$topProduct->image);
										$images = $topProduct->image[0];


										@endphp
										<!-- product -->
										<div class="product">
											<div class="product-img"><a href="{{url('/view-details'.$topProduct->id)}}">
												<img src="{{asset('/image/'.$images)}}" height="250px" widhth="550px" >
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div></a>
											</div>
											<div class="product-body">
												<p class="product-category"><a href="{{url('/view-details'.$topProduct->id)}}">{{$topProduct->category->name}}</a></p>
												<h3 class="product-name"><a href="{{url('/view-details'.$topProduct->id)}}">{{$topProduct->name}}</a></h3>
												<h4 class="product-price"><a href="{{url('/view-details'.$topProduct->id)}}">&#2547;{{$topProduct->price}}<del class="product-old-price">&#2547;{{$topProduct->price}}</del></a></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
												<button class="quick-view"><a href="{{url('/view-details'.$topProduct->id)}}"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<form action="{{url('add-to-cart')}}" method="post">
											@csrf
											<div class="add-to-cart">
												<input type="hidden" name="quantity" value="1">
												<input type="hidden" name="id" value="{{$topProduct->id}}">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
													
											</form>
										</div>
										<!-- /product -->
										@endforeach

									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->





				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

@endsection