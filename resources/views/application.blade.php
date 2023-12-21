@extends('layouts.app')
@section('title', 'Заявка')
@section('content')
    <div class="container">
        <h2 class="text-center d-block my-3">Оставить заявку</h2>
        <div class="application-form">
            <form class="" method="POST" action="/send-application">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Email">
                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Name">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">Select courses</label>
                    <select name="course" class="form-select" aria-label="Default select example">
                        @foreach ($courses as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>

                <input class="btn btn-success d-block mx-auto" type="submit" value="Оставить заявку">
            </form>
        </div>
    </div>
@endsection('content')
