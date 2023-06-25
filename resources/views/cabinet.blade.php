@extends('layouts.app')

@section('content')

<div class="card" style="max-width: 400px; margin: 0 auto;">
    <div class="card-header">
        Кабинет пользователя
    </div>
    <div class="card-body">
        <p><strong>Имя:</strong> {{$user->name}}</p>
        <p><strong>Email:</strong> {{$user->email}}</p>
        <p><strong>Роль:</strong>
            @switch($user->role)
                @case('patient')
                    Пациент
                    @break
                @case('doctor')
                    Доктор
                    @break
                @case('admin')
                    Администратор
                    @break
                @default
                    Пользователь
            @endswitch
        </p>
    </div>
</div>
@endsection
