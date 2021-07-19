@extends('layouts.menu_admin')

@section('menu_admin')

<div class="container mt-10 mb-50">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col-8">
                      </div>
                      <div class="col-4 text-right">
                        <a href="{{ route('categorieForum.index') }}" class="btn btn-sm btn-primary">Retour</a>
                      </div>
                    </div>
                  </div>
                <div class="card-header"> Supprimer les sous-categorie de  <strong> {{ $categorie->libelle }}</strong></div>

                <div class="card-body">
                        @foreach ($categorie->sousCategories as $souscategorie )
                        <div class="d-flex justify-content-between">
                           <strong>{{ $souscategorie->libelle }}</strong>
                            <div>
                                <form class="dropdown-item" action="{{ route('souscat.destroy', ['categorie'=>$categorie, 'souscategorie'=>$souscategorie]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                  </form>
                            </div>
                        </div><hr>
                         @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
