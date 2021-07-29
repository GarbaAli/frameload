
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
                  <li class="breadcrumb-item"><a href="{{ route('ets') }}"><i class="fas fa-home"></i> Etablissements</a></li>
                  <li class="breadcrumb-item">Nouvel Etablissement</li>
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
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Ajouter un Etablissement </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('ets.store') }}">
                @csrf
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Code</label>
                        <input type="text" class="form-control" name="code_ets" placeholder="Entrer le code de l'établissement">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Libellé</label>
                        <input type="text" class="form-control" name="libelle_ets" placeholder="Entrer le libellé de l'établissement">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Entrer une description">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Image</label>
                        <input type="file" name="image" class="form-control">
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