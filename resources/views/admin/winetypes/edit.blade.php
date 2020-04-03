@extends('admin.layouts.app')

@section('wineTypes', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Wijnsoort wijzigen') }}</h2>
            </div>
            <div class="card">
                <form action="{{ route('admin.winetypes.update', $wineType->id) }}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="inputName">{{ __('Naam') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{ $wineType->name }}" placeholder="{{ __('Naam...') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Wijzigen') }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.winetypes.index') }}">{{ __('Terug naar wijnsoort overzicht') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
