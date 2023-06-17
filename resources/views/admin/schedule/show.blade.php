@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                <h1 class="card-title text-center mb-4">Просмотр записи расписания</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>Врач:</strong></td>
                            <td>{{ $schedule->doctor->user->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Дата:</strong></td>
                            <td>{{ $schedule->date }}</td>
                        </tr>
                        <tr>
                            <td><strong>День недели:</strong></td>
                            <td>
                                @php
                                    $dayOfWeek = \Carbon\Carbon::parse($schedule->date)->locale('ru')->isoFormat('dddd');
                                    $capitalizedDayOfWeek = mb_strtoupper(mb_substr($dayOfWeek, 0, 1)) . mb_substr($dayOfWeek, 1);
                                @endphp
                                {{ $capitalizedDayOfWeek }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Начало приема:</strong></td>
                            <td>{{ $schedule->start_time }}</td>
                        </tr>
                        <tr>
                            <td><strong>Конец приема:</strong></td>
                            <td>{{ $schedule->end_time }}</td>
                        </tr>
                        <tr>
                            <td><strong>Статус</strong></td>
                            <td>{{ $schedule->is_available ? "Принимает" : "Не принимает" }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center mt-3">
                    {{-- <button type="button" class="btn btn-light"><a href="{{ route('admin.schedule.index') }}">Назад</a></button> --}}
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary mx-2">Назад</a>
                    <a href="{{ route('admin.schedule.edit', $schedule->id) }}" class="btn btn-primary mx-3">Изменить</a>
                </div>
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
