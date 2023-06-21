@extends('layouts.master')

@section('title', 'Главная')

@section('content')
  <div class="my-container mb-4 mt-4">
    <div class="breadcrumps d-flex mb-3">
      <a class="breadcrumps-link" href="{{route('index')}}">Главная</a>
      <a class="" href="#">Сервис и поддержка</a>
    </div>
    <h3 class="mt-4 mb-4 fw-700">Часто задаваемые вопросы</h3>
    <div class="d-flex align-items-start row">
      <div class="nav col-md-4 col-sm-12 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <!-- <button class="nav-link tab_button active text-start" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Статус клиента</button> -->
        <hr>
        <button class="nav-link tab_button active text-start" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Возврат товара</button>
        <!-- <button class="nav-link text-start" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Возврат товара</button> -->
        <hr>
        <button class="nav-link text-start" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-moneyback" type="button" role="tab" aria-controls="v-pills-moneyback" aria-selected="false">Возврат средств</button>
        <hr>
        <button class="nav-link text-start" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Способы покупки и оплата</button>
        <hr>
        <button class="nav-link text-start" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Навигация по сайту</button>
        <hr>
      </div>
      <div class="tab-content mt-4 col-md-8 col-sm-12" id="v-pills-tabContent">
        <!-- <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <h5 class="fw-700">Статус клиента</h5>
          - <span class="fw-700">Физическое лицо</span> - покупка товаров в розницу. Розничные цены. Не требует заключения договора.
          <br><br>
          - <span class="fw-700">Юридическое лицо</span> - организация или индивидуальный предприниматель. Оптовые цены. Заключение договора.
          <br><br>
          - <span class="fw-700">Организатор совместных покупок</span> (сокращенно ОСП) - частное лицо, аккредитованное на торговых площадках России. Специальные цены. Есть ограничения. Не требует заключения договора.
        </div> -->
        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <h5 class="fw-700">Возврат товара</h5>
            Вы можете вернуть товар без указания причин в течение 14 календарных дней с момента
            получения при условии, что он не использовался, сохранил внешний вид, фабричные ярлыки
            и свои потребительские свойства.
          <br><br>
             Вам необходимо при себе иметь документ, по которому вы получили товар, кассовый чек и паспорт.
        </div>
        <div class="tab-pane fade" id="v-pills-moneyback" role="tabpanel" aria-labelledby="v-pills-moneyback-tab">
           <h5 class="fw-700">Возврат денежных средств</h5>
          Возврат денежных средств осуществляется в течение 10 календарных дней с момента поступления посылки с возвратом на склад интернет-магазина.
          При возврате товара надлежащего качества, клиенту возвращаются только деньги за товар согласно цене в заказе.
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
          <h5 class="fw-700">Способы покупки и оплата</h5>
          - Самовывоз
          <br>
          - Доставка
          <br><br>
          <h5 class="fw-700">Оплата товара</h5>
          Оплата товара осуществляется при получении заказа наличными или картой.
        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
          <h5 class="fw-700">Навигация по сайту</h5>
          - Раздел "Каталог хозтоваров" предназначен для ознакомления, подбора и онлайн заказа продукции.
          <br>
          - Поиск по каталогу помогает в подборе нужных товаров.
          <br>

          <br>
        </div>
      </div>
    </div>

    <div >
      <div class="row mt-4">
        <h3 class="mt-4 mb-4 fw-700">Где мы находимся</h3>
        <div class="col-12 ">
            <img src="{{asset('img/map.jpg')}}" alt="map" class="w-100 border">
        </div>

        <div class="col-12">
            <div class="row mt-4">
                <div class="col-lg-6 col-sm-12">
                    <h5>О нас</h5>
                    <p>В нашем каталоге: хозяйственные товары, посуда, бытовая химия; бытовая техника; косметика, средства по уходу и гигиене; товары для интерьера, хранения, уборки; инструменты, садовые принадлежности, средства ухода за растениями, удобрения, репелленты; аксессуары для ванной комнаты, электротовары и многое другое.</p>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <h5>Где мы находимся?</h5>
                    <ul class="px-0">
                        <li class="list-unstyled mb-1">Мы здесь: Первомаская улица, 22</li>
                        <li class="list-unstyled mb-1"><a href="tel:+79373211087">+79373211087</a></li>
                        <li class="list-unstyled mb-1"><a href="tel:+79373249694">+79373249694</a></li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Часы работы</h5>
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <th class="fw-bold text-muted ps-0">Будние дни</th>
                                    <td>09:00 - 20:00</td>

                                  </tr>
                                  <tr>
                                    <th class="fw-bold text-muted ps-0">Выходные</th>
                                    <td>10:00 - 18:00</td>
                                  </tr>
                                  <tr>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
  </div>

@endsection
