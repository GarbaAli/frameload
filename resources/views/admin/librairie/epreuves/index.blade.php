@extends('layouts.menu_admin')

  @section('menu_admin')
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Epreuves</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('epreuve.create') }}" class="btn btn-sm btn-neutral">Ajouter une Epreuve</a>
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
          <div class="card">
            <div class="card-header border-0">
              <h3 class="mb-0">Listes des Epreuves</h3>
            </div>
            <div class="table-responsive">
              <table id="dataTable" class="row-border align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Etablissement</th>
                    <th>Filière</th>
                    <th>Libellé</th>
                    <th>Type</th>
                    <th>Annee</th>
                    <th>Date d'Ajout</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @php( $num = 1)
                  @foreach($epreuve as $epr)
                    <tr>
                      <td>{{$num}}</td>
                      <td>{{$epr->etablissement->code_ets}}</td>
                      <td>{{$epr->filiere->code_filiere}}</td>
                      <td>{{$epr->libelle_epreuve}}</td>
                      <td>{{$epr->type}}</td>
                      <td>{{$epr->annee_epreuve}}</td>
                      <td>{{$epr->date_ajout}}</td>
                      <td>
                        <div class="d-flex">
                          <a href="{{ route('epreuve.vue', $epr->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('epreuve.edit', $epr->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                          <form method="POST" action="{{ route('epreuve.destroy', $epr->id)}} ">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @php($num++)
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @endsection