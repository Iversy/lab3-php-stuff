<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Album;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index(Album $album)
    {
        $tracks = $album->tracks;
        return view('albums.tracks.index', compact('tracks', 'album'));
    }

    public function create(Album $album)
    {
        return view('albums.tracks.create', compact('album'));
    }

    public function store(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'length' => 'required|string|max:10',
        ]);

        $album->tracks()->create($request->all());
        return redirect()->route('albums.tracks.index', $album)->with('success', 'Трек успешно создан.');
    }

    public function edit(Album $album, Track $track)
    {
        return view('albums.tracks.edit', compact('album', 'track'));
    }

    public function update(Request $request, Album $album, Track $track)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'length' => 'required|string|max:10',
        ]);

        $track->update($request->all());
        return redirect()->route('albums.tracks.index', $album)->with('success', 'Трек успешно обновлен.');
    }

    
    public function show(Album $album, Track $track)
    {
        return view('albums.tracks.show', compact('album', 'track'));
    }

    public function destroy(Album $album, Track $track)
    {
        $track->delete();
        return redirect()->route('albums.tracks.index', $album)->with('success', 'Трек успешно удален.');
    }
}
