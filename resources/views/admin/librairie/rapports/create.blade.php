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
                  <li class="breadcrumb-item"><a href="{{ route('rapport') }}"><i class="fas fa-home"></i> Rapports de Stage</a></li>
                  <li class="breadcrumb-item">Nouveau Rapport</li>
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
        <div class="col-lg-11">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-6">
                  <h3 class="mb-0">Ajouter un Rapport </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('rapport.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Filière</label>
                        <select name="filiere_id" id="" class="form-control">
                          <option value="">Sélectionner une filière</option>
                          @foreach($fil as $fils)
                            <option value="{{$fils->id}}">{{$fils->code_filiere}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Auteur</label>
                        <input type="text" class="form-control" name="auteur_rapport" placeholder="Entrer l'auteur du rapport">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Thème</label>
                        <input type="text" class="form-control" name="theme_rapport" placeholder="Entrer le thème du rapport">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Année</label>
                        <select name="annee_rapport" id="" class="form-control">
                          <option value="">Sélectionner une année</option>
                          <option value="0">2021</option>
                          <option value="1">2020</option>
                          <option value="2">2019</option>
                          <option value="3">2018</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Image</label>
                        <input type="file" name="photo_rapport" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label"> Rapport en PDF</label>
                        <input type="file" name="rapport" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Prix</label>
                        <input type="number" class="form-control" name="prix" placeholder="Entrer le prix du rapport">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Statut</label>
                        <select name="statut" id="" class="form-control">
                          <option value="">Sélectionner un statut</option>
                          <option value="0">Valider</option>
                          <option value="1">En attente</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endsection    