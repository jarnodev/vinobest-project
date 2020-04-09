@extends('admin.layouts.app')

@section('winereviews', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Review overzicht') }}</h2>
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
                                <th>{{ __('Wijn') }}</th>
                                <th>{{ __('Gebruiker') }}</th>
                                <th>{{ __('Bericht') }}</th>
                                <th>{{ __('Aantal sterren') }}</th>
                                <th>{{ __('Acties') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($wineReviews as $wineReview)
                            <tr>
                                <td>{{ $wineReview->id }}</td>
                                <td>{{ $wineReview->wine->name }}</td>
                                <td>{{ $wineReview->user->username }}</td>
                                <td>{{ $wineReview->message }}</td>
                                <td>{{ $wineReview->rating }}</td>
                                <td style="width:15%;">
                                    <form action="{{ route('admin.winereviews.destroy', $wineReview->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{ route('admin.winereviews.edit', $wineReview->id) }}">{{ __('Edit') }}</a>

                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{ route('admin.winereviews.create') }}">{{ __('Inschrijving toevoegen') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
