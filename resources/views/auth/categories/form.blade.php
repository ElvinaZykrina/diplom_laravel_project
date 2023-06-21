@extends('auth.layouts.masterAdmin')


@isset($category)
        @section('title', 'Редактировать Категорию ' . $category->name)
    @else
        @section('title', 'Создать Категорию')
@endisset


@section('title', 'Добавление категории')

@section('content')
<div class="col-md-12">
    <div class="mb-5">
        @isset($category)
            <h3 class="mt-4 mb-5">Редактировать Категорию <b>{{$category->name}}</b></h3>
        @else
            <h3 class="mt-4 mb-5 fw-bold">Добавить категорию</h3>

        @endisset
    </div>

    <form method="POST" enctype="multipart/form-data"
        @isset($category)
                action="{{route('categories.update', $category)}}"
            @else
                action="{{route('categories.store')}}"
        @endisset
        >
        @isset($category)
            @method('PUT')
        @endisset
        @csrf
        <div>

            <div class="input-group row">
                <label for="code" class="col-sm-2 col-form-label fw-bold">Код: </label>
                <div class="col-sm-6">
                    @error('code')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <input type="text" class="form-control" name="code" id="code"
                    value="{{old('code', isset($category) ? $category->code : null)}}">
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label fw-bold">Название: </label>
                <div class="col-sm-6">
                       @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <input type="text" class="form-control" name="name" id="name"
                    value="@isset($category){{$category->name}}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="description" class="col-sm-2 col-form-label fw-bold">Описание: </label>
                <div class="col-sm-6">
                       @error('description')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <textarea name="description" id="description" class="form-control" id="floatingTextarea2" style="height: 100px">
                        @isset($category){{$category->description}}@endisset
                    </textarea>
                </div>
            </div>
            <br>
            <button class="btn btn-delete">Сохранить</button>
        </div>
    </form>
</div>
@endsection
