@extends('auth.layouts.masterAdmin')


@section('title', 'Товары')

@section('content')
    <div class="col-md-12">
        <h3 class="my-3">Товары</h3>
        <input class="form-control mb-4" id="myInput" type="text" placeholder="Поиск товара...">
        <table class="table">
            <tbody id="myTable">
            <tr class="fw-bold">
                <th class="fw-bold">#</th>
                <th class="fw-bold">Код</th>
                <th class="fw-bold">Название</th>
                <th class="fw-bold">Категория</th>
                <!-- <th>Описание</th> -->
                <th class="fw-bold">Кол-во</th>
                <th class="fw-bold">Действия</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <!-- <td>{{ $product->description }}</td> -->
                    <td>{{ $product->count }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a class="btn btn-open" type="button" href="{{ route('products.show', $product) }}">Открыть</a>
                                    <a class="btn btn-edit" type="button" href="{{ route('products.edit', $product) }}">Редактировать</a>
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-delete" type="submit" value="Удалить">
                                </div>
                            </form>
                                <!-- <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Открыть</a>
                                {{-- <a class="btn btn-success" type="button"
                                   href="{{ route('skus.index', $product) }}">Skus</a> --}}
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"> -->
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-add" type="button" href="{{ route('products.create') }}">Добавить товар</a>
    </div>
    <script src="{{asset('js/search_table.js')}}"></script>
@endsection
