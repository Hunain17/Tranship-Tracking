<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tranship') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="wrapper">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <img src="{{asset('images/logo.png'); }}">
                </div>
                <ul class="sidebar-nav">
                    <li class="{{ (request()->is('record/create')) ? 'active' : '' }}">
                        <a href="{{route('record.create')}}">
                        <i class="bi bi-file-earmark-plus"></i>
                            Create Record
                        </a>
                    </li>
                    <li class="{{ (request()->is('record')) ? 'active' : '' }}">
                        <a href="{{route('record.index')}}">
                            <i class="bi bi-file-earmark-fill"></i>
                            Records
                        </a>
                    </li>
                    <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                        <a href="{{route('dashboard')}}">
                            <i class="bi bi-file-earmark-fill"></i>
                            Records Settings
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin-settings')) ? 'active' : '' }}">
                        <a href="{{route('admin-settings')}}">
                            <i class="bi bi-gear-fill"></i>
                            Admin Settings
                        </a>
                    </li>
                </ul>
            </aside>
            <section id="content-wrapper">
                @yield('content')
            </section>

        </div>
        <!-- <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div> -->
    </div>
</body>
</html>
