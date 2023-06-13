@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-info text-center" role="alert">
                Для записи по номеру телефона звоните на +7 (999) 999-99-99
            </div>
            {{-- <h1>Расписание работы врачей</h1> --}}
            @foreach ($specializations as $specialization)
                <h2>{{ $specialization->name }}</h2>
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>№</th> --}}
                            {{-- <th>Врач</th> --}}
                            <th>День недели</th>
                            <th>Начало приема</th>
                            <th>Конец приема</th>
                            <th>Статус</th>
                            {{-- <th>Действия</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialization->doctors as $doctor)
                            <h5>{{ $doctor->user->name }}</h5>
                            @foreach ($doctor->schedules as $schedule)
                                <tr>
                                    {{-- <td>{{ $schedule->id }}</td> --}}
                                    {{-- <td>{{ $doctor->user->name }}</td> --}}
                                    <td>
                                        @php
                                            $dayOfWeek = \Carbon\Carbon::parse($schedule->date)->locale('ru')->isoFormat('dddd');
                                            $capitalizedDayOfWeek = mb_strtoupper(mb_substr($dayOfWeek, 0, 1)) . mb_substr($dayOfWeek, 1);
                                        @endphp
                                        {{ $capitalizedDayOfWeek }}
                                    </td>
                                    <td>{{ $schedule->start_time }}</td>
                                    <td>{{ $schedule->end_time }}</td>
                                    <td>{{ $schedule->is_available ? "Принимает" : "Не принимает" }}</td>
                                    {{-- <td>
                                        <div>
                                            <button type="button" class="btn btn-outline-primary"><a href="{{ route('patient.schedule.show', $schedule->id) }}">Просмотр</a></button>
                                        </div>
                                    </td> --}}
                                    <td>
                                        <div>
                                            <a href="{{ route('patient.schedule.show', $schedule->id) }}" class="btn btn-primary btn-sm">Просмотр</a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @endforeach
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary text-white">Вернуться в кабинет</a>
            </div>
        </div>
    </div>
</div>
<div class="mt-3">
    {{ $schedules->links() }}
</div>
@endsection
