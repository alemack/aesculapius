@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div>
    <form action="{{route('admin.doctor.store')}}" method="post">
        @csrf
    <h1>Редактирование Врача</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div>
            <label for="name">ФИО:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="specializations">Специализация</label>
            <select multiple class="form-control" id="specializations" name="specializations[]">
                @foreach ($specializations as $specialization)
                    <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                @endforeach
            </select>
          </div>
        <button type="submit">Создать</button>
</form>
</div>
<div>
    <a href="{{ route('admin.doctor.index') }}">Обратно к списку пользователей</a>
</div>
@endsection

