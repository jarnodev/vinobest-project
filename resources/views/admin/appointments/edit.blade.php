@extends('admin.layouts.app')

@section('appointments', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Inschrijving bewerken') }}</h2>
            </div>
            <div class="card">
                <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="inputDate">{{ __('Datum') }}</label>
                            <select name="tour_date_id" class="form-control @error('tour_date_id') }} is-invalid @enderror" id="inputDate">
                                @foreach ($tourDates as $tourDate)
                                <option value="{{ $tourDate->id }}" @if ($tourDate->id == $appointment->tour_date_id) selected @endif>{{ $tourDate->date }}</option>
                                @endforeach
                            </select>
                            @error('tour_date_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputUser">{{ __('Gebruiker') }}</label>
                            <select name="user_id" class="form-control @error('user_id') }} is-invalid @enderror" id="inputUser">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if ($user->id == $appointment->user_id) selected @endif>{{ $user->username }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAllergies">{{ __('Allergieën') }}</label>
                            <textarea name="allergies" class="form-control @error('description') is-invalid @enderror" id="inputAllergies" cols="30" rows="10">{{ $appointment->allergies }}</textarea>
                            @error('allergies')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Bijwerken') }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.appointments.index') }}">{{ __('Terug naar inschrijvingen overzicht') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
