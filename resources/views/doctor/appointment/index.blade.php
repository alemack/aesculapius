@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Записи на прием</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Пациент</th>
                        <th>Дата</th>
                        <th>День недели:</th>
                        <th>Начало</th>
                        <th>Конец</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->patient->user->name }}</td>
                            <td>{{ $appointment->schedule->date }}</td>
                            <td>
                                @php
                                    $dayOfWeek = \Carbon\Carbon::parse($appointment->schedule->date)->locale('ru')->isoFormat('dddd');
                                    $capitalizedDayOfWeek = mb_strtoupper(mb_substr($dayOfWeek, 0, 1)) . mb_substr($dayOfWeek, 1);
                                @endphp
                                {{ $capitalizedDayOfWeek }}
                            </td>
                            <td>{{ $appointment->schedule->start_time }}</td>
                            <td>{{ $appointment->schedule->end_time }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                <div>
                                    <a href="{{ route('doctor.appointment.show', $appointment->id) }}" class="btn btn-primary btn-sm">Просмотр</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary text-white">Назад</a>
            </div>
        </div>
    </div>


{{-- <div> --}}
    {{-- <hr>
    <button type="button" class="btn btn-light"><a href="{{ route('home') }}">Вернуться в кабинет</a></button> --}}
{{-- </div> --}}
{{-- <div class="mt-3">
    {{$appointments->links()}}
</div> --}}
@endsection
