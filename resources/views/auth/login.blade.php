
@extends('layouts.menu_login')
@section('title', 'Login')
@section('body_login')

    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('admin/img/icons/common/github.svg')}}"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="{{url('/auth/redirect/google')}}" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('admin/img/icons/common/google.svg')}}"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>


            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
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

            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" placeholder="Mot de pass" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input"  type="checkbox" name="remember" id=" customCheckLogin" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Souviens-toi de moi</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Connectez-vous</button>
                </div>
              </form>
              
            </div>
          </div>

          <div class="row mt-5 bg-secondary container ml-1 " style="border-radius: 5px">
            <div class="col-6">
              <a href="{{ route('password.request') }}" class="text-black"><small>Mot de pass Oublié ?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="{{ route('register') }}" class="text-black"><small>Creer un compte</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection