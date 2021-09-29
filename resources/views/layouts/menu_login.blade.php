
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>@yield('title')</title>

  <link rel="icon" href="{asset('admin/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{asset('admin/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{asset('admin/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('admin/css/argon.css?v=1.2.0')}}" type="text/css">
</head>

<span class="mask bg-gradient-dark opacity-7"></span>
<body style="background-image: url({{ asset('images/frameload/index.jpg') }});background-size: cover;">
  <!-- Mask -->
  
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/frameload/logo3.png') }}" style="width: 150px;height:100px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
                {{-- <img src="../assets/img/brand/blue.png"> --}}
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{route('login')}}" class="nav-link">
              <strong class="nav-link-inner--text">Log In</strong>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">
              <strong class="nav-link-inner--text">Register</strong>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header py-8 py-lg-8 pt-lg-9"> 
    </div>
    <!-- Page content -->

    @yield('body_login')

  </div>

     <!-- Core -->
 <script src="{{asset('admin/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('admin/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>