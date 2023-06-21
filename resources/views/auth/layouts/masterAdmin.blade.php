<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/Group 207.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/starter-template.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adaptation.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Интернет Магазин: @yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <header class="header">
        <div class="header__container">
            <div class="logo">
                <a href="{{route('main')}}" id="header-logo"><img src="{{ asset('img/logo.svg') }}"
                        alt="drive"></a>
            </div>
            <nav class="header__nav">
                <ul class="menu header__menu mb-0">
                    @if (!Auth::user()->isAdmin())
                    <li @routeactive('main')>
                        <a href="{{route('main')}}" class="menu__item">Главная</a>
                    </li>
                    <div class="line_hidden"></div>
                    <li @routeactive('index') || @routeactive('categor*') || @routeactive('search')>
                        <a href="{{route('index')}}" class="menu__item">Каталог</a>
                    </li>
                    <div class="line_hidden"></div>
                    <li @routeactive('service')>
                        <a href="{{route('service')}}" class="menu__item">Сервис и поддержка</a>
                    </li>
                    <div class="line_hidden"></div>
                    <li @routeactive('basket*') >
                        <a href="{{ route('basket') }}" class="menu__item">Корзина</a>
                    </li>
                    @endif

                    @guest
                        <div class="line_hidden"></div>
                        <li @routeactive('login')>
                            <a href="{{route('login')}}" class="menu__item">Войти</a>
                        </li>
                        <div class="line_hidden"></div>
                        <li @routeactive('register')>
                            <a href="{{route('register')}}" class="menu__item">Зарегистрироваться</a>
                        </li>
                    @endguest
                    @auth
                        @admin
                            <li @routeactive('home') || @routeactive('orders.show') || @routeactive('orders*')>
                                <a href="{{route('home')}}" class="menu__item">Заказы</a>
                            </li>
                            <div class="line_hidden"></div>
                            <li @routeactive('categories*')>
                                <a href="{{ route('categories.index') }}" class="menu__item">Категории</a>
                            </li>
                            <div class="line_hidden"></div>
                            <li @routeactive('products*')>
                                <a href="{{ route('products.index') }}" class="menu__item">Товары</a>
                            </li>
                            <div class="line_hidden"></div>
                            <li @routeactive('index')>
                                <a href="{{ route('index') }}" class="menu__item">Вернуться на сайт</a>
                            </li>
                            @else
                            <div class="line_hidden"></div>
                            <li @routeactive('person.orders.index') || @routeactive('person.orders.show')>
                                <a href="{{route('person.orders.index')}}" class="menu__item">Мои заказы</a>
                            </li>
                        @endadmin
                        <div class="line_hidden"></div>
                        <li @routeactive('get-logout')>
                            <a href="{{route('get-logout')}}" class="menu__item">Выйти</a>
                        </li>
                    @endauth
                </ul>
            </nav>
            <div class="menu-burger__header">
                <span></span>
            </div>
        </div>
    </header>

        <div class="my-container">
            @yield('content')
        </div>


        <div class="footer mt-5">
        <div class="pt-5">
            <div class="my-container me-auto ms-auto">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h5 class="mb-3">Магазин хозяйственных товаров 1000 мелочей</h5>
                        <p>В нашем каталоге: хозяйственные товары, посуда, бытовая химия; бытовая техника; косметика,
                            средства по уходу и гигиене; товары для интерьера, хранения, уборки; инструменты, садовые
                            принадлежности, средства ухода за растениями, удобрения, репелленты; аксессуары для ванной
                            комнаты, электротовары и многое другое.
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <h5 class="mb-3">Контакты</h5>
                        <ul class="contact-list">
                            <li><a href="tel:">+7(999)-999-99-99</a></li>
                            <li><a href="tel:">8 (800) 888-00-88</a></li>
                            <li><a href="mail:">1000melochey@mail.ru</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-underline"></div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-wrap me-4 footer-nav tiny-font">
                        <a href="#">Главная</a>
                        <a href="#">Сервис и поддержка</a>
                        <a href="#">Каталог товаров</a>
                    </div>
                    <div class="d-flex flex-wrap tiny-font">
                        <p class="fw-700">1000 мелочей </p>
                        <p>| ИП Контиевская. ©2022 все права защищены</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script defer src="{{ asset('js/form.min.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script defer src="{{ asset('js/catalog_dropdown.min.js') }}"></script>
</body>

</html>
