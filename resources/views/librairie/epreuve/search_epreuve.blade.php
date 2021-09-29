
	@include('layouts.header')
	<!-- END nav -->
	
	<section class="hero-wrap hero-wrap-2" style="background-image: url('assets/img/bg_2.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2">
						<a href="{{ route('librairie') }}">Librairie <i class="fa fa-chevron-right"></i></a></span>
						<span>Epreuves <i class="fa fa-chevron-right"></i></span>
					</p>
					<h1 class="mb-0 bread">Epreuves</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 sidebar">
					<div class="sidebar-box bg-white ftco-animate">
						<form action="{{route('epreuve.search')}}" class="d-flex">
							<div class="form-group mb-0 mr-1">
								<input type="search" name="q" id="q" placeholder="Rechercher..." class="form-control">
							</div>
							<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
				<div>
					<span id="nbr">0</span>
				</div>
				<div class="col-lg-10">
					<div class="row">
						<table class="table">
							<tbody>
								@foreach($epreuve as $epreuves)
								<tr>
									<td>
										<a href="{{ route('view_epreuve', $epreuves->id)}}" style="color: black;">
											<i class="fa fa-file-pdf"></i> {{$epreuves->libelle_epreuve}} - {{$epreuves->filiere->code_filiere}} - {{$epreuves->annee_epreuve}}
										</a>
									</td>
									<!-- <td><button id="epreuve">bouton</button></td> -->
									<td><a href="{{ route('epreuve_pdf', $epreuves->id) }}" style="color: black;" onClick="Compteur();"><i class="fa fa-download"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

		<footer class="ftco-footer ftco-no-pt">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">About</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<ul class="ftco-footer-social list-unstyled float-md-left float-lft">
								<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
							<h2 class="ftco-heading-2">Help Desk</h2>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">Customer Care</a></li>
								<li><a href="#" class="py-2 d-block">Legal Help</a></li>
								<li><a href="#" class="py-2 d-block">Services</a></li>
								<li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
								<li><a href="#" class="py-2 d-block">Refund Policy</a></li>
								<li><a href="#" class="py-2 d-block">Call Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Recent Courses</h2>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">Computer Engineering</a></li>
								<li><a href="#" class="py-2 d-block">Web Design</a></li>
								<li><a href="#" class="py-2 d-block">Business Studies</a></li>
								<li><a href="#" class="py-2 d-block">Civil Engineering</a></li>
								<li><a href="#" class="py-2 d-block">Computer Technician</a></li>
								<li><a href="#" class="py-2 d-block">Web Developer</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Have a Questions?</h2>
							<div class="block-23 mb-3">
								<ul>
									<li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
									<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
									<li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">

						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						</div>
					</div>
				</div>
			</footer>
			
			

			<!-- loader -->
			<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


			<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
			<script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
			<script src="{{ asset('assets/js/popper.min.js')}}"></script>
			<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
			<script src="{{ asset('assets/js/jquery.easing.1.3.js')}}"></script>
			<script src="{{ asset('assets/js/jquery.waypoints.min.js')}}"></script>
			<script src="{{ asset('assets/js/jquery.stellar.min.js')}}"></script>
			<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
			<script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
			<script src="{{ asset('assets/js/jquery.animateNumber.min.js')}}"></script>
			<script src="{{ asset('assets/js/bootstrap-datepicker.js')}}"></script>
			<script src="{{ asset('assets/js/scrollax.min.js')}}"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
			<script src="{{ asset('assets/js/google-map.js')}}"></script>
			<script src="{{ asset('assets/js/main.js')}}"></script>
			
		</body>
		</html>