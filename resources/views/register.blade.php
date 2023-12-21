@extends('layouts.app')
@section('title', 'Регистрация')
@section('content')

    <div class="container">
        <h2 class="d-block my-3 text-center">Sign Up</h2>

        <form action="/SignUp_check" method="POST" class="w-50 mx-auto text-center">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="text" class="form-control" placeholder="Name">
            </div>
            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Email">
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
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Check Password</label>
                <input name="confirm_password" type="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Repeat password">
            </div>
            @error('confirm_password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <input type="submit" class="btn btn-primary" value="Зарегестрироваться">
        </form>
    </div>

@endsection('content')
