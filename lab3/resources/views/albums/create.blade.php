@extends('layouts.app')

@section('content')
    <h1>Создать новый альбом</h1>

    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div>
            <label for="performer">Исполнитель:</label>
            <input type="text" name="performer" id="performer" required>
        </div>
        <div>
            <label for="album_name">Название альбома:</label>
            <input type="text" name="album_name" id="album_name" required>
        </div>
        <div>
            <label for="cover_image_url">Ссылка на картинку:</label>
            <input type="text" name="cover_image_url" id="cover_image_url" nullable>
        </div>
        <div>
            <label for="description">Описание:</label>
            <input type="text" name="description" id="description" nullable>
        </div>
        <div>
            <label for="year_of_release">Год выпуска:</label>
            <input type="number" name="year_of_release" id="year_of_release" required>
        </div>
        <button type="submit">Создать альбом</button>
    </form>
@endsection
