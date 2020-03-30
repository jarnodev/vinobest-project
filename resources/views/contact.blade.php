@extends('layouts.app')

@section('contact', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Contactgegevens') }}</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    Vinobest wijnimporteurs.<br/>
                    Droge Beekweg 18<br/>
                    1234 BB Best<br/>
                    Telefoonnummer: +31 6 123456789 (enkel tijdens kantooruren en op de dag van proeverijen)<br/><br/>
                    Bezoekadres proeverijen.<br/>
                    Joe Mannweg 4<br/>
                    5681 PT Best
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Locatie') }}</h2>
            </div>

            <iframe width="500" height="500" src="https://maps.google.com/maps?q=Joe%20Mannweg%204&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
</div>
@endsection
