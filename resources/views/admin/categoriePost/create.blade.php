@extends('layouts.menu_admin')

@section('menu_admin')

<div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
        </div>
        <div class="col-4 text-right">
          <a href="{{ route('categoriePost.index') }}" class="btn btn-sm btn-primary">Retour</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('categoriePost.store') }}"> 
      @csrf
        <hr class="my-4" />
        <!-- Description -->
        <h6 class="heading-small text-muted mb-4">Nouvelle categorie</h6>
        <div class="row">
        <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" for="libelle">Libelle : </label>
                <input type="text" name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror" placeholder="libelle" value="{{ old('libelle') }} " autocomplete="libelle" autofocus>
                @error('libelle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
        </div>
                <div class="text-center">
                 <button type="submit" class="btn btn-primary mt-4">nouvelle categorie  </button>
            </div>
            </div>
      </form>
    </div>
  </div>


@endsection