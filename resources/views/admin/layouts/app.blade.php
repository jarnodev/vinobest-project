<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/vbnotext.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?v={{ rand(1,9999) }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Administratie
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        @else
                            <li class="nav-item @yield('wines')">
                                <a class="nav-link" href="{{ route('admin.wines.index') }}">{{ __('Wijnen') }}</a>
                            </li>

                            <li class="nav-item @yield('appointments')">
                                <a class="nav-link" href="{{ route('admin.appointments.index') }}">{{ __('Inschrijvingen') }}</a>
                            </li>

                            <li class="nav-item @yield('tourdates')">
                                <a class="nav-link" href="{{ route('admin.tourdates.index') }}">{{ __('Proeverijen') }}</a>
                            </li>

                            <li class="nav-item @yield('wineTypes')">
                                <a class="nav-link" href="{{ route('admin.winetypes.index') }}">{{ __('Wijnsoorten') }}</a>
                            </li>

                            <li class="nav-item @yield('users')">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">{{ __('Gebruikers') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Terug naar de site') }}</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">&copy; Vinobest {{ date("Y") }}</span>
            </div>
        </footer>
    </div>
</body>
</html>
