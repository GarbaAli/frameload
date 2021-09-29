
	@include('layouts.header')
	<!-- END nav -->
	
	<section class="hero-wrap hero-wrap-2" style="background-image: url('assets/img/bg_2.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2">
						<a href="{{ route('show_rapport') }}">Rapports de Stage <i class="fa fa-chevron-right"></i></a></span>
						<span>{{$rapports->theme_rapport}} - {{$rapports->filiere->code_filiere}} - {{$rapports->annee_rapport}} <i class="fa fa-chevron-right"></i></span>
					</p>
					<h1 class="mb-0 bread">Rapports de Stage</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="no-gutters slider-text align-items-end justify-content-center col-md-12 ftco-animate pb-5 text-center">
					<h3 class="mb-0 bread">Informations sur le rapport</h3>
				</div>
				<div class="col-lg-12">
					<div class="row">	
						<div class="col-md-7 d-flex align-items-stretch ftco-animate">
							<div>
								<p style="color: black"><b> Thème :</b> {{$rapports->theme_rapport}}</p>
								<p style="color: black"><b> Filière :</b> {{$rapports->filiere->libelle_filiere}}</p>
								<p style="color: black"><b>Auteur :</b> {{$rapports->auteur_rapport}}</p>
								<p style="color: black"><b>Description :</b> {{$rapports->description}}</p>
								<p style="color: black"><b>Année :</b> {{$rapports->annee_rapport}}</p>
								<p style="color: black"><b>Prix :</b> {{$rapports->prix}} FCFA</p>
								<!-- <p> <a href="{{ route('rapport_pdf', $rapports->id) }}" class="btn btn-primary">Télécharger</a></p> -->
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
									Télécharger
								</button>
							
							</div>
						</div>
						<div class="col-md-4 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<p  class="no-gutters slider-text align-items-end justify-content-center col-md-12 text-center" style="color: black"><b>Aperçu du rapport</b></p>
								<object data="{{url('/storage/Rapport-'.$rapports->rapport)}}#toolbar=0" type="application/pdf" height="300px" style="margin-left:20px"></object>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modalités de téléchargement</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="{{route('rapport.code', $rapports->id)}}" method="">
						<div class="modal-body">
							<div class="form-group">
								<label>Code de téléchargement</label>
								<input type="text" class="form-control" name="code" placeholder="Entrer le code...">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							<button type="submit" class="btn btn-primary">Valider</button>
						</div>
					</form>
					
				</div>
			</div>
		</div>
							
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