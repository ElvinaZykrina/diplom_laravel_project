@extends('layouts.master')

@section('title', 'Корзина')

@section('content')
    <div class="my-container mb-3">
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <h3 class="fw-700">
                    Корзина
                </h3>
                @foreach ($order->products()->with('category')->get() as $product)
                    <div class="row d-flex justify-content-center bbb">
                        <div class="line"></div>
                        <div class="col-md-4 col-sm-12">
                            <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                <img class="w-100" src="{{ Storage::url($product->image) }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-8 mt-4 col-sm-12">
                            <div class="row d-flex align-items-end">
                                <div class="col-md-9 col-sm-12 ">
                                    <p class="fw-700 mb-4">{{ $product->name }}</p>
                                    <div class="d-flex flex-nowrap">
                                        <label class="mb-2" for="input">Количество:</label>
                                    </div>
                                    <div class="btn-group form-inline mb-3">
                                        <form action="{{ route('basket-remove', $product) }}" method="POST">
                                            <button type="submit" class="btn btn-dark" href="">-<span
                                                    aria-hidden="true"></span></button>
                                            @csrf
                                        </form>
                                        <span class="quantity-input">{{ $product->pivot->count }}</span>
                                        <form action="{{ route('basket-add', $product) }}" method="POST">
                                            <button type="submit" class="btn btn-dark" href="">+<span
                                                    aria-hidden="true"></span></button>
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-12 ">
                                    <p class="fs-5 fw-700  text-nowrap">{{ $product->getPriceForCount() }} ₽</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="col-md-4 col-sm-12 ms-md-4 ms-sm-0">
                <div class="cart-container">
                    <h3 class="mb-3 fw-700">Ваш заказ</h3>
                    <h4 class="fw-700">Итого: {{ $order->calculateFullSum() }} ₽ </h4>
                    <p class="text-muted">Оплата после получения товара наличными или картой</p>
                    <p class="text-muted">Я согласен(на) с правилами возврата товара</p>
                    <a type="button" class="order-btn text-center mt-3 mb-2" href="{{ route('basket-place') }}">Оформить заказ</a>
                </div>
                <div class="row mb-3 mt-4">
                    <div class="col-2 position-relative">
                        <img class="info d-block m-auto" src="img/point.svg" alt="point">
                    </div>
                    <div class="col-10">
                        <p class="m-0">
                            Мы подготовим для Вас товар, и Вы сможете забрать его в магазине
                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-2 position-relative">
                        <img class="info d-block m-auto" src="img/box.svg" alt="point">
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
