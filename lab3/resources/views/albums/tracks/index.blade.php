@extends('layouts.app')

@section('content')
    <img width="150" height="150" src="{{ $album->cover_image_url }}" class="img-fluid" alt="{{ $album->album_name }}">
    <h1>Список треков для альбома: {{ $album->album_name }}</h1>
    <a href="{{ route('albums.tracks.create', $album) }}">Создать новый трек</a>
    <ul>
        @foreach ($tracks as $track)
            <li>
                <a href="{{ route('albums.tracks.show', [$album, $track]) }}">{{ $track->name }}</a>
                <a href="{{ route('albums.tracks.edit', [$album, $track]) }}">Редактировать</a>
                <form action="{{ route('albums.tracks.destroy', [$album, $track]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('albums.index') }}">Назад к списку альбомов</a>
@endsection