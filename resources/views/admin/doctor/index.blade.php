@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
            <h1>Управление врачами</h1>
            <div>
                <a href="{{route('admin.doctor.create')}}" class="btn btn-primary mb-3">Добавить нового</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Специализация</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->name }}</td>
                            <td>{{  json_decode(($doctor->specializations->pluck('name')),true)[0]}}</td>
                            <td>
                                <div>
                                    <button type="button" class="btn btn-light"><a href="{{route('admin.doctor.show', $doctor->id)}}">Посмотреть</a></button>
                                </div>
                                <div>
                                    <form method="POST" action="{{route('admin.doctor.delete', $doctor->id)}}">
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

        {{-- </div> --}}
    </div>
</div>
{{-- <div> --}}
    <hr>
    <button type="button" class="btn btn-light"><a href="{{ route('home') }}">Вернуться в кабинет</a></button>
{{-- </div> --}}
<div class="mt-3">
    {{$doctors->links()}}
</div>
@endsection
