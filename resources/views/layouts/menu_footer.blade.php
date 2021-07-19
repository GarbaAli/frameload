<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Frameload- @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('master/index/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('master/index/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('master/index/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('master/index/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('master/index/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('master/index/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('master/index/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('master/index/css/style.css') }}">
    <!-- Input personaliser -->
@yield('css_trixEditor') 
@yield('script_trixEditor')
@yield('css_forum')
@yield('token')
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
   <div class="container">
     <a href="{{ url('/') }}">
        <img src="{{ asset('images/frameload/logo3.png') }}" width="150px">
    </a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="oi oi-menu"></span> Menu
   </button>

   <div class="collapse navbar-collapse" id="ftco-nav">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link"><strong>Accueil</strong></a></li>
         <li class="nav-item"><a href="about.html" class="nav-link"><strong>A propos</strong></a></li>
         <li class="nav-item"><a href="courses.html" class="nav-link">Librairie</a></li>
         <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
         <li class="nav-item"><a href="{{ route('forum') }}" class="nav-link">Forum</a></li>
         @guest
         <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Sign In</a></li>
         @endguest 
         @auth
         <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="!#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder"  width="50px" height="50" src="{{Auth::user()->profile->getImage() }} " class="rounded-circle">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{ route('profiles.show', Auth::user()->name) }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Mon profil</span>
                </a>
                @can('manager-users')
                    <a href="{{ route('users.index') }}" class="dropdown-item">
                         <i class="ni ni-single-02"></i>
                         <span>Administration</span>
                     </a>
                @endcan
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 <i class="ni ni-user-run"></i>
                 <span>LogOut</span>
                 </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
         @endauth
     </ul>
 </div>
</div>
</nav>
<!-- END nav -->

@yield('content')



<!-- FOOTER FOOTER -->
<footer class="ftco-footer ftco-no-pt">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md pt-5">
          <div class="ftco-footer-widget pt-md-5 mb-4">
            <a href="{{ url('/') }}">
              <img src="{{ asset('images/frameload/logo3.png') }}" width="200px">
            </a>
            
         </div>
  </div>
  <div class="col-md pt-5">
      <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
        <h2 class="ftco-heading-2">Menu</h2>
        <ul class="list-unstyled">
          <li><a href="{{ url('/') }}" class="py-2 d-block">Accueil</a></li>
          <li><a href="#" class="py-2 d-block">A propos</a></li>
          <li><a href="#" class="py-2 d-block">Librairie</a></li>
          <li><a href="{{ route('blog') }}" class="py-2 d-block">Blog</a></li>
          <li><a href="#" class="py-2 d-block">Forum</a></li>
          <li><a href="#" class="py-2 d-block">Nos Formations</a></li>
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
             <li><a href="#"><span class="fa fa-paper-plane"></span><span class="text">contact@frameload.net</span></a></li>
         </ul>
     </div>
  </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://frameload.net" target="_blank">Frameload</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
    </div>
  </div>
  </div>
  </footer>
  
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
 
  
  {{-- <link rel="stylesheet" href="{{ asset('master/index/css/style.css') }}"> --}}
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
{{-- <script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('plugins/masonry/masonry.js') }}"></script> --}}

{{-- <script src="{{ asset('js/blog.js') }}"></script> --}}
<script src="{{ asset('js/forum.js') }}"></script>

{{-- <script src="{{ asset('master/index/js/jquery.min.js') }}"></script> --}}
<script src="{{ asset('master/index/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('master/index/js/popper.min.js') }}"></script>
<script src="{{ asset('master/index/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('master/index/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('master/index/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('master/index/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('master/index/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('master/index/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('master/index/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('master/index/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('master/index/js/scrollax.min.js') }}"></script>
<script src="{{ asset('master/index/js/main.js') }}"></script>

</body>
</html> 


@yield('ajax')
@yield('parse_date')