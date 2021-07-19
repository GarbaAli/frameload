@extends('layouts.menu_admin')

@section('menu_admin')

<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Modifier role de <strong> {{ $user->name }}</strong></div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="post">
                        @csrf
                        @method('PATCH')
                        @foreach ($roles as $role )
                        <div class="form-group form-check">
                            <input type="checkbox" name="roles[]" class="form-check-input" id="{{ $role->id }}" value="{{ $role->id }}" @foreach ($user->roles as $userRole )   @if ($userRole->id == $role->id) checked @endif @endforeach>
                            <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                        </div>
                         @endforeach
                         <button type="submit" class="btn btn-primary mt-4">Modifier le role </button>
                         <a href="{{ route('users.index') }}" class="btn btn-danger mt-4">retour </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
