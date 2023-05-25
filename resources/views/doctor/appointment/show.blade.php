@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Информация о записи</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Детали записи</h5>
                    <p><strong>Врач:</strong> {{ $appointment->schedule->doctor->user->name }}</p>
                    <p><strong>Дата:</strong> {{ $appointment->schedule->date }}</p>
                    <p><strong>Начало:</strong> {{ $appointment->schedule->start_time }}</p>
                    <p><strong>Конец:</strong> {{ $appointment->schedule->end_time }}</p>
                    <p><strong>Статус:</strong> {{ $appointment->status }}</p>
                </div>
            </div>
            <div class="mt-4">
                <h4>Информация о пациенте</h4>
                <p><strong>Имя:</strong> {{ $appointment->patient->user->name }}</p>
                <p><strong>Email:</strong> {{ $appointment->patient->user->email }}</p>
            </div>
            <div class="mt-3">
                <a href="{{ route('doctor.medicalCard.create', $appointment->id) }}" class="btn btn-primary">Сделать запись в медкарту</a>
                <a href="{{ route('home', $appointment->patient_id) }}" class="btn btn-success">Посмотреть медкарту</a>
                <button type="button" class="btn btn-light"><a href="{{ route('doctor.appointment.index') }}">Вернуться к списку записей</a></button>
            </div>
        </div>
    </div>
</div>
@endsection
