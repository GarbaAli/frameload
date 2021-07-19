<!DOCTYPE html>
<html lang="fr">
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Unicat project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link href="plugins/video-js/video-js.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/blog.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_single.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_responsive.css') }}">

<!-- Input personaliser -->
@yield('css_trixEditor') 
@yield('script_trixEditor')
@yield('token')
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li><div class="question">As tu une question ?</div></li>
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div>001-1234-88888</div>
									</li>
									<li>
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
										<div>contact@frameload.net</div>
									</li>
								</ul>
								<div class="top_bar_login ml-auto">
									<div class="login_button"><a href="{{ route('login') }}">Register or Log In</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="{{ url('/') }}">
									<div class="logo_text">
                                        <img src="{{ asset('images/frameload/logo3.png') }}" alt="Logo Frameload" width="100px">
                                    </div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li><a href="{{ url('/') }}">Accueil</a></li>
									<li><a href="#">Nous</a></li>
									<li><a href="#">Librairie</a></li>
									<li><a href="{{ route('blog') }}">Blog</a></li>
									<li><a href="#">Forum</a></li>
								</ul>
                                @auth
                                <div class="search_button"><i aria-hidden="true">
                                  
                                    <img alt="Image placeholder" title="Profil"  width="50px" height="50" src="{{Auth::user()->profile->getImage() }}" class="rounded-circle">
                                    </i></div> 
                                @endauth
								

								<!-- Hamburger -->
								<div class="shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Apparait apres clic sur le profil -->
        @auth
            
        
		<div class="header_search_container">
			<div class="container">
				<div class="row">
					<div class="col-3">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							<li><a href="{{ route('profiles.show', Auth::user()->name) }}" class="dropdown-item">
                                <img alt="Image placeholder" title="Profil"  width="50px" height="50" src="{{Auth::user()->profile->getImage() }} " class="rounded-circle">
                              </a></li>
						</div>
					</div>
                    <div class="col-3">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							@can('manager-users')
                                <li>
                                    <a href="{{ route('users.index') }}" class="dropdown-item">
                                        <img src="{{ asset('images/admin.png') }}" title="Espace Administration"  alt="Icone Administration">
                                    </a>
                                </li>
                            @endcan
						</div>
					</div>
                    <div class="col-2">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             <i class="ni ni-user-run"></i>
                             <img src="{{ asset('images/logout.png') }}" title="Log Out" alt="Icone Administration">
                             </a>
            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
						</div>
					</div>
				</div>
			</div>			
		</div>		
        @endauth	
	</header>

	<!-- Menu pour Mobile -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="search">
			<nav class="menu_nav">
				@auth
				<ul class="menu_mm">
                    <li class="menu_mm"><a href="{{ route('profiles.show', Auth::user()->name) }}"> <img alt="Image placeholder" title="Profil"  width="50px" height="50" src="{{Auth::user()->profile->getImage() }} " class="rounded-circle"></a></li>
                    @can('manager-users')
                    <li class="menu_mm"><a href="{{ route('users.index') }}">Administration</a></li>
                    @endcan
                 
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
				@endauth
               
            </nav>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="{{ url('/') }}">Accueil</a></li>
				<li class="menu_mm"><a href="#">Propos</a></li>
				<li class="menu_mm"><a href="#">Librairie</a></li>
				<li class="menu_mm"><a href="{{ route('blog') }}">Blog</a></li>
				<li class="menu_mm"><a href="#">Forum</a></li>
			</ul>
		</nav>
	</div>
	
    @yield('content')


{{-- <script src="js/jquery-3.2.1.min.js"></script>
<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('plugins/masonry/masonry.js') }}"></script>
<script src="{{ asset('plugins/video-js/video.min.js') }}"></script>
<script src="pl{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('js/blog.js') }}"></script> --}}


{{-- Footer --}}
@extends('layouts.footer')