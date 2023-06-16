@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container mt-5">
    <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="max-width: 500px; margin: 0 auto;">
        <h1 class="text-center mb-4">Создание специализации</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.specialization.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Название:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <a href="{{ route('admin.specialization.index') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
</div>
@endsection
