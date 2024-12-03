<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    
    public function create()
    {
        return view('albums.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'performer' => 'required|string|max:255',
            'album_name' => 'required|string|max:255',
            'cover_image_url' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'year_of_release' => 'required|integer',
        ]);

        Album::create($request->all());
        return redirect()->route('albums.index')->with('success', 'Альбом успешно создан.');
    }

    
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'performer' => 'required|string|max:255',
            'album_name' => 'required|string|max:255',
            'cover_image_url' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'year_of_release' => 'required|integer',
        ]);

        $album->update($request->all());
        return redirect()->route('albums.index')->with('success', 'Альбом успешно обновлен.');
    }

    
    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }


    
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Альбом успешно удален.');
    }
}
