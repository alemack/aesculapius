@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/userEdit.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div>
    <form action="{{route('admin.user.make_patient.store')}}" method="post">
        @csrf
    <h1>Запись на прием</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div>
            <label for="schedule_id">id:</label>
            <input type="text" id="schedule_id" name="schedule_id" value="{{ old('schedule_id', $schedule->id) }}" required autofocus>
        </div>
        {{-- <div>
            <p>{{$user->name}}</p>
        </div> --}}
        <button type="submit">Создать</button>
</form>
</div>
<div>
    <a href="{{ route('admin.user.index') }}">Обратно к списку пользователей</a>
</div>
@endsection

