@extends('layouts.app')

@section('wines', 'active')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ $wine->name }}</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $wine->description }}</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="card-text">Land van herkomst: <strong>{{ $wine->origin }}</strong></p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="card-text">Jaar van herkomst: <strong>{{ $wine->year }}</strong></p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="card-text">Wijnsoort: <strong>{{ $wine->type }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="/images/wines/{{ $wine->image }}" class="w-100 d-block mx-auto" alt="{{ $wine->name }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
