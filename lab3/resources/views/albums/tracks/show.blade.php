@extends('layouts.app')

@section('content')
    <h1>{{ $track->name }}</h1>
    <p>Длина: {{ $track->length }}</p>

    <a href="{{ route('albums.tracks.edit', [$album, $track]) }}">Редактировать</a>

    <form action="{{ route('albums.tracks.destroy', [$album, $track]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>

    <a href="{{ route('albums.tracks.index', $album) }}">Назад к списку треков</a>
@endsection
