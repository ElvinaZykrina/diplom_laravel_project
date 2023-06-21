<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Админка: @yield('title')</title>

    <!-- Scripts -->
    {{-- <script type="text/javascript"
        src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=PRzCMgeOiG7NKD7gHnoIAD7JB1k5Cvx4UmyZgxX6kjFHwD1eIFT4jvBGc2kfmZ34vALqzbScPcpPLJxW3qhXkQ"
        charset="UTF-8"></script>
    <script src="https://internet-shop.tmweb.ru/js/app.js" defer></script> --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link href="http://internet-shop.tmweb.ru/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="/css/admin.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
            <div class="container">


                    @admin
                    <a class="navbar-brand" href="{{ route('index') }}">Вернуться на сайт</a>
                    <a class="navbar-brand" href="{{ route('categories.index') }}">Категории</a>
                    <a class="navbar-brand" href="{{ route('products.index') }}">Товары</a>
                    <a class="navbar-brand" href="{{ route('login') }}">Заказы</a>
                    @endadmin

                    <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                    </ul>

                    @guest
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Войти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                            </li>
                        </ul>
                    @endguest

                    @auth
                        <ul class="nav navbar-nav navbar-right">
                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @admin
                                        Администратор
                                    @else
                                        {{ Auth::user()->name }}
                                    @endadmin
                                    Администратор
                                </a>
                                <div class="" aria-labelledby="navbarDropdown">
                                    <a class="" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>
                                    <a class="navbar-brand" href="{{ route('logout') }}">Выйти</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}
                            <li>
                                <a class="navbar-brand" href="{{ route('logout') }}">Выйти</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endauth
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
