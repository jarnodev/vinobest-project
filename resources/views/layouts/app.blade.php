<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/vbnotext.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?v={{ rand(1,9999) }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}?v={{ rand(1,9999) }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/vbnotext.png') }}" height="70px">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item @yield('wines')">
                                <a class="nav-link" href="{{ route('wines') }}"><i class="fas fa-wine-glass-alt"></i> {{ __('Wijnen') }}</a>
                            </li>

                            <li class="nav-item @yield('about-us')">
                                <a class="nav-link" href="{{ route('about-us') }}"><i class="fas fa-user-friends"></i> {{ __('Over ons') }}</a>
                            </li>

                            <li class="nav-item @yield('contact')">
                                <a class="nav-link" href="{{ route('contact') }}"><i class="fas fa-id-card"></i> {{ __('Contact') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Inloggen') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Aanmelden') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item @yield('wines')">
                                <a class="nav-link" href="{{ route('wines') }}"><i class="fas fa-wine-glass-alt"></i> {{ __('Wijnen') }}</a>
                            </li>

                            <li class="nav-item @yield('about-us')">
                                <a class="nav-link" href="{{ route('about-us') }}"><i class="fas fa-user-friends"></i> {{ __('Over ons') }}</a>
                            </li>

                            <li class="nav-item @yield('contact')">
                                <a class="nav-link" href="{{ route('contact') }}"><i class="fas fa-id-card"></i> {{ __('Contact') }}</a>
                            </li>

                            @if(Auth::user()->permission_level > 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Administratie') }}</a>
                            </li>
                            @endif

                            <li class="nav-item dropdown @yield('home')">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Uitloggen') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>

        <div class="footer text-center my-5 pt-5">
            &copy; Vinobest <?php echo date("Y"); ?>
        </div>
    </div>
</body>
</html>
