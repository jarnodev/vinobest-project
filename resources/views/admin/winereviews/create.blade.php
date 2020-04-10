@extends('admin.layouts.app')

@section('winereviews', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Review toevoegen') }}</h2>
            </div>
            <div class="card">
                <form action="{{ route('admin.winereviews.store') }}" method="post">
                    <div class="card-body">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group">
                            <label for="inputWine">{{ __('Wijn') }}</label>
                            <select name="wine_id" class="form-control @error('wine_id') }} is-invalid @enderror" id="inputWine">
                                @foreach ($wines as $wine)
                                <option value="{{ $wine->id }}" @if ($wine->id == old('wine_id')) selected @endif>{{ $wine->name }}</option>
                                @endforeach
                            </select>
                            @error('wine_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputMessage">{{ __('Opmerking(en)') }}</label>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="inputMessage" cols="30" rows="5">{{ old('message') }}</textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputRating">{{ __('Aantal sterren') }}</label>
                            <select name="rating" class="form-control @error('rating') is-invalid @enderror" id="inputRating">
                                @for ($i = 0; $i <= 5; $i++)
                                    <option value="{{ $i }}" @if ($i == old('rating')) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Review toevoegen') }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.winereviews.index') }}">{{ __('Terug naar review overzicht') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
