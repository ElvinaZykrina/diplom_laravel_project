@extends('auth.layouts.masterAdmin')

@section('title', 'Категория ' . $category->name)

@section('content')

<div class="col-md-12 my-container">
        <h1>Категория Бытовая техника</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{$category->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{$category->code}}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{$category->name}}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{$category->description}}</td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{$category->products->count()}}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td>
                <img style="width: 50px;" src="{{Storage::url($category->image)}}" alt="">
            </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
