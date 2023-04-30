@extends('layouts.app')
@section('content')

    <div>
        <div>{{$user->id}}.{{$user->name}}</div>
        <div>{{$user->email}}</div>
        <div>{{$user->role}}</div>
    </div>
    <div>
        <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary mt-3">Изменить</a>
    </div>
    <div>
        <a href="{{route('admin.user.index')}}" class="btn btn-primary mt-3">Назад</a>
    </div>
@endsection
