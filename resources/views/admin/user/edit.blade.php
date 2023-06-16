@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
<div class="container mt-5">
    <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="max-width: 500px; margin: 0 auto;">
        <h1 class="text-center mb-4">Редактирование пользователя</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
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
            <div class="mb-3">
                <label for="name" class="form-label text-center">ФИО:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-center">Почта:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-center">Пароль:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label text-center">Роль:</label>
                <select class="form-control" id="role" name="role">
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Администратор</option>
                    <option value="doctor" {{ $user->role === 'doctor' ? 'selected' : '' }}>Врач</option>
                    <option value="patient" {{ $user->role === 'patient' ? 'selected' : '' }}>Пациент</option>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Пользователь</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-sm">Обновить</button>
            </div>
            {{-- <div class="text-center mt-3">
                <p>Дата создания: {{ $user->created_at->format('Y-m-d') }}</p>
            </div> --}}
            <div class="text-center mt-3">
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary mx-2">Назад</a>
            </div>
        </form>
    </div>
</div>
@endsection
