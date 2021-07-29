
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
        <div class="col-lg-11">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Modifier un Rapport </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('rapport.update', $rap->id) }}">
                @csrf
                @method('PATCH')
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Filière</label>
                        <select name="filiere_id" id="" class="form-control">
                          @foreach($fil as $fils)
                            <option value="{{$fils->id}}"{{$rap->filiere_id == $fils->id ? 'selected' : ''}}>{{$fils->code_filiere}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Auteur</label>
                        <input type="text" class="form-control" name="auteur_rapport" value="{{$rap->auteur_rapport}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Thème</label>
                        <input type="text" class="form-control" name="theme_rapport" value="{{$rap->theme_rapport}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="3">{{$rap->description}}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Année</label>
                        <select name="annee_rapport" id="" class="form-control">
                        @foreach($rap->getAnneeOption() as $key=>$value)
                          <option value="{{$key}}" {{$rap->annee_rapport == $value ? 'selected' : ''}}>{{$value}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Prix</label>
                        <input type="number" class="form-control" name="prix" value="{{$rap->prix}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Statut</label>
                        <select name="statut" id="" class="form-control">
                        @foreach($rap->getStatutOption() as $key=>$value)
                          <option value="{{$key}}" {{$rap->statut == $value ? 'selected' : ''}}>{{$value}}</option>
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