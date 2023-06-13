@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Просмотр записи расписания</h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Врач:</td>
                                <td>{{ $schedule->doctor->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Дата:</td>
                                <td>{{$schedule->date}}</td>
                            </tr>
                            <tr>
                                <td>Начало приема:</td>
                                <td>{{ $schedule->start_time }}</td>
                            </tr>
                            <tr>
                                <td>Конец приема:</td>
                                <td>{{ $schedule->end_time }}</td>
                            </tr>
                            <tr>
                                <td>Статус:</td>
                                <td>{{$schedule->is_available ? "Принимает" : "Не принимает"}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-between">
                        {{-- <button type="button" class="btn btn-primary text-white"><a href="{{ route('admin.schedule.index') }}" style="text-decoration: none;">Назад</a></button> --}}
                        <a href="{{ route('patient.schedule.index') }}" class="btn btn-primary text-white">Назад</a>
                        <a href="{{route('patient.schedule.make_appointment.create', $schedule->id)}}" class="btn btn-primary" style="text-decoration: none;">Записаться</a>
                        {{-- <button type="button" class="btn btn-light"><a href="{{ route('admin.schedule.index') }}" style="text-decoration: none;">Назад</a></button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
