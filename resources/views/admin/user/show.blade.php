@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container mt-5">
    <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="max-width: 400px; margin: 0 auto;">
        <h1 class="text-center mb-4">{{$user->name}}</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    {{-- <h5 class="card-title">{{ $user->name }}</h5> --}}
                    <p class="card-text"><strong>Почта: </strong>{{ $user->email }}</p>
                    <p class="card-text"><strong>Роль: </strong>
                        @if ($user->role === 'admin')
                            Администратор
                        @elseif ($user->role === 'user')
                            Пользователь
                        @elseif ($user->role === 'patient')
                            Пациент
                        @elseif ($user->role === 'doctor')
                            Врач
                        @endif
                    </p>
                    <p class="card-text"><strong>Дата создания: </strong>{{ $user->created_at->toDateString() }}</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary mx-2">Назад</a>
            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary mx-2">Изменить</a>
        </div>
    </div>
</div>
@endsection
