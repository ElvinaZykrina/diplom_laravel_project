@extends('auth.layouts.masterAdmin')

@section('title', 'Заказы')

@section('content')

<!-- <h3 class="ms-3 my-4">@yield('title')</h3> -->
<h3 class="my-3">Заказы</h3>

<div class="scrollmenu mb-3">
    <div class="orders_table">
      <ul class="heading">
        <li class="heading_num fixedcol" >№</li>
        <li class="heading_cust">Заказчик</li>
        <li class="heading_status">Телефон</li>
        <li class="heading_date">Когда отправлен</li>
        <li class="heading_total">Сумма</li>
        <li class="heading_total">Действие</li>
      </ul>
      @foreach($orders as $order)

      <div class="order"id="myTable">
        <ul >
          <li class="order_num fixedcol"><b>{{ $order->id}}</b></li>
          <li class="order_cust">{{ $order->name }}</li>
          <li class="order_status">{{ $order->phone }}</li>
          <li class="order_date">{{ $order->created_at }}</li>
          <li class="order_total">{{ $order->calculateFullSum() }} &#8381;</li>
          <li class="order_total">
          <a class="btn btn-open p-2" type="button"
                        @admin
                            href="{{ route('orders.show', $order) }}"
                        @else
                            href="{{ route('person.orders.show', $order) }}"
                        @endadmin
                        >Открыть</a>
          </li>
        </ul>
      </div>
      @endforeach

    </div>
</div>

      {{ $orders->links() }}

@endsection
