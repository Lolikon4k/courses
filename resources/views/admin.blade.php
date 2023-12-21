@extends('layouts.app')
@section('title', 'Админ')
@section('content')
    <div class="container admin-page">
        <h2 class="text-center my-3">Админ панель</h2>

        <div class="application-section">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Почта</th>
                        <th scope="col">Дата подачи</th>
                        <th scope="col">Дата обновления</th>
                        <th scope="col" class="text-center">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($application as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            @if ($item->is_confirm == 1)
                                <td class="text-center">Отклонена</td>
                            @endif

                            @if ($item->is_confirm == 2)
                                <td class="text-center">Подтверждена</td>
                            @endif

                            @if ($item->is_confirm == 0)
                                <td class="text-center">
                                    <a href="/application/{{ $item->id }}/confirm" class="btn btn-success">
                                        Принять
                                    </a>
                                    <a href="/application/{{ $item->id }}/NotConfirm" class="btn btn-danger">
                                        Отклонить
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="container d-flex justify-content-center my-3">
                {{ $application->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>


        <div class="courses-section">
            <h2 class="text-center my-3">Создать курс</h2>
            <form method="POST" action="/course/create" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Название курса</label>
                    <input type="text" class="form-control" name="title">
                    @error('title')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <input type="text" class="form-control" name="description">
                    @error('description')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Стоимость</label>
                    <input type="text" class="form-control" name="cost">
                    @error('cost')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Длительность</label>
                    <input type="text" class="form-control" name="duration">
                    @error('duration')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Изображение</label>
                    <input type="file" class="form-control" name="image">
                    @error('image')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" name="category">

                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <input value="Создать курс" type="submit" class="btn btn-primary">
            </form>
        </div>


        <div class="category-section">
            <h2 class="text-center my-3">Создать категорию</h2>
            <form method="POST" action="/category/create">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Название категории</label>
                    <input type="text" class="form-control" name="title">
                    @error('title')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Создать категорию</button>
            </form>

        </div>
    </div>

@endsection('content')
