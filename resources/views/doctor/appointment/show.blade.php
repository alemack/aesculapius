@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Детали записи на прием</h1>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h4>Данные врача:</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Врач:</td>
                                        <td>{{ $appointment->schedule->doctor->user->name }}</td>
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
                                        <td>{{ $appointment->patient->user->name  }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Дата:</td>
                                <td>{{$appointment->schedule->date}}</td>
                            </tr>
                            <tr>
                                <td>День недели:</td>
                                <td>
                                    @php
                                        $dayOfWeek = \Carbon\Carbon::parse($appointment->schedule->date)->locale('ru')->isoFormat('dddd');
                                        $capitalizedDayOfWeek = mb_strtoupper(mb_substr($dayOfWeek, 0, 1)) . mb_substr($dayOfWeek, 1);
                                    @endphp
                                    {{ $capitalizedDayOfWeek }}
                                </td>
                            </tr>
                            <tr>
                                <td>Начало приема:</td>
                                <td>{{ $appointment->schedule->start_time }}</td>
                            </tr>
                            <tr>
                                <td>Конец приема:</td>
                                <td>{{ $appointment->schedule->end_time }}</td>
                            </tr>
                            <tr>
                                <td>Статус:</td>
                                <td>{{$appointment->status}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-5 d-flex justify-content-between">
                        <a href="{{ route('doctor.appointment.index') }}" class="btn btn-primary text-white">Назад</a>
                        <div>
                            <a href="{{ route('home', $appointment->patient_id) }}" class="btn btn-success">Медицинская карта</a>
                            <a href="{{ route('doctor.medicalCard.create', $appointment->id) }}" class="btn btn-primary ms-3">Сделать запись</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
