@extends('layouts.master')

@section('title', 'Главная')

@section('content')

    <div class="container">
        <div class="row mt-4">
            <div class="col-12 ">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="200" id="gmap_canvas" 
                        src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com/divi-discount/"></a><br>
                        <style>.mapouter{height:200px;width:100%;}</style>
                        <a href="https://www.embedgooglemap.net">google make your own map</a><style>
                        .gmap_canvas {overflow:hidden;background:none!important;height:200px;width:100%;}
                        </style>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row mt-4">
                    <div class="col-lg-6 col-sm-12">
                        <h5>Магазин музыкальных инструментов Music House</h5>
                        <p>Music House — лидер рынка розничной продажи музыкальных инструментов и оборудования в России. Наши магазины предлагают лучшие музыкальные инструменты, созданные мировыми производителями, а также весь спектр профессионального звукового, светового и студийного оборудования.</p>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h5>Где мы находимся?</h5>
                        <ul class="px-0">
                            <li class="list-unstyled mb-1">Мы здесь: г. Москва, Краснохолмская наб. 3</li>
                            <li class="list-unstyled mb-1"><a href="tel:+1234567890">+1234567890</a></li>
                            <li class="list-unstyled mb-1"><a href="tel:+1234567890">+0987654321</a></li>
                        </ul>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Часы работы</h5>
                                <table class="table">
                                    <tbody>
                                      <tr>
                                        <th class="fw-bold text-muted ps-0">Будние дни</th>
                                        <td>08:00 - 20:00</td>
                                       
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
@endsection