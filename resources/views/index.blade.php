@extends('layouts.app')
@section('title', 'Главная')
@section('content')
    <div class="content">
        <h2 class="text-center my-3">О нас</h2>

        <div class="card-main d-flex justify-content-center gap-2">
            <div class="card">
                <h5 class="card-header bg-info text-white">Первое</h5>
                <div class="card-body">
                    <h5 class="card-title">Быстро</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header bg-info text-white">Второе</h5>
                <div class="card-body">
                    <h5 class="card-title">Надежно</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header bg-info text-white">Третье</h5>
                <div class="card-body">
                    <h5 class="card-title">Качественно</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>

        <h2 class="text-center my-3">Наши курсы</h2>

        <div class="courses-section d-flex justify-content-center gap-2">
            @foreach ($courses as $item)
                <div class="card mx-3" style="width: 18rem;">
                    <img src="{{asset('image/'. $item->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">Описание: {{ $item->description }}</p>
                        <p class="card-text">Цена: {{ $item->cost }} ₽</p>
                        <p class="card-text">Длительность: {{ $item->duration }} мес.</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container d-flex justify-content-center my-3">
            {{ $courses->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
        <div class="containter category">
            @foreach ($category as $item)
                <a href="/category/{{$item -> id}}" class="btn btn-primary">{{ $item->title }}</a>
            @endforeach
            <br>
            <a href="/" class="btn btn-primary my-3">Сбросить</a>
        </div>
    </div>
@endsection('content')
