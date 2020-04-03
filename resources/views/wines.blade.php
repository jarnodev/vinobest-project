@extends('layouts.app')

@section('wines', 'active')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Wijn assortiment') }}</h2>
            </div>
            <div class="row">
                @foreach ($wines as $index => $item)
                <div class="col-md-4">
                    <div class="card">
                        <img src="/images/wines/{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <a href="{{ route('wine', $item->id) }}" class="btn btn-primary">Bekijk details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
