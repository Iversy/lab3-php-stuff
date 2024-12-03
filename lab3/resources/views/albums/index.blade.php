@extends('layouts.app')

@section('content')
    <h1>Список альбомов</h1>
    <a href="{{ route('albums.create') }}">Создать новый альбом</a>
    <ul>
        @foreach ($albums as $album)
            <li>
                <img width="75" height="75" src="{{ $album->cover_image_url }}" class="img-fluid" alt="{{ $album->album_name }}">
                <a href="{{ route('albums.show', $album) }}">{{ $album->album_name }}</a>
                <a href="{{ route('albums.edit', $album) }}">Редактировать</a>
                <form action="{{ route('albums.destroy', $album) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('home') }}">Назад</a>

@endsection
