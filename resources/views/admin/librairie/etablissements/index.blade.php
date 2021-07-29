
@extends('layouts.menu_admin')

@section('menu_admin')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Etablissements</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('ets.create') }}" class="btn btn-sm btn-neutral">Ajouter un Etablissement</a>
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
              <h3 class="mb-0">Listes des Etablissements</h3>
            </div>
            <div class="table-responsive">
              <table id="dataTable" class="row-border align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Libellé</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @php( $num = 1)
                  @foreach($ets as $etab)
                    <tr>
                      <td>{{$num}}</td>
                      <td>{{$etab->code_ets}}</td>
                      <td>{{$etab->libelle_ets}}</td>
                      <td>{{$etab->image}}</td>
                      <td>{{$etab->description}}</td>
                      <td>
                        <div class="d-flex">
                          <a href="{{ route('ets.edit', $etab->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                          <form method="POST" action="{{ route('ets.destroy', $etab->id)}} ">
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