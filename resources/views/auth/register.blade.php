@extends('layouts.menu_login')

@section('body_login')
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-between">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-4"><small>Se connecter avec</small></div>
              <div class="text-center">
              <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('admin/img/icons/common/github.svg')}}"></span>
                  <span class="btn-inner--text">Github</span>
                </a>

                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('admin/img/icons/common/google.svg')}}"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Ou inscrivez-vous avec des informations d'identification</small>
              </div>
              

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
              <form method="POST" action="{{ route('register') }}">
              @csrf
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input id="name" placeholder="Username" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                  </div>
                
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" autocomplete="email">
                  </div>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password" autocomplete="new-password">
                  </div>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                      <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                      @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                  </div>
                  
                </div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">Je suis d'accord avec la <a href="#!">politique de confidentialité</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Créer un Compte </button>
                </div>

                <div class="text-muted font-italic mt-10">
                    <small>Deja Inscrit ? <span class="text-success font-weight-700">
                        <a href="{{route('login')}}"> Log In</a>
                    </span></small>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection