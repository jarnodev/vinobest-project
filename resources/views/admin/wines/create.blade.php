@extends('admin.layouts.app')

@section('wines', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Wijn toevoegen') }}</h2>
            </div>
            <div class="card">
                <form action="{{ route('admin.wines.store') }}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf

                        <div class="form-group">
                            <label for="inputName">{{ __('Naam') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{ old('name') }}" placeholder="{{ __('Naam...') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">{{ __('Beschrijving') }}</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="inputDescription" value="{{ old('description') }}" placeholder="{{ __('Beschrijving...') }}">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputImage">{{ __('Afbeelding') }}</label>
                            <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" id="inputImage" value="{{ old('image') }}" placeholder="{{ __('Afbeelding...') }}">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputOrigin">{{ __('Land van herkomst') }}</label>
                            <input type="text" name="origin" class="form-control @error('origin') is-invalid @enderror" id="inputOrigin" value="{{ old('origin') }}" placeholder="{{ __('Land van herkomst') }}">
                            @error('origin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputYear">{{ __('Jaar van herkomst') }}</label>
                            <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="inputYear" value="{{ old('year') }}" placeholder="{{ __('Jaar van herkomst') }}">
                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputType">{{ __('Wijnsoort') }}</label>
                            <input type="number" name="type" class="form-control @error('type') is-invalid @enderror" id="inputType" value="{{ old('type') }}" placeholder="{{ __('Wijnsoort') }}">
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Toevoegen') }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.wines.index') }}">{{ __('Terug naar wijn overzicht') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
