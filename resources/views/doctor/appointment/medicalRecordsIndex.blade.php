@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>История записей пациента</h1>
            @if ($medical_records->isEmpty())
                <div class="alert alert-info text-center" role="alert">
                    Нет записей в медицинской карте.
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Врач</th>
                            <th>Дата</th>
                            <th>Диагноз</th>
                            <th>Лечение</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medical_records as $medical_record)
                            <tr>
                                <td>{{ $medical_record->doctor->user->name }}</td>
                                <td>{{ $medical_record->appointment_date }}</td>
                                <td>{{ $medical_record->diagnosis }}</td>
                                <td>{{ $medical_record->treatment }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('doctor.appointment.make_med_record.show', $medical_record->id) }}" class="btn btn-primary btn-sm">Просмотр</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('doctor.appointment.index') }}" class="btn btn-primary text-white">Назад</a>
                </div>
                <div>
                    <a href="{{ route('doctor.appointment.make_med_record.create', $medical_record->id) }}" class="btn btn-success">Сделать запись</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
