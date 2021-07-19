<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Profil</title>

  <link rel="icon" href="{{asset('admin/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('admin/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('admin/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" type="text/css">
 
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('admin/css/argon.css?v=1.2.0')}}" type="text/css">
</head>

<body>
 
  <div class="main-content" id="panel">
   
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('admin/img/theme/profile-cover.jpg')}}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-10 col-md-10">
            <h1 class="display-2 text-white"> {{$user->profile->nom_prenom}} </h1>
            <p class="text-white mt-0 mb-5">{{$user->profile->bio}}</p>

            @can('update', $user->profile)
            <a href=" {{route('profiles.edit', $user->name) }} " class="btn btn-neutral">Editer mes informations</a>
            @endcan
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="{{asset('admin/img/theme/img-1-1000x600.jpg')}}" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    {{-- <img src="{{ asset('/storage/avatars/'. $user->profile->image) }}" class="rounded-circle w-100"> --}}
                    <img src="{{ $user->profile->getImage() }}" class="rounded-circle w-100">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="/" class="btn btn-sm btn-info  mr-4 ">Accueil</a>
                @can('update', $user->profile)
                <a href="{{ route('logout') }}" class="btn btn-sm btn-danger float-right" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Deconnectez-vous!
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endcan
              </div>
            </div> 
            <hr>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  {{$user->name}} <span class="font-weight-light">,  {{$user->profile->niveau}}</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{$user->profile->filiere}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{$user->profile->etablissement}}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>{{$user->email}}
                </div>
              </div>
              <hr> <small>Inscris le {{$user->created_at->format('d-m-Y a H:m')}} </small>
            </div>
          </div>
        </div>
        @can('update', $user->profile)
<!-- Tableau de bord -->
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Tableau de bord </h3>
                </div>
                <div class="col-4 text-right">
                </div>
              </div>
            </div>
            {{-- tableau bord librairie --}}
            <div class="card-body">
               <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Livres</h5>
                            <span class="h2 font-weight-bold mb-0">350</span>
                            </div>
                            <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                <i class="ni ni-books"></i>
                            </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-nowrap">date last dowlown</span>
                        </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Logiciels</h5>
                            <span class="h2 font-weight-bold mb-0">924</span>
                            </div>
                            <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-atom"></i>
                            </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-nowrap">Since last month</span>
                        </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Rapports</h5>
                            <span class="h2 font-weight-bold mb-0">49</span>
                            </div>
                            <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                <i class="ni ni-book-bookmark"></i>
                            </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-nowrap">Since last month</span>
                        </p>
                        </div>
                    </div>
                 </div>

                 <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Epreuves</h5>
                            <span class="h2 font-weight-bold mb-0">3</span>
                            </div>
                            <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                <i class="ni ni-single-copy-04"></i>
                            </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-nowrap">Since last month</span>
                        </p>
                        </div>
                    </div>
                </div>

             </div>
            </div>

              {{-- Tableau de bord Blog et Forum --}}
              <div class="card-body">
                <div class="row"> 
                 <div class="col-xl-12 col-md-6">
                     <div class="card card-stats">
                         <!-- Card body -->
                         <div class="card-body">
                         <div class="row">
                             <div class="col">
                             <h5 class="card-title text-uppercase text-muted mb-0">Topics</h5>
                             <span class="h2 font-weight-bold mb-0">{{ Auth::User()->topics()->count() == 0 ? 'Aucun Topic': Auth::User()->topics()->count() }}</span>
                             </div>
                             <div class="col-auto">
                             <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                 <i class="ni ni-tag"></i>
                             </div>
                             </div>
                         </div>
                         @if ( Auth::User()->topics()->count() != 0 )
                            <p class="mt-3 mb-0 text-sm">
                             Dernier Topic: <span class="h2 font-weight-bold mb-0">{{ Auth::User()->topics()->latest()->limit(1)->value('title') }}</span><br>
                            <span class="text-nowrap">{{ Auth::User()->topics()->latest()->limit(1)->value('created_at')->format('d-m-y') }}</span>
                            </p>
                         @endif
                     
                         </div>
                     </div>
                 </div>
 
                 <div class="col-xl-3 col-md-6">
                     <div class="card card-stats">
                         <!-- Card body -->
                         <div class="card-body">
                         <div class="row">
                             <div class="col">
                             <h5 class="card-title text-uppercase text-muted mb-0">Forum-Messages</h5>
                             <span class="h2 font-weight-bold mb-0">49</span>
                             </div>
                             <div class="col-auto">
                             <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                 <i class="ni ni-chat-round"></i>
                             </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-nowrap">Since last month</span>
                         </p>
                         </div>
                     </div>
                  </div> 
              </div>
             </div>
          </div>
        </div>
        @endcan
      </div>
    
    </div>



<!--Modal: modalPush-->
<div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify" role="document">
    <!--Content-->
    <div class="modal-content text-center modal-info">
      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>

        <p>Vous venez de mettre a jour votre profil</p>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalPush-->
  </div>
  <!-- Argon Scripts -->
 <script src="{{asset('admin/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('admin/js/argon.js?v=1.2.0')}}"></script>
  @if(session()->has('message'))
  <script type="text/javascript">
    // $( document ).ready(function() {
        $('#modalPush').modal('toggle')
    // });
    </script>
  @endif
   
</body>

</html>