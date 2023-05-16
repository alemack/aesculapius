@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Добавление рабочего дня</h1>
            <form method="POST" action="{{ route('admin.schedule.store') }}">
                @csrf
                <div class="form-group">
                    <label for="doctor_id">Врач</label>
                    <select class="form-select" name="doctor_id" id="doctor_id">
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="day_of_week">День недели</label>
                    <select class="form-select" name="day_of_week" id="day_of_week">
                        <option value="1">Понедельник</option>
                        <option value="2">Вторник</option>
                        <option value="3">Среда</option>
                        <option value="4">Четверг</option>
                        <option value="5">Пятница</option>
                        <option value="6">Суббота</option>
                        <option value="7">Воскресенье</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_time">Начало рабочего дня</label>
                    <input type="time" name="start_time" class="form-control" id="start_time">
                </div>
                <div class="form-group">
                    <label for="end_time">Окончание рабочего дня</label>
                    <input type="time" name="end_time" class="form-control" id="end_time">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
</div>
<div class="mt-3">
    <button type="button" class="btn btn-light">
        <a href="{{ route('admin.schedule.index') }}">Вернуться к списку рабочих дней</a>
    </button>
</div>
@endsection
