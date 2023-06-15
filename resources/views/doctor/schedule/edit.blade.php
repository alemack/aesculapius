@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="card">
        <div class="card-body text-center">
            <h1 class="card-title">Изменение статуса приема</h1>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('doctor.schedule.update', $schedule->id) }}">
                @csrf
                @method('patch')
                <div class="mb-3">
                    {{-- <label for="is_available" class="form-label">Статус:</label> --}}
                    <select id="is_available" name="is_available" class="form-select" required autofocus>
                        <option value="1" {{ $schedule->is_available ? 'selected' : '' }}>Принимает</option>
                        <option value="0" {{ $schedule->is_available ? '' : 'selected' }}>Не принимает</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
            <a href="{{ route('doctor.schedule.index') }}" class="btn btn-danger mt-3">Отмена</a>
        </div>
    </div>
@endsection
