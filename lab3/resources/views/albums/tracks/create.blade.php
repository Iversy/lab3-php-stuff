@extends('layouts.app')

@section('content')
    <h1>Создать новый трек для альбома: {{ $album->album_name }}</h1>

    <form action="{{ route('albums.tracks.store', $album) }}" method="POST">
        @csrf
        <div>
            <label for="name">Название трека:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="length">Длина трека:</label>
            <input type="text" name="length" id="length" required>
        </div>
        <button type="submit">Создать трек</button>
    </form>
    <a href="{{ route('albums.tracks.index', $album) }}">Назад к списку треков</a>
@endsection
