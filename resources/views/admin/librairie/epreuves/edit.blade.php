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
                  <li class="breadcrumb-item">Modifciation</li>
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
                  <h3 class="mb-0">Modifier une Epreuve </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('epreuve.update', $epr->id) }}">
                @csrf
                @method('PATCH')
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Etablissement</label>
                        <select name="etablissement_id" id="" class="form-control">
                          @foreach($ets as $etab)
                            <option value="{{$etab->id}}"{{$epr->etablissement_id == $etab->id ? 'selected' : ''}}>{{$etab->code_ets}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Filière</label>
                        <select name="filiere_id" id="" class="form-control">
                          @foreach($fil as $fils)
                            <option value="{{$fils->id}}"{{$epr->filiere_id == $fils->id ? 'selected' : ''}}>{{$fils->code_filiere}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Libellé</label>
                        <input type="text" class="form-control" name="libelle_epreuve" value="{{$epr->libelle_epreuve}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Type</label>
                        <input type="text" class="form-control" name="type" value="{{$epr->type}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Année</label>
                        <select name="annee_epreuve" id="" class="form-control">
                        @foreach($epr->getAnneeOption() as $key=>$value)
                          <option value="{{$key}}" {{$epr->annee_epreuve == $value ? 'selected' : ''}}>{{$value}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endsection