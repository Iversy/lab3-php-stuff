<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $albums = Album::all(); 
        return view('home', compact('albums')); 
    }
}
