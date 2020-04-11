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
                            <p class="card-text">{{ __('Land van herkomst') }}: <strong>{{ $wine->origin }}</strong></p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="card-text">{{ __('Jaar van herkomst') }}: <strong>{{ $wine->year }}</strong></p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="card-text">{{ __('Wijnsoort') }}: <strong>{{ $wine->wineType->name }}</strong></p>
                        </div>
                    </div>
                    @auth
                    <div class="pb-2 mb-3 mt-4 border-bottom">
                        <h4>{{ __('Reviews') }}</h4>
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
                    @foreach ($wine->reviews as $review)
                    <div class="card mt-3">
                        <div class="card-body">
                            @foreach(range(1, 5) as $i)
                                <span class="fa-stack" style="width:1em">
                                    <i class="far fa-star fa-stack-1x"></i>

                                    @if($review->rating >0)
                                        @if($review->rating >0.5)
                                            <i class="fas fa-star fa-stack-1x"></i>
                                        @else
                                            <i class="fas fa-star-half"></i>
                                        @endif
                                    @endif
                                    @php $review->rating--; @endphp
                                </span>
                            @endforeach
                            <span class="float-right text-muted">
                                <form action="{{ route('wine.deleteReview', $review->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{ $review->user->username }} &nbsp; <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </span>
                            <p>
                                {{ $review->message }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <form action="{{ route('wine.postReview', $wine->id) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="inputMessage">{{ __('Bericht') }}</label>
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="inputMessage" cols="30" rows="2"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="inputRating">{{ __('Aantal sterren') }}</label>
                                    <select name="rating" class="form-control @error('rating') is-invalid @enderror" id="inputRating">
                                        @for ($i = 0; $i <= 5; $i += 0.5)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('Review plaatsen') }}</button>
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
                <div class="col-md-6">
                    <img src="/images/wines/{{ $wine->image }}" class="w-100 d-block mx-auto" alt="{{ $wine->name }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
