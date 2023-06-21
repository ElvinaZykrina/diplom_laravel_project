 @extends('layouts.master')

 @section('title', 'Авторизация')

 @section('content')
<div class="container my-5">
   <div class="col-md-5 col-sm-12 mx-auto ">
        @if ($errors->any())
            <div class="alert alert-danger mx-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h5 class="fw-bolder text-center mb-4">@yield('title')</h5>
        <form method="POST" action="{{ route('login') }}" aria-label="Login" class="d-flex justify-content-center flex-column">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control"  name="email" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class=" btn-auth mt-3">Войти</button>
        </form>
    </div>
</div>



 @endsection
