<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Админка: @yield('title')</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
            <div class="container">


                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        <li><a href="{{ route('project.index') }}">Проекти</a></li>


                    </ul>
                    @if (!session()->has('LoggedUser') && !session()->has('LoggedAdmin'))
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login_form') }}">Увійти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register_form') }}">Зареєструватися</a>
                            </li>
                        </ul>
                    @endif


                    <ul class="nav navbar-nav navbar-right">

                        @if (session()->has('LoggedAdmin'))
                            <li class="nav-item">
                                <a class="nav-link" href="#">Адміністратор</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Вийти</a>
                            </li>
                        @endif
                        @if (session()->has('LoggedUser'))

                            <li class="nav-item">
                                <a class="nav-link" href="#">Користувач</a>

                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Вийти</a>
                            </li>

                        @endif
                    </ul>


                </div>
            </div>
        </nav>

        <div class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
