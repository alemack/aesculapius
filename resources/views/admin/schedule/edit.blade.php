@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Редактирование записи расписания</h1>
            @if ($errors->any())
                <div>
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
                {{-- <div>
                    <p>{{$schedule->doctor->user->name}}</p>
                </div> --}}
                <div class="form-group">
                    <label for="doctor_id">Врач</label>
                    <input type="text" id="doctor_id" name="doctor_id" value="{{ $schedule->doctor->user->name }}" readonly>
                    <input type="hidden" name="doctor_id" value="{{ $schedule->doctor->id }}">
                </div>

                {{-- <div class="form-group">
                    <label for="doctor_id">Врач</label>
                    <select class="form-control" id="doctor_id" name="doctor_id">
                        @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ $schedule->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for="date">Дата</label>
                    <input type="date" name="date" class="form-control" id="date">
                </div>
                <div class="form-group">
                    <label for="start_time">Начало приема</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $schedule->start_time }}" required>
                </div>
                <div class="form-group">
                    <label for="end_time">Конец приема</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $schedule->end_time }}" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_available" name="is_available">
                    <label class="form-check-label" for="is_available">Принимает в это время</label>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-light"><a href="{{ route('admin.schedule.index') }}">Отмена</a></button>
            </form>
        </div>
    </div>
</div>
@endsection
