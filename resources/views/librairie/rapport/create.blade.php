
@include('layouts.header')
    <!-- Header -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/img/bg_2.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2">
						<a href="{{ route('show_rapport') }}">Rapports de Stage <i class="fa fa-chevron-right"></i></a></span>
						<span>Nouveau Rapport <i class="fa fa-chevron-right"></i></span>
					</p>
					<h1 class="mb-0 bread">Rapports de Stage</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 d-flex align-items-stretch">
								<div class="contact-wrap p-md-5 p-4">
									<h3 class="mb-4">Ajouter un Rapport</h3>
									<form method="POST" action="{{ route('rapport.store') }}" enctype="multipart/form-data" id="contactForm" name="contactForm" class="contactForm">
									@csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Filière</label>
													<select name="filiere_id" id="" class="form-control">
													<option value="">Sélectionner une filière</option>
													@foreach($fil as $fils)
														<option value="{{$fils->id}}">{{$fils->code_filiere}}</option>
													@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label>Auteur</label>
													<input type="text" class="form-control" name="auteur_rapport" placeholder="Entrer l'auteur du rapport">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Thème</label>
													<input type="text" class="form-control" name="theme_rapport" placeholder="Entrer le thème du rapport">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Description</label>
													<textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Année</label>
													<select name="annee_rapport" id="" class="form-control">
													<option value="">Sélectionner une année</option>
													<option value="0">2021</option>
													<option value="1">2020</option>
													<option value="2">2019</option>
													<option value="3">2018</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label> Rapport en PDF</label>
													<input type="file" name="rapport" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Enregistrer" class="btn btn-primary">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

      <!-- Footer -->
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