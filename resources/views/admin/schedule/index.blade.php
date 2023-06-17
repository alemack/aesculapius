@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Управление расписанием</h1>
            <div>
                <a href="{{route('admin.schedule.create')}}" class="btn btn-success mb-sm">Создать</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th>№</th> --}}
                        <th>Врач</th>
                        <th>Дата</th>
                        <th>День недели</th>
                        <th>Начало</th>
                        <th>Конец</th>
                        <th>Статус</th>
                        {{-- <th>Действия</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        {{-- <td>{{ $schedule->id }}</td> --}}
                        <td>{{ $schedule->doctor->user->name }}</td>
                        <td>{{ $schedule->date }}</td>
                        <td>
                            @php
                                $dayOfWeek = \Carbon\Carbon::parse($schedule->date)->locale('ru')->isoFormat('dddd');
                                $capitalizedDayOfWeek = mb_strtoupper(mb_substr($dayOfWeek, 0, 1)) . mb_substr($dayOfWeek, 1);
                            @endphp
                            {{ $capitalizedDayOfWeek }}
                        </td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>{{$schedule->is_available ? "Принимает" : "Не принимает"}}</td>
                        <td>
                            <div>
                                <a href="{{route('admin.schedule.show', $schedule->id)}}" class="btn btn-primary btn-sm">Просмотр</a>
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
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary text-white">Назад</a>
            </div>
            <div class="mt-3">
                {{$schedules->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
