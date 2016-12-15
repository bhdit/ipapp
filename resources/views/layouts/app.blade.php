<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- Scripts -->
    <script>
        window.IPAPP = <?= json_encode([
            'csrfToken' => csrf_token(),
            'user' => auth()->user() ?? null,
            'userId' => auth()->user()->id ?? null,
            'usesApi' => false,
        ]); ?>
    </script>
    <style>
        @yield('css')
    </style>
    @yield('head-scripts')
</head>
<body>
<div id="ipapp">
    @include('navbar.nav')
    <div class="container content">
        <div class="row">
            @if(\Auth::check())
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-4">
                    <h1>Profile Card</h1>
                </div>
            @else
                <div class="col-md-8">
                    @yield('content')
                </div>
            @endif

        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@yield('end-scripts','<script src="/js/app.js"></script>')
</body>
</html>
