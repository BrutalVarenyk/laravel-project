@inject('all_categories', 'App\Service\GetAllCategoriesService')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js" type="text/javascript"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <div id="app">
        @if(!Auth::user())
            @include('navigation.front-menu')
        @else
            @if(is_admin(Auth::user()) && (Request::is('admin/*') || Request::is('admin')) )
                @include('navigation.admin-menu')
            @else
                @include('navigation.front-menu')
            @endif
        @endif
        <main class="py-4">
            <div class="row">
                <div class="col-md-12">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </main>
        @yield('content')
    </div>
</body>
</html>
