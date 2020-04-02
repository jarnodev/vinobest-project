@extends('admin.layouts.app')

@section('users', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Gebruiker bewerken') }}</h2>
            </div>
            <div class="card">
                <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="inputUsername">{{ __('Gebruikersnaam') }}</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="inputUsername" value="{{ $user->username }}" placeholder="{{ __('Gebruikersnaam...') }}">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">{{ __('E-mailadres') }}</label>
                            <input type="text" name="email" class="form-control @error('description') is-invalid @enderror" id="inputEmail" value="{{ $user->email }}" placeholder="{{ __('E-mailadres...') }}">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputPermissionLevel">{{ __('Permissie Level') }}</label>
                            <input type="number" name="permission_level" class="form-control @error('permission_level') is-invalid @enderror" id="inputPermissionLevel" value="{{ $user->permission_level }}" placeholder="{{ __('Permissie Level...') }}">
                            @error('permission_level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Bijwerken') }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.users.index') }}">{{ __('Terug naar gebruikers overzicht') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
