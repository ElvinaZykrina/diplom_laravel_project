@extends('layouts.master')

@section('title', 'товар' . '$product')

@section('content')

    <div class="my-container mb-4">
        <div class="breadcrumps d-flex mb-3">
            <a class="breadcrumps-link" href="{{route('main')}}">Главная</a>
            <a class="breadcrumps-link" href="{{ route('index') }}">Каталог товаров</a>
            <a class="" href="#">{{$product->name}}</a>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 col-sm-12 me-4 mt-4">
                <img class="w-100" src="{{ Storage::url($product->image) }}" alt="product">
            </div>
            <div class="col-md-6 col-sm-12 mt-4 ">
                <h3 class="fw-700">{{$product->name}}</h3>
                <hr>

                <p class="fs-3">{{$product->price}} ₽</p>
                @if ($product->isAvailable())
                    <form action="{{ route('basket-add', $product) }}" method="POST">
                        <button type="submit" class="add-to-cart-button w-100 mt-4 mb-4" role="button">Добавить в корзину</button>
                        @csrf
                    </form>
                @else
                    <div class="notAvailable mt-4 mb-3">
                        <p class="fs-5 text-muted mb-0">Товара нет в наличии</p>
                        <span class="text-muted">Мы отправим письмо на почту о поступлении товара</span>
                    </div>
                    <div class="warning">
                    @if($errors->get('email'))
                        {!! $errors->get('email')[0] !!}
                    @endif
                    </div>
                    <form action="{{route('subscription', $product)}}" method="POST">
                        @csrf
                        <div class="input-group input-group-md mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <button type="submit" class="mb-4 order-btn" >Отправить</button>
                    </form>
                @endif

                <div class="row mb-3">
                    <div class="col-2 position-relative">
                        <img class="info d-block m-auto" src="{{ asset('img/point.svg') }}" alt="point">
                    </div>
                    <div class="col-10">
                        <p class="m-0">
                            Мы подготовим для Вас товар, и Вы сможете забрать его в магазине
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 position-relative">
                        <img class="info d-block m-auto" src="{{ asset('img/box.svg') }}" alt="point">
                    </div>
                    <div class="col-10">
                        <p class="m-0">
                            Курьер доставит товар до нужного места, после подтверждения заказа
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
