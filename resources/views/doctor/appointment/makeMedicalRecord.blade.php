@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Создание записи в медкарту</h1>
            <form method="POST" action="{{ route('doctor.medicalCard.store') }}">
                @csrf
                <input type="hidden" name="patient_id" value="{{ $appointment->patient_id }}">
                <input type="hidden" name="doctor_id" value="{{ $appointment->schedule->doctor->id }}">
                <input type="hidden" name="appointment_date" value="{{ $appointment->schedule->date }}">
                <div class="mb-3">
                    <label for="diagnosis" class="form-label">Диагноз</label>
                    <input type="text" class="form-control" id="diagnosis" name="diagnosis" required>
                </div>
                <div class="mb-3">
                    <label for="treatment" class="form-label">Лечение</label>
                    <textarea class="form-control" id="treatment" name="treatment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Записать</button>
            </form>
            <div class="mt-3">
                <button type="button" class="btn btn-light"><a href="{{ route('doctor.appointment.index') }}">Вернуться к списку записей</a></button>
            </div>
        </div>
    </div>
</div>
@endsection
