@extends('layouts.app')

@section('content')
    <img width="75" height="75" src="{{ $album->cover_image_url }}" class="img-fluid" alt="{{ $album->album_name }}">
    <h1>{{ $album->album_name }}</h1>
    <p>Исполнитель: {{ $album->performer }}</p>
    <p>Год выпуска: {{ $album->year_of_release }}</p>
    <p>Описание: {{ $album->description }}</p>    
   

    <a href="{{ route('albums.edit', $album) }}">Редактировать</a>

    <form action="{{ route('albums.destroy', $album) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>

    <a href="{{ route('albums.index') }}">Назад к списку альбомов</a>
    <br>
    <a href="{{ route('albums.tracks.index', $album) }}">Список треков</a>
@endsection
