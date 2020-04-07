@extends('admin.layouts.app')

@section('appointments', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Inschrijvingen overzicht') }}</h2>
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
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Datum') }}</th>
                                <th>{{ __('Gebruiker') }}</th>
                                <th>{{ __('Allergieën') }}</th>
                                <th>{{ __('Acties') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->tourDate->date }}</td>
                                <td>{{ $appointment->user->username }}</td>
                                <td>{{ $appointment->allergies }}</td>
                                <td style="width:15%;">
                                    <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{ route('admin.appointments.edit', $appointment->id) }}">{{ __('Edit') }}</a>

                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{ route('admin.appointments.create') }}">{{ __('Inschrijving toevoegen') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
