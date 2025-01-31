<?php 
use App\Models\Product;

?>
@extends('frontend.master')
@section('content')



		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">

							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
                                @foreach($categories as $category )
                                @php
                                    $catProductCount = \App\Models\Product::catProductCount($category->id);
                                @endphp
								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										<li type ="none">
                                            <a href="{{url('/product_by_cat/'.$category->id)}}">
                                                {{$category->name}}
                                            </a>
                                            <small>({{$catProductCount}})</small>
                                        </li>

										
									</label>
								</div>
                                @endforeach
							</div>
						</div>
						<!-- /aside Widget -->






						<!-- aside Widget -->
						<!-- <div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div> -->
						<!-- /aside Widget -->

						<!--  aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
                                @foreach($brands as $brand)
                                @php
                                    $brandProductCount = \App\Models\Product::brandProductCount($brand->id);
                                @endphp
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										<li type ="none">
                                            <a href="{{url('/product_by_brand/'.$brand->id)}}">
                                                {{$brand->name}}
                                            </a>
                                            <small>({{$brandProductCount}})</small>
                                        </li>
									</label>
								</div>
                                @endforeach
							
							</div>
						</div>
						<!-- /aside Widget --> 

						
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
							

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						
                        
                        
                        
                        <!-- store products -->

						<div class="row">
                            @foreach($products as $product)
                            @php

										$product['image']=explode('|',$product->image);
										$images = $product->image[0];


					        @endphp
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img"><a href="{{url('/view-details'.$product->id)}}">
										<img src="{{asset('/image/'.$images)}}" height="250px" widhth="550px">
										<div class="product-label">
											<span class="sale">-30%</span>
											<span class="new">NEW</span>
										</div></a>
									</div>
									<div class="product-body">
                                    <p class="product-category"><a href="{{url('/view-details'.$product->id)}}">{{$product->category->name}}</a></p>
								<h3 class="product-name"><a href="{{url('/view-details'.$product->id)}}">{{$product->name}}</a></h3>
								<h4 class="product-price"><a href="{{url('/view-details'.$product->id)}}">&#2547;{{$product->price}}
                                    <del class="product-old-price">&#2547;{{$product->price}}</del></a></h4>
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
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
                               
							</div>
                            @endforeach


						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection