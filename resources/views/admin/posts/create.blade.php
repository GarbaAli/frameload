@extends('layouts.menu_admin')

@section('menu_admin')

<div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
        </div>
        <div class="col-4 text-right">
          <a href="{{ route('blog') }}" class="btn btn-sm btn-primary">Retour</a>
        </div>
      </div>
    </div>
    <!-- Message derreurs -->
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- Fin message errreurs -->
    <div class="card-body">
      <form method="post" action="{{ route('blog.store') }}" id="formulaire" enctype="multipart/form-data" > 
      @csrf
        <hr class="my-4" /> 
        <!-- Description -->
        <h6 class="heading-small text-muted mb-4">Nouvel Article</h6>
        <div class="row">
        <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" for="libelle">Titre : </label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <input id="ct" type="text" value="" class="@error('content') is-invalid @enderror" hidden name="content">
            <label class="form-control-label" for="content">Contenue : </label>
            
            <div id="content">
              {{ old('content') }}
            </div>
           
          </div>
       </div>
      <div class="col-lg-12">
        <div class="form-group">
          <label class="form-control-label" for="categorie">Categorie : </label>
          <select class="form-control" name="categorie" id="categorie">
              @foreach ($categories as $categorie )
                  <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
              @endforeach
          </select>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
          <label class="form-control-label" for="image">Image de Couverture : </label>
          <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
          @error('image')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
  </div>
    
                <div class="text-center">
                 <button type="submit" class="btn btn-primary mt-4">nouvel Article  </button>
            </div>
            </div>
      </form>
    </div>
  </div>


@endsection
 

@section('css_quill')
<link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet">
<script src="{{ asset('js/highlight.js') }}"></script>
@endsection
@section('js_quill')
<script src="{{ asset('js/quill.js') }}"></script>
<script src="{{ asset('js/image-resize.min.js') }}"></script>
<script src="{{ asset('js/video-resize.min.js') }}"></script>

@endsection