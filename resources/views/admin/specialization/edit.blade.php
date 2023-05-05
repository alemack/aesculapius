@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div>
    <h1>Редактирование специализации</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.specialization.update', $specialization->id) }}">
        @csrf
        @method('patch')
        <div>
            <label for="name">Название:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $specialization->name) }}" required autofocus>
        </div>
        <button type="submit">Обновить</button>
    </form>
    <a href="{{ route('admin.specialization.index') }}">Обратно к списку специализаций</a>
</div>
@endsection