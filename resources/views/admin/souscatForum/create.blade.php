@extends('layouts.menu_admin')
@section('title', 'Ajout Sous-categorie Forum')
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
      <h2>Categorie : <strong>{{ $categorie->libelle }}</strong></h2>   
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('souscat.store', $categorie) }}" enctype="multipart/form-data"> 
      @csrf
        <hr class="my-4" />
        <!-- Description -->
        <h6 class="heading-small text-muted mb-4">Nouvelle Sous-Categorie</h6>
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

              <div class="form-group">
                <label class="form-control-label" for="image">Image : </label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
{{-- 
              <div class="form-group">
                <input type="text"  hidden name="categorie_id" id="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror" value="{{ $categorie->id }}">
                @error('categorie_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> --}}
        </div>
                <div class="text-center">
                 <button type="submit" class="btn btn-primary mt-4">nouvelle Sous-Categorie  </button>
            </div>
            </div>
      </form>
    </div>
  </div>


@endsection