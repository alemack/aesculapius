@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<div class="container">
    <div class="card shadow-sm p-3 mb-5 bg-body rounded">
        <div class="card-body">
            <h1 class="card-title text-center">Создание пользователя</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.user.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">ФИО:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Почта:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль:</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Роль:</label>
                    <select class="form-select" id="role" name="role">
                        @foreach ($roles as $role)
                            <option {{ old('role') == $role->title ? 'selected' : '' }} value="{{ $role->title }}">
                                @if ($role->title == 'admin')
                                    Администратор
                                @elseif ($role->title == 'patient')
                                    Пациент
                                @elseif ($role->title == 'doctor')
                                    Врач
                                @elseif ($role->title == 'user')
                                    Пользователь
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
                <div class="text-center">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Назад</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
