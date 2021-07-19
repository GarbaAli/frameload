@extends('layouts.menu_admin')

@section('menu_admin')

 <!-- Header -->
 <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Categories</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('categoriePost.create') }}" class="btn btn-sm btn-neutral">Nouvelle Categorie</a>
            <a href="{{ route('blog') }}" class="btn btn-sm btn-neutral">Blog</a>
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
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent border-0">
            <h3 class="text-white mb-0">Liste des Categories</h3>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Categorie</th>
                  <th scope="col" class="sort" data-sort="budget">Date</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($categories as $categorie )
                <tr>
                   
                    <td class="budget">
                      {{ $categorie->libelle }}
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-primary"></i>
                        <span class="status">{{ $categorie->created_at->format('d-m-y a H:m') }}</span>
                      </span>
                    </td>
               
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                         
                          <a class="dropdown-item" href="{{ route('categoriePost.edit', $categorie) }}">Editer <strong> {{ $categorie->libelle }}</strong></a>
                            <form class="dropdown-item" action="{{ route('categoriePost.destroy', $categorie) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Supprimer  {{ $categorie->libelle }}</button>
                            </form>
                          
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  @endsection