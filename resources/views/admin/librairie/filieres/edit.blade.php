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
                  <li class="breadcrumb-item"><a href="{{ route('filiere') }}"><i class="fas fa-home"></i> Filières</a></li>
                  <li class="breadcrumb-item">Modification</li>
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
                  <h3 class="mb-0">Modifier une Filière </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('filiere.update', $fil->id) }}">
                @csrf
                @method('PATCH')
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Cycle</label>
                        <select name="cycle_id" id="" class="form-control">
                        @foreach($cycle as $cycles)
                          <option value="{{$cycles->id}}"{{$fil->cycle_id == $cycles->id ? 'selected' : ''}}>{{$cycles->code_cycle}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Code</label>
                        <input type="text" class="form-control" name="code_filiere" value="{{ $fil->code_filiere}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Libellé</label>
                        <input type="text" class="form-control" name="libelle_filiere" value="{{ $fil->libelle_filiere}}">
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