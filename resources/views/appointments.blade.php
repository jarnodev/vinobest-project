@extends('layouts.app')

@section('appointments', 'active')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Inschrijven wijnproeverijen') }}</h2>
            </div>
            @if (session('status'))
            <div class="alert alert-dismissible alert-success">{{ session('status') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has($msg))
                    <p class="alert alert-dismissible alert-{{ $msg }}">
                        {{ Session::get($msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                @endif
            @endforeach
            <div class="card">
                <form action="{{ route('appointments.join') }}" method="post">
                    <div class="card-body">
                        @csrf

                        <div class="form-group">
                            <label for="inputDate">{{ __('Datum') }}</label>
                            <select name="tour_date_id" class="form-control @error('tour_date_id') }} is-invalid @enderror" id="inputDate">
                                @foreach ($tourDates as $tourDate)
                                <option value="{{ $tourDate->id }}">{{ $tourDate->date }} - &euro;{{ $tourDate->price }}</option>
                                @endforeach
                            </select>
                            @error('tour_date_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAllergies">{{ __('Allergieën') }}</label>
                            <textarea name="allergies" id="inputAllergies" class="form-control @error('allergies') is-invalid @enderror" cols="30" rows="5">{{ old('allergies') }}</textarea>
                            @error('allergies')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Inschrijven') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center pt-3 pb-3">
        <div class="col-md-10">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Mijn inschrijvingen') }}</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Datum') }}</th>
                                <th>{{ __('Allergieën') }}</th>
                                <th>{{ __('Acties') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($myAppointments as $appointment)
                            <tr>
                                <td>{{ $appointment->tourDate->date }}</td>
                                <td>{{ $appointment->allergies }}</td>
                                <td style="width:15%;">
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Uitschrijven') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
