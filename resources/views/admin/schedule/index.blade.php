@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
            <h1>Администрирование расписания</h1>
            <div>
                <a href="{{route('admin.schedule.create')}}" class="btn btn-primary mb-3">Добавить день</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Врач</th>
                        <th>День недели</th>
                        <th>Начало</th>
                        <th>Конец</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->id }}</td>
                            <td>{{ $schedule->doctor->name }}</td>
                            <td>{{ dayOfWeekName($schedule->day_of_week) }}</td>
                            <td>{{ $schedule->start_time }}</td>
                            <td>{{ $schedule->end_time }}</td>
                            <td>
                                <div>
                                    <button type="button" class="btn btn-light"><a href="{{route('admin.schedule.show', $schedule->id)}}">Посмотреть</a></button>
                                </div>
                                <div>
                                    <form method="POST" action="{{route('admin.schedule.delete', $schedule->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Удалить</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        {{-- </div> --}}
    </div>
</div>
{{-- <div> --}}
    <hr>
    <button type="button" class="btn btn-light"><a href="{{ route('home') }}">Вернуться в кабинет</a></button>
{{-- </div> --}}
<div class="mt-3">
    {{$schedules->links()}}
</div>
@endsection

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
