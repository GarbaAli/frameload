<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Profil</title>

  <link rel="icon" href="{asset('admin/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{asset('admin/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{asset('admin/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('admin/css/argon.css?v=1.2.0')}}" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
 
  <div class="main-content" id="panel">
   
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset($user->profile->getImage())}}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-5"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white"> {{$user->profile->nom_prenom}} </h1>
            <p class="text-white mt-0 mb-5">{{$user->profile->bio}}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">

          
        <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="/" class="btn btn-sm btn-primary">Accueil</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('profiles.update', $user)}}"> 
              @csrf
              @method('PATCH')
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Informations de Log In</h6>
                <div class="row">
                <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label for="username">Nom d'utilisateur</label>
                        <input type="text" name="name"   id="username" class="form-control @error('name') is-invalid @enderror"" placeholder="Username" value="{{ old('name') ?? $user->name }} " autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                </div>
                    <!-- mail -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{ old('email') ?? $user->email }} " autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="mdp">Mot de passe</label>
                                <input type="text" id="mdp" name="password" class="form-control" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="mdp2">Confirmer le Mot de passe</label>
                                <input type="text" id="mdp2" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                         <button type="submit" class="btn btn-primary mt-4">Modifier mes Identifiants  </button>
                    </div>
                    </div>
              </form>
            </div>
          </div>
        </div>

    <!-- Formulaire de modification du profile -->
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{route('profiles.update', $user)}}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Information du profile</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label @error('nom_prenom') is-invalid @enderror" for="nom">Nom & Prenom</label>
                        <input type="text" name="nom_prenom" id="nom" class="form-control" placeholder="First and Last Name" value="{{ old('nom_prenom') ?? $user->profile->nom_prenom }} " autocomplete="nom_prenom" autofocus>
                        @error('nom_prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <!-- Telephone -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Telephone</label>
                        <input type="text" id="input-city" name="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Phone" value="{{ old('tel') ?? $user->profile->tel }} " autocomplete="tel" autofocus>
                        @error('tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="niveau">Niveau d'etude</label>
                        <input type="text" id="niveau" name="niveau" class="form-control @error('niveau') is-invalid @enderror" placeholder="BTS-LICENCE" value="{{ old('niveau') ?? $user->profile->niveau }} " autocomplete="niveau" autofocus>
                        @error('niveau')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="filiere">Filiere</label>
                        <input type="text" id="filiere" name="filiere" class="form-control @error('filiere') is-invalid @enderror" placeholder="GENIE LOGICIEL" value="{{ old('filiere') ?? $user->profile->filiere }} " autocomplete="filiere" autofocus>
                        @error('filiere')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label @error('nom_prenom') is-invalid @enderror" for="etbs">Etablissement</label>
                        <input type="text" name="etablissement" id="etbs" class="form-control" placeholder="Etablissement" value="{{ old('etablissement') ?? $user->profile->etablissement }} " autocomplete="etablissement" autofocus>
                        @error('etablissement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="bio" class="form-control-label">Bio</label>
                            <textarea name="bio" id="bio" rows="4" class="form-control @error('bio') is-invalid @enderror"> {{ old('bio') ?? $user->profile->bio }} 
                            </textarea>
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="bio" class="form-control-label">Photo de profil</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" autofocus>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                          <label for="" class="form-control-label">Photo de Couverture</label>
                          <input type="file" name="couverture" class="form-control @error('couverture') is-invalid @enderror" id="image" autofocus>
                          @error('couverture')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                    <div class="pl-lg-12">
                    <div class="text-center">
                         <button type="submit" class="btn btn-primary mt-4">Modifier mon profile  </button>
                    </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>
  <!-- Argon Scripts -->
 <script src="{{asset('admin/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('admin/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>