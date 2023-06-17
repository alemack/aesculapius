@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                <h1 class="card-title text-center mb-4">Добавление часа приема</h1>
                <form method="POST" action="{{ route('admin.schedule.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="doctor_id">Врач:</label>
                        <select class="form-select" name="doctor_id" id="doctor_id">
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date">Дата:</label>
                        <input type="date" name="date" class="form-control" id="date">
                    </div>
                    <div class="mb-3">
                        <label for="start_time">Начало:</label>
                        <input type="time" name="start_time" class="form-control" id="start_time">
                    </div>
                    <div class="mb-3">
                        <label for="end_time">Конец:</label>
                        <input type="time" name="end_time" class="form-control" id="end_time">
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="is_available" name="is_available">
                        <label class="form-check-label" for="is_available"><strong>Принимает</strong></label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary">Назад</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
