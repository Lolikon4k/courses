@extends('layouts.app')
@section('title', 'Авторизация')
@section('content')

    <div class="container">
        <form action="/SignIn_check" method="POST" class="w-50 mx-auto text-center">
            @csrf
            @if (session('error'))
                {{ session('error') }}
            @endif
            <h2 class="d-block my-3">Sign In</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Email">
            </div>
            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>
            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <input type="submit" class="btn btn-primary" value="Войти">
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.register-form');
            const checkbox = document.getElementById('exampleCheck1');

            form.addEventListener('submit', function(event) {
                if (!checkbox.checked) {
                    event.preventDefault(); // Предотвращаем отправку формы
                    alert('Вы должны согласиться с условиями политики конфиденциальности');
                }
            });
        });
    </script>

@endsection('content')
