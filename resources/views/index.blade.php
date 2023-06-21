@extends('layouts.master')

@section('title', 'Все товары')

@section('content')
    <div class="my-container">
        <div class="breadcrumps d-flex mb-3">
            <a class="breadcrumps-link success_link" href="{{ route('main') }}">Главная</a>
            <a class="success_link" href="{{ route('index') }}">Каталог товаров</a>
        </div>
        <div class="row">
            <!-- фильтр -->
            <div class="filters-container col-md-3 col-sm-12 m-0 mb-4">
                <form action="{{route('index')}}" method="GET">
                <div class="filters p-3">
                    <div class="row mb-2">
                        <div class="col-md-12 col-sm-6">
                            <label class="fs-7" for="new">
                                <input class="me-2" type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif >Новинка
                            </label>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <label class="fs-7" for="recommend">
                                <input class="me-2" type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif>Рекомендуем
                            </label>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <label class="fs-7" for="hit">
                                <input class="me-2" type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif>Хит продаж
                            </label>
                        </div>
                    </div>
                    <p class="fw-700 fs-7 mb-1">Цена</p>
                    <div class="d-flex flex-wrap fs-7 mb-3">
                        <div class="col-md-12 col-sm-3 me-2">
                            <label class="filter-label mb-1" for="price_from">от
                                <input class="filter-input w-100" type="text" name="price_from" id="price_from"
                                    size="6" value="{{request()->price_from}}">
                            </label>
                        </div>
                        <div class="col-md-12 col-sm-3">
                            <label class="filter-label" for="price_to">до
                                <input class="filter-input w-100" type="text" name="price_to" id="price_to"
                                    size="6" value="{{request()->price_to}}">
                            </label>
                        </div>
                    </div>
                    <p class="fw-700 fs-7 mb-1">Сортировать по</p>
                    <div class="row mb-4">
                        <div class="col-12">
                        <select class="form-select"  id="inputGroupSelect01" name="sort">
                            <option value="created_at_new" {{ request()->input('sort') == 'created_at_new' ? 'selected' : '' }}>Сначала новые</option>
                            <option {{ request()->input('sort') == 'created_at_old' ? 'selected' : '' }} value="created_at_old">Сначала старые</option>
                            <option {{ request()->input('sort') == 'price_low' ? 'selected' : '' }} value="price_low">Сначала дешевые</option>
                            <option {{ request()->input('sort') == 'price_high' ? 'selected' : '' }} value="price_high">Сначала дорогие</option>
                        </select>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap">
                        <button type="submit" class="btn-filter me-2 mb-2">Фильтр</button>
                        <a href="{{route('index')}}" class="btn-cancel mb-2">Стереть</a>
                    </div>
                </div>
                </form>
            </div>
            <!-- товары -->

            <div class="col-md-9 col-sm-12 products-container ">
                    {{-- карточка товара --}}
                    @if (count($products))
                        <ul class="products clearfix">
                            @foreach ($products as $product)
                                    @include('layouts.card', ['product' => $product])
                            @endforeach

                        </ul>
                    @else
                        <div class="d-block text-center">
                            <h1>Ничего не нашлось по запросу «{{request()->s}}»</h1>
                            <p>Попробуйте изменить или сократить запрос</p>
                            <img src="{{asset('img/sadlupa.svg')}}" alt="norequest" style="width: 100px;">
                        </div>
                    @endif

                    <div class="d-flex justify-content-center my-4">
                        {{$products->appends(['s'=>request()->s])->links()}}
                    </div>
            </div>
        </div>
    </div>

@endsection
