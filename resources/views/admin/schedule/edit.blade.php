@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                <h1 class="card-title text-center mb-4">Редактирование записи расписания</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.schedule.update', $schedule->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    {{-- <div class="form-group">
                        <label for="doctor_id">Врач</label>
                        <input type="text" id="doctor_id" name="doctor_id" value="{{ $schedule->doctor->user->name }}" readonly>
                        <input type="hidden" name="doctor_id" value="{{ $schedule->doctor->id }}">
                    </div> --}}
                    <div class="mb-3">
                        <div class="card shadow-sm p-3 mb-3 bg-body rounded text-center">
                            {{ $schedule->doctor->user->name }}
                            <input type="hidden" id="doctor_id" name="doctor_id" value="{{ $schedule->doctor->id }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date">Дата:</label>
                        <input type="date" name="date" class="form-control" id="date" value="{{ $schedule->date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Начало приема:</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $schedule->start_time }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end_time">Конец приема:</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $schedule->end_time }}" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_available" name="is_available">
                        <label class="form-check-label" for="is_available"><strong>Принимает</strong></label>
                    </div>
                    <div class="text-center mt-3">
                        {{-- <button type="button" class="btn btn-danger"><a href="{{ route('admin.schedule.index') }}">Отмена</a></button> --}}
                        <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary">Назад</a>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
