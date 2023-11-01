<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Gallery;
use App\Models\PhotoshootType;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        $photoshootTypes = PhotoshootType::all();
        $images = Gallery::all();
        $albums = Album::all();

        return view('clients.gallery', compact('images', 'photoshootTypes', 'albums'));
    }


    public function showAlbumImages($id)
    {
        $album = Album::findOrFail($id); 
        
        $images = $album->images;

        return view('clients.images', compact('images', 'album'));
    }
}
