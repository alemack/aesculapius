@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container mt-5">
    <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="max-width: 500px; margin: 0 auto;">
        <h1 class="text-center mb-4">Редактирование Врача</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.doctor.update', $doctor->id) }}">
            @csrf
            @method('patch')
            <div class="mb-3">
                <div class="card shadow-sm p-3 mb-3 bg-body rounded text-center">
                    {{ $doctor->user->name }}
                </div>
            </div>
            <div class="form-group">
                <label for="specializations">Специализация:</label>
                <select multiple class="form-control" id="specializations" name="specializations[]">
                    @foreach ($specializations as $specialization)
                        <option
                            @foreach ($doctor->specializations as $doctorSpecialization)
                                {{ $specialization->id === $doctorSpecialization->id ? 'selected' : '' }}
                            @endforeach
                            value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
            <a href="{{ route('admin.doctor.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
</div>
@endsection
