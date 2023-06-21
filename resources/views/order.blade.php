@extends('layouts.master')

@section('title', 'Оформить заказ')

@section('content')
    <div class="registration-container mt-4">
        <h4 class="fw-700 text-center mb-4 d-block align-items-center">Подтвердите заказ</h4>
        <p class="text-center">Общая стоимость: <b>{{ $order->calculateFullSum() }} ₽</b></p>

        <form action="{{ route('basket-confirm') }}" method="POST">
            <div class="mb-3">
                <label for="name" class="control-label">Имя: </label>
                <input type="text" name="name" id="name" value="" class="form-control" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="control-label">Номер телефона: </label>
                <input type="text" name="phone" id="phone" value="" class="form-control" minlength="9" required>
                @error('phone')
            <div class="error">{{ $message }}</div>
            @enderror
            </div>
            @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            @guest()
            <div class="mb-3">
                <label for="email" class="control-label">Email: </label>
                <input type="text" name="email" id="email"  class="form-control">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            @endguest

            <div class="mb-3">
                <label for="name" class="control-label">Способ получения: </label>
                <select id="recieve_method" name="recieve_method" class="form-select" aria-label="Default select example">
                    <option value="самовывоз" selected>Самовывоз</option>
                    <option value="доставка">Доставка</option>
                </select>
            </div>
            <div class="mb-3" id="address">
                <label for="address" class="control-label">Адрес: </label>
                <input type="text" name="address" id="" value="" class="form-control">
                <div class="form-text">Введите адрес: улица, дом, номер квартиры (ул. Парковая, 8, кв. 43)</div>
            </div>
            {{-- <div class="mb-3">
                <label for="email" class="form-label">Подтвердите пароль</label>
                <input type="password" class="form-control">
            </div> --}}
            <div class="row mb-3 mt-4">
            <div class="col-2 position-relative">
                <img class="info d-block m-auto" src="{{asset('img/point.svg')}}" alt="point">
            </div>
            <div class="col-10">
                <p class="m-0 ">
                    Мы подготовим для Вас товар, и Вы сможете забрать его в магазине
                </p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-2 position-relative">
                <img class="info d-block m-auto" src="{{asset('img/box.svg')}}" alt="point">
            </div>
            <div class="col-10">
                <p class="m-0">
                    Курьер доставит товар до нужного места, после подтверждения заказа
                </p>
            </div>
        </div>
            @csrf
            <input type="submit" class="order-btn mt-4" value="Заказать">
        </form>
    </div>
    <script>
        $(function()
        {
            $('#address').hide();
            $('#recieve_method').change(function()
            {
                if($('#recieve_method').val() == 'доставка'){
                    $('#address').show();
                }
                if($('#recieve_method').val() == 'самовывоз'){
                    $('#address').hide();
                }
            });
        }
        )

    </script>
        <script src="https://unpkg.com/imask"></script>

    <script>
        var element = document.getElementById('phone');
        var maskOptions = {
            mask: '+7-000-000-00-00',
            lazy: false
        }
        var mask = new IMask(element, maskOptions);

        </script>
@endsection
