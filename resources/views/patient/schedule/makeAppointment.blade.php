@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div>
    <form action="{{route('patient.schedule.make_appointment.store')}}" method="post">
        @csrf
    <h1>Подтверждение записи к врачу</h1>
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
            <label for="patient_id">Имя пациента:</label>
            <input type="text" id="patient_id" name="patient_id" value="{{ old('patient_id', $user->patient->id) }}" required autofocus>
        </div>
        <div>
            <p>{{$user->id}}</p>
        </div>
        <div>
            <label for="schedule_id">расписание:</label>
            <input type="text" id="schedule_id" name="schedule_id" value="{{ old('schedule_id', $schedule->id) }}" required autofocus>
        </div>
        <div>
            <p>{{$schedule->id}}</p>
        </div>
        <input type="hidden" name="status" value="ожидание подтверждения">

        <button type="submit">Создать</button>
</form>
</div>
<div>
    <a href="{{ route('patient.schedule.index') }}">обратно к расписанию</a>
</div>
@endsection

