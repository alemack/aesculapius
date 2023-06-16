@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Управление пользователями</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Почта</th>
                        <th>Роль</th>
                        {{-- <th>Действия</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role === 'admin')
                                    Администратор
                                @elseif ($user->role === 'doctor')
                                    Врач
                                @elseif ($user->role === 'patient')
                                    Пациент
                                @elseif ($user->role === 'user')
                                    Пользователь
                                @endif
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-primary btn-sm">Просмотр</a>
                                </div>
                                <div>
                                    <form method="POST" action="{{ route('admin.user.delete', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Удалить</button>
                                    </form>
                                </div>
                                <div>
                                    <a href="{{ route('admin.user.make_doctor.create', $user->id) }}" class="btn btn-secondary">Сделать врачом</a>
                                </div>
                                <div>
                                    <a href="{{ route('admin.user.make_patient.create', $user->id) }}" class="btn btn-secondary">Сделать пациентом</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary text-white">Назад</a>
            </div>
            <div class="mt-3">
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
