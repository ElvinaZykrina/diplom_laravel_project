@extends('auth.layouts.masterAdmin')


@section('title', 'Заказ ')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Заказ №{{ $order->id }}</h1>
                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                    <p>Номер телефона: <b>{{ $order->phone }}</b></p>

                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th class="fw-600">Название</th>
                            <th class="fw-600">Кол-во</th>
                            <th class="fw-600">Цена</th>
                            <th class="fw-600 pe-1">Стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', [$product->category->code,$product->code]) }}">
                                        <img height="65px" src="{{ Storage::url($product->image) }}">
                                    </a>
                                    <p class="form-text">{{$product->name}}</p>
                                </td>
                                <td><span class="badge badge-number">{{ $product->pivot->count }}</span></td>
                                <td>{{ $product->price}}</td>
                                <td>{{$product->getPriceForCount()}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"><b>Общая стоимость:</b></td>
                            <td><b>{{$order->calculateFullSum()}}</b></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>


@endsection
