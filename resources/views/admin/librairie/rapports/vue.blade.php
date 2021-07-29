@extends('layouts.menu_admin')

  @section('menu_admin')
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('rapport') }}"><i class="fas fa-home"></i> Rapport de Stage</a></li>
                  <li class="breadcrumb-item">Visualisation</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Dark table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header border-1">
              <h3 class="mb-0">Aperçu du rapport  <em>"{{$rapport->theme_rapport}}"</em></h3>
            </div>
            <div class="card-body">
            <p><u> Descripition:</u> {{$rapport->description}}</p>
              <div class="d-flex">
                <iframe src="{{url('/storage/Rapport-'.$rapport->rapport)}}" frameborder="0" height="400px" width="400px" style="margin-left:50px"></iframe>
                <img src="{{url('/storage/Rapport-'.$rapport->photo_rapport)}}" height="400px" width="400px" style="margin-left: 70px; border: 1px solid;" alt="">
              </div>
              
            </div>
          </div>
        </div>
      </div>
      @endsection    