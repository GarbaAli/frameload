<?php
// header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Frameload</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap/fontawesome.css')}}">
	
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css')}}">

	<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href=""><span>Frameload</span></a>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="{{route('librairie')}}" class="nav-link">Librairie</a></li>
				</ul>
			</div>
		</div>
	</nav>