@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Детали приема</h1>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h4>Данные врача:</h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Врач:</td>
                                            <td>{{ $medicalRecord->doctor->user->name }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td>Специализация:</td>
                                            <td>{{ $medicalRecord->doctor->user->name }}</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>Данные пациента:</h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Пациент:</td>
                                            <td>{{ $medicalRecord->patient->user->name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Дата:</td>
                                    <td>{{$medicalRecord->appointment_date}}</td>
                                </tr>
                                <tr>
                                    <td>День недели:</td>
                                    <td>
                                        @php
                                            $dayOfWeek = \Carbon\Carbon::parse($medicalRecord->appoinment_date)->locale('ru')->isoFormat('dddd');
                                            $capitalizedDayOfWeek = mb_strtoupper(mb_substr($dayOfWeek, 0, 1)) . mb_substr($dayOfWeek, 1);
                                        @endphp
                                        {{ $capitalizedDayOfWeek }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Диагноз:</td>
                                    <td>{{$medicalRecord->diagnosis}}</td>
                                </tr>
                                <tr>
                                    <td>Назначенное лечение:</td>
                                    <td>{{$medicalRecord->treatment}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="{{ route('doctor.appointment.index') }}" class="btn btn-primary text-white">Назад</a>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection
