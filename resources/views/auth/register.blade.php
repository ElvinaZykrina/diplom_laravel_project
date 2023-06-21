 @extends('layouts.master')

 @section('title', 'Регистрация')

 @section('content')

<div class="container my-5">
    <h5 class="fw-bolder text-center mb-4">@yield('title')</h5>
    <div class="col-md-8 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}" aria-label="Register" class="d-flex flex-column">
            @csrf
            <div class="mb-3">
               <label class="form-label">Имя</label>
               <input type="text" class="form-control"  name="name" required autofocus>
           </div>
           <div class="mb-3">
               <label class="form-label">Email</label>
               <input type="email" class="form-control"  name="email" required>
           </div>
           <div class="mb-3">
               <label class="form-label">Пароль</label>
               <input type="password" class="form-control"  name="password" required>
           </div>
           <div class="mb-3">
               <label class="form-label">Подтвердите пароль</label>
               <input type="password" class="form-control"  name="password_confirmation" required>
           </div>
           <button type="submit" class="btn-auth mt-3">Зарегистрироваться</button>
        </form>
    </div>
</div>



 @endsection
