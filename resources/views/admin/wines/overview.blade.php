@extends('admin.layouts.app')

@section('wines', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Wijnen') }}</h2>
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Gebruikersnaam') }}</th>
                                <th>{{ __('E-mailadres') }}</th>
                                <th>{{ __('Herkomst') }}</th>
                                <th>{{ __('Jaar') }}</th>
                                <th>{{ __('Acties') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $wine)
                            <tr>
                                <td>{{ $wine->id }}</td>
                                <td>{{ $wine->name }}</td>
                                <td>{{ $wine->description }}</td>
                                <td>{{ $wine->origin }}</td>
                                <td>{{ $wine->year }}</td>
                                <td style="width:15%;">
                                    <form action="{{ route('admin.wines.destroy', $wine->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{ route('admin.wines.edit', $wine->id) }}">{{ __('Edit') }}</a>

                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('admin.wines.create') }}">{{ __('Wijn toevoegen') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
