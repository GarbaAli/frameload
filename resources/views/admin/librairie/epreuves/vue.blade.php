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
                  <li class="breadcrumb-item"><a href="{{ route('epreuve') }}"><i class="fas fa-home"></i> Epreuves</a></li>
                  <li class="breadcrumb-item">Visualisation</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('epreuve') }}" class="btn btn-sm btn-neutral">Retour</a>
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
            <div class="card-header border-0">
              <h3 class="mb-0">Aperçu de l'épreuve <em>"{{$epreuve->libelle_epreuve}}"</em></h3>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <iframe src="{{url('/storage/'.$epreuve->libelle_epreuve.'-'.$epreuve->pdf_epreuve)}}" frameborder="0" height="400px" width="400px" style="margin-left:50px"></iframe>
                <img src="{{url('/storage/'.$epreuve->libelle_epreuve.'-'.$epreuve->photo_epreuve)}}" height="400px" width="400px" style="margin-left: 70px; border: 1px solid;" alt="">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    @endsection