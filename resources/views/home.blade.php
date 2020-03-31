@extends('layouts.app')

@section('home', 'active')

@section('content')

<img src="{{ asset('images/winebg3.jpg') }}" class="w-100">

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <h1>Welkom bij Vinobest</h1>
            <h4>Gespecialiseerd in wijnen en wijnproeverijen</h4>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
            <a href="wines" class="btn btn-dark">Bekijk onze wijnen</a>
        </div>

        <div class="col-md-6">
            <img src="{{ asset('images/winelove.jpg') }}" class="w-50 d-block mx-auto">
        </div>
    </div>
</div>
@endsection
