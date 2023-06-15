@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>История записей</h1>
            @if ($medical_records->isEmpty())
                <div class="alert alert-info text-center" role="alert">
                    Нет записей в медицинской карте.
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>№</th> --}}
                            <th>Врач</th>
                            <th>Дата</th>
                            <th>День недели</th>
                            <th>Начало</th>
                            <th>Конец</th>
                            {{-- <th>Диагноз</th> --}}
                            {{-- <th>Лечение</th> --}}
                            {{-- <th>Действия</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medical_records as $medical_record)
                            <tr>
                                {{-- <td>{{ $appointment->id }}</td> --}}
                                <td>{{ $medical_record->doctor->user->name }}</td>
                                <td>{{ $medical_record->appointment_date }}</td>
                                <td>
                                    @php
                                        $dayOfWeek = \Carbon\Carbon::parse($medical_record->appoinment_date)->locale('ru')->isoFormat('dddd');
                                        $capitalizedDayOfWeek = mb_strtoupper(mb_substr($dayOfWeek, 0, 1)) . mb_substr($dayOfWeek, 1);
                                    @endphp
                                    {{ $capitalizedDayOfWeek }}
                                </td>
                                <td>{{ $medical_record->doctor->schedules->first()->start_time }}</td>
                                <td>{{ $medical_record->doctor->schedules->first()->end_time }}</td>
                                {{-- <td>{{ $medical_record->diagnosis }}</td> --}}
                                {{-- <td>{{ $medical_record->treatment }}</td> --}}
                                <td>
                                    {{-- <div>
                                        <a href="{{ route('patient.schedule.show', $appointment->schedule->id) }}" class="btn btn-primary btn-sm">Просмотр</a>
                                    </div> --}}
                                    <div>
                                        <a href="{{ route('patient.medical_records.show', $medical_record->id) }}" class="btn btn-primary btn-sm">Просмотр</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary text-white">Назад</a>
            </div>
        </div>
    </div>
</div>
{{-- <div class="mt-3">
    {{ $appointments->links() }}
</div> --}}
@endsection
