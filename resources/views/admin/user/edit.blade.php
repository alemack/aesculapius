@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div>
    <h1>Редактирование пользователя</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
        @csrf
        @method('patch')
        <div>
            <label for="name">ФИО:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
        </div>
        <div>
            <label for="email">Почта:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password">
        </div>
        {{-- <div>
            <label for="role">Роль:</label>
            <input type="text" id="role" name="role" value="{{ old('role', $user->role) }}" required>
        </div> --}}
        <div class="form-group">
            <label for="role">Роль:</label>
            <select class="form-control" id="role" name="role">
                @foreach ($roles as $role)
                        <option
                        {{$role->title === $user->role ? 'selected' : ''}}
                        value="{{$role->title}}">{{$role->title}}</option>
                    @endforeach
            </select>
        </div>
        <button type="submit">Обновить</button>
    </form>
    <a href="{{ route('admin.user.index') }}">Обратно к списку пользователей</a>
    {{-- <a href="{{ route('dashboard') }}">Back to Dashboard</a> --}}
</div>
@endsection
