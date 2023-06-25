@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Новости</h1>

        @foreach($news as $article)
            <div class="card mb-3">
                <div class="card-header">
                    <h5>{{ $article['title'] }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ $article['description'] }}</p>
                    <a href="{{ $article['url'] }}" target="_blank" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
