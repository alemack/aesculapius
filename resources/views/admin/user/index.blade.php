@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/usersTable.css') }}">


<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
            <h1>Управление пользователями</h1>
            <table>
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Почта</th>
                        <th>Роль</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div>
                                    <button type="button" class="btn btn-light"><a href="{{route('admin.user.show', $user->id)}}">Посмотреть</a></button>
                                </div>
                                <div>
                                    <form method="POST" action="{{route('admin.user.delete', $user->id)}}">
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
<button type="button" class="btn btn-light"><a href="{{ route('home') }}">Вернуться в кабинет</a></button>
@endsection
