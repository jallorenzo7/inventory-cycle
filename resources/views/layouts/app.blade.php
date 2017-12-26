<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'GM Cycle') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        @yield('style')
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'GM Cycle') }}
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://unpkg.com/sweetalert2@7.1.2/dist/sweetalert2.all.js"></script>
        @yield('script')
    </body>
</html>
