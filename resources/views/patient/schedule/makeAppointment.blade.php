@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('patient.schedule.make_appointment.store')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Подтверждение записи</h1>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h4>Данные врача:</h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Врач:</td>
                                            <td>{{ $schedule->doctor->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Статус:</td>
                                            <td>{{$schedule->is_available ? "Принимает" : "Не принимает"}}</td>
                                        </tr>
                                        <tr>
                                            <td>Начало приема:</td>
                                            <td>{{ $schedule->start_time }}</td>
                                        </tr>
                                        <tr>
                                            <td>Конец приема:</td>
                                            <td>{{ $schedule->end_time }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>Данные пациента:</h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Пациент:</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Дата:</td>
                                    <td>{{$schedule->date}}</td>
                                </tr>
                                <tr>
                                    <td>День недели:</td>
                                    <td>
                                        @php
                                            $dayOfWeek = \Carbon\Carbon::parse($schedule->date)->locale('ru')->isoFormat('dddd');
                                            $capitalizedDayOfWeek = mb_strtoupper(mb_substr($dayOfWeek, 0, 1)) . mb_substr($dayOfWeek, 1);
                                        @endphp
                                        {{ $capitalizedDayOfWeek }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="{{ route('patient.schedule.index') }}" class="btn btn-primary text-white">Назад</a>
                            <button class="btn btn-primary" type="submit">Подтвердить</button>
                            <input type="hidden" name="patient_id" value="{{$user->patient->id}}">
                            <input type="hidden" name="schedule_id" value="{{$schedule->id}}">
                            <input type="hidden" name="status" value="ожидание подтверждение">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
