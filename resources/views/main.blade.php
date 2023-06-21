@extends('layouts.master')

@section('title', 'Главная')

@section('content')

    <div class="my-container">
    <div>
      <img class="banner" src="img/banner1.png" alt="">
    </div>
    <div class="row d-flex justify-content-between mt-4">
      <div class="col-6">
      <img class = "w-100" src="img/banner2.png" alt="">
      </div>
      <div class="col-6">
      <img class = "w-100" src="img/banner4.png" alt="">
      </div>
    </div>
  </div>

  <div class="my-container products-section  text-center">
    <h5 class="text-center fw-700 mt-5 mb-5">Актуальные товары</h5>
      <div class="mb-4 d-flex flex-wrap justify-content-around">
        <div class="categoryFirst m-3">
          <img class="mb-3" src="img/maid.svg" alt="maid">
          <p class="text-center">Уборочный <br> инвентарь</p>
        </div>
        <div class="categoryFirst m-3">
          <img class="mb-3" src="img/house.svg" alt="house">
          <p class="text-center">Товары для <br>дачи</p>
        </div>
        <div class="categoryFirst m-3">
          <img class="mb-3" src="img/kitchen.svg" alt="kitchen">
          <p class="text-center">Кухня</p>
        </div>
        <div class="categoryFirst m-3">
          <img class="mb-3" src="img/power-button.svg" alt="power-button">
          <p class="text-center">Электричество</p>
        </div>
        <div class="categoryFirst m-3">
          <img class="mb-3" src="img/organizer.svg" alt="organizer">
          <p class="text-center">Органайзеры</p>
        </div>
      </div>
      <a href="{{route('index')}}" class="btn-black">Перейти к каталогу товаров</a>
  </div>

  <div class="my-container about-section">
    <h5 class="fw-700 mb-4">О компании</h5>
    <p>Интернет-магазин 1000 мелочей предлагает уникальный, регулярно обновляемый ассортимент товаров для дома и сада. 
      В нашем каталоге: хозяйственные товары, посуда, бытовая химия; бытовая техника; косметика, средства по уходу и гигиене; товары для интерьера, хранения, уборки; инструменты, садовые принадлежности, средства ухода за растениями, удобрения, репелленты; аксессуары для ванной комнаты, электротовары и многое другое.
      <br>
      <br>
      При оформлении заказа мы бесплатно доставим его по указанному Вами адресу или в магазин, где Вы сможете его забрать.
      <br>
      <br>
      Наши сотрудники ответят на интересующие Вас вопросы! Свяжитесь с нами по телефону <a href="tel:#88008880088">8 (800) 888-00-88</a>.
    </p>
  </div>

@endsection


