@extends('auth.layouts.masterAdmin')


@section('title', 'Категории' )

@section('content')

<div class="col-md-12">
    <h3 class="my-3">Категории</h3>
    <input class="form-control mb-4" id="myInput" type="text" placeholder="Поиск категории...">
    <table class="table">
        <tbody id="myTable">
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->code}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{route('categories.destroy', $category)}}" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a class="btn btn-open" type="button" href="{{route('categories.show', $category)}}">Открыть</a>
                                <a class="btn btn-edit" type="button" href="{{route('categories.edit', $category)}}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-delete" type="submit" value="Удалить">
                            </div>
                            <!-- <a class="btn btn-success" type="button"
                                href="{{route('categories.show', $category)}}">Открыть</a>
                            <a class="btn btn-warning" type="button"
                                href="{{route('categories.edit', $category)}}">Редактировать</a>
                            @csrf
                            @method('DELETE')
                             <input class="btn btn-danger" type="submit" value="Удалить"> -->
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <a class="btn btn-add" type="button"
    href="{{route('categories.create')}}">Добавить категорию</a>
</div>
<script src="{{asset('js/search_table.js')}}"></script>

@endsection
