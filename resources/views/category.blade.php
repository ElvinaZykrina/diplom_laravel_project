@extends('layouts.master')

@section('title', 'Категория ' . $category->name)

@section('content')

<div class="my-container">
    <h1>{{ $category->name }}</h1>
    <!-- {{ $category->products->count()}}
        <p>{{ $category->description }}</p> -->
    <div class="breadcrumps d-flex mb-3">
        <a class="breadcrumps-link success_link" href="{{route('main')}}">Главная</a>
        <a class="breadcrumps-link success_link" href="{{ route('index') }}">Каталог товаров</a>
        <a class="success_link" href="{{ route('category', $category->code) }}">{{ $category->name }}</a>
    </div>

    <div class="row">
        <!-- фильтр -->

        <!-- товары -->

        <div class="col-md-12 col-sm-12 products-container ">
            {{-- карточка товара --}}
            @foreach ($category->products as $product)
            @include('layouts.card', ['product' => $product])
            @endforeach

            <!-- <div class="d-flex justify-content-center my-4">
                {{$products->appends(['s'=>request()->s])->links()}}
            </div> -->
        </div>
    </div>
</div>

@endsection
