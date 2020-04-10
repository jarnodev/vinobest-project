@extends('admin.layouts.app')

@section('winereviews', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Review bewerken') }}</h2>
            </div>
            <div class="card">
                <form action="{{ route('admin.winereviews.update', $wineReview->id) }}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="inputMessage">{{ __('Opmerking(en)') }}</label>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="inputMessage" cols="30" rows="5">{{ $wineReview->message }}</textarea>
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
                                    <option value="{{ $i }}" @if ($i == $wineReview->rating) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Bijwerken') }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.winereviews.index') }}">{{ __('Terug naar review overzicht') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
