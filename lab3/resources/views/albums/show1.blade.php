@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $album->album_name }}</h1>
    <p>Исполнитель: {{ $album->performer }}</p>
    <p>Год выпуска: {{ $album->year_of_release }}</p>

    <h2>Треки</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Длительность</th>
            </tr>
        </thead>
        <tbody>
            @foreach($album->tracks as $track)
            <tr>
                <td>{{ $track->name }}</td>
                <td>{{ $track->length }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('albums.index') }}" class="btn btn-secondary">Назад к списку альбомов</a>
</div>
@endsection
