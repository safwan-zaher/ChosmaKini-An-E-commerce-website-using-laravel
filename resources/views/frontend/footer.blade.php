<style>
	

#bottom-footer {
  background-color: #EEE2DC;
}


/* footer.css */
#footer {
  background-color:#EDC7B7;
  color: #123C69; /* Set the desired text color */
}

#footer a {
  color: #123C69; /* Set the desired link color */
}

#footer .footer-title {
  color: #123C69; /* Set the desired title color */
}

/* Lighter hover color */
#footer a:hover {
  color: #4D8EB7; /* Set the desired lighter hover color */
}

/* Rest of the footer styles */


</style>
<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>It's an eye-wear company near Teligati where you can easily get your frames.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>122 KUET Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>Khulna</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>safwandrmc727@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
								@foreach($categories as $category)
						        <li><a href="{{url('/product_by_cat/'.$category->id)}}">{{$category->name}}</a></li>
						        @endforeach
									
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#" >About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
					
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>