@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pb-2 mb-2 border-bottom">
                <h3>{{ __('E-mail bevestigen') }}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Een bevestigingslink is naar je inbox verstuurd.') }}
                        </div>
                    @endif

                    {{ __('Controleer voordat u verdergaat uw e-mail voor een verificatielink.') }}
                    {{ __('Als u de e-mail niet heeft ontvangen') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik dan hier om een andere aan te vragen') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
