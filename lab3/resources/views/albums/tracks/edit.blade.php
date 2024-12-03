@extends('layouts.app')

@section('content')
    <h1>Редактировать трек: {{ $track->name }}</h1>

    <form action="{{ route('albums.tracks.update', [$album, $track]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Название трека:</label>
            <input type="text" name="name" id="name" value="{{ $track->name }}" required>
        </div>
        <div>
            <label for="length">Длина трека:</label>
            <input type="text" name="length" id="length" value="{{ $track->length }}" required>
        </div>
        <button type="submit">Обновить трек</button>
    </form>
    <a href="{{ route('albums.tracks.index', $album) }}">Назад к списку треков</a>
@endsection
