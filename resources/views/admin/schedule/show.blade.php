@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Просмотр записи расписания</h1>
            <table>
                <tbody>
                    <tr>
                        <td>Врач:</td>
                        <td>{{ $schedule->doctor->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Дата</td>
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
                        <td>Принимает ли</td>
                        <td>{{$schedule->is_available ? "Принимает" : "Не принимает"}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3">
                <a href="{{route('admin.schedule.edit', $schedule->id)}}" class="btn btn-primary mx-3">Изменить</a>
                <button type="button" class="btn btn-light"><a href="{{ route('admin.schedule.index') }}">Вернуться к списку расписания</a></button>
            </div>
        </div>
    </div>
</div>


@php
    function dayOfWeekName($dayOfWeek)
    {
        $daysOfWeek = [
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
             4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота',
            7 => 'Воскресенье',
        ];

        return $daysOfWeek[$dayOfWeek];
    }
@endphp
@endsection
