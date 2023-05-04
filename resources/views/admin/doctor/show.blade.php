@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container mt-5">
    <div class="card shadow-sm p-3 mb-5 bg-body rounded">
        <h1 class="text-center mb-5">Информация о пользователе</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text"><strong>Email: </strong>{{ $user->email }}</p>
                    <p class="card-text"><strong>Роль: </strong>{{ $user->role }}</p>
                    <p class="card-text"><strong>Дата создания: </strong>{{ $user->created_at }}</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary mx-3">Изменить</a>
            <a href="{{route('admin.user.index')}}" class="btn btn-secondary mx-3">Назад</a>
        </div>
    </div>
</div>
@endsection
