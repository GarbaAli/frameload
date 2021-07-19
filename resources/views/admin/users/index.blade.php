    @extends('layouts.menu_admin')

    @section('menu_admin')
   
     <!-- Header -->
     <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Utilisateurs</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <a href="#" class="btn btn-sm btn-neutral">New</a>
                <a href="#" class="btn btn-sm btn-neutral">Filters</a>
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
                <h3 class="text-white mb-0">Liste des Utilisateurs</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">User</th>
                      <th scope="col" class="sort" data-sort="budget">Email</th>
                      <th scope="col" class="sort" data-sort="status">phone</th>
                      <th scope="col">Filiere</th>
                      <th scope="col">Role</th>
                      <th scope="col" class="sort" data-sort="completion">Date Inscription</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($users as $user )
                    <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <a href="#" class="avatar rounded-circle mr-3">
                              <img alt="Image placeholder" src="{{asset('admin/img/theme/bootstrap.jpg')}}">
                            </a>
                            <div class="media-body">
                              <span class="name mb-0 text-sm"> {{ $user->name }} </span>
                            </div>
                          </div>
                        </th>
                        <td class="budget">
                          {{ $user->email }}
                        </td>
                        <td>
                          <span class="badge badge-dot mr-4">
                            <i class="bg-warning"></i>
                            <span class="status">{{ $user->profile->tel }}</span>
                          </span>
                        </td>
                        <td>
                          <span class="badge badge-dot mr-4">
                              <i class="bg-info"></i>
                              <span class="status">{{ $user->profile->filiere }}</span>
                            </span>
                        </td>
                        <td>
                          <span class="badge badge-dot mr-4">
                              <i class="bg-success"></i>
                              <span class="status">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }} </span>
                            </span>
                        </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <span class="completion mr-2">{{ $user->created_at->format('d-m-y a H:m') }}</span>
                          </div>
                        </td>
                        <td class="text-right">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <a class="dropdown-item" href="{{ route('profiles.show', $user->name) }}">Detail <strong>{{ $user->name }}</strong></a>
                              
                              @can('edit-users')
                              <a class="dropdown-item" href="{{ route('users.edit', $user->name) }}">Editer <strong>{{ $user->name }}</strong></a>
                              @endcan

                              {{-- Ne permet qua Admin de voir le btn --}}
                              @can('delete-users') 
                                <form class="dropdown-item" action="{{ route('users.destroy', $user->name) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger" type="submit">Supprimer <strong>{{ $user->name }}</button>
                                </form>
                              @endcan
                              
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