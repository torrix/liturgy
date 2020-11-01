<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="uk-background-primary uk-light">
        <nav class="uk-navbar-container uk-navbar-transparent">
            <div class="uk-container">
                <div class="uk-navbar" data-uk-navbar>
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo" href="/">{{ config('app.name', 'Laravel') }}</a>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            @guest
                                @if (Route::has('login'))
                                    <li>
                                        <a href="{{ route('login') }}"><span data-uk-icon="user"></span></a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="#">
                                        <span data-uk-icon="cog"></span>
                                    </a>
                                    <div class="uk-navbar-dropdown" data-uk-drop="boundary: body; mode: click">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li>
                                                <a href="{{ action([\App\Http\Controllers\ReadingController::class, 'index']) }}">
                                                    {{ __('Readings') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ action([\App\Http\Controllers\PrayerController::class, 'index']) }}">
                                                    {{ __('Prayers') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ action([\App\Http\Controllers\SectionController::class, 'index']) }}">
                                                    {{ __('Sections') }}
                                                </a>
                                            </li>
                                            <li class="uk-nav-divider"></li>
                                            <li>{{ Auth::user()->name }}</li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Log Out') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="uk-section uk-section-xsmall uk-section-primary">
        <div class="uk-container uk-text-small uk-text-muted uk-text-right">
            Designed by
            <a target="_blank" href="https://torrix.uk/">Matt Fletcher at Torrix</a>
        </div>
    </footer>
</div>
<script src="/js/app.js" defer></script>
</body>
</html>
