<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Gallery;
use App\Models\PhotoshootType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function adminGallery()
    {
        $albums = Album::with('photoshootType')->get();
        $photoshootTypes = PhotoshootType::all();

        return view('admin.admin-gallery', compact('albums', 'photoshootTypes'));
    }

    public function showAlbumPhotos($id)
    {
        $album = Album::findOrFail($id);
        $images = $album->images;

        return view('admin.album-photos', compact('images', 'album'));
    }
    public function storePhotos(Request $request)
    {
        $albumId = $request->input('album_id');
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('images/photoshoots', 'public');


                $filename = basename($path);

                $image = new Gallery();
                $image->image_path = $filename;
                $image->albumID = $albumId;
                $image->save();
            }
        }


        return redirect()->back()->with('success', 'Photos uploaded successfully');
    }
    public function updateAlbum(Request $request)
    {
        $albumId = $request->input('album_id');
        $album = Album::findOrFail($albumId);

        $album->album_name = $request->input('album_name');
        $album->typeID = $request->input('album_type');

        $album->save();

        return redirect()->back()->with('success', 'Album updated successfully');
    }
    public function deleteAlbum($id)
    {
        $album = Album::findOrFail($id);


        $images = $album->images;
        foreach ($images as $image) {
            Storage::delete('public/images/photoshoots/' . $image->image_path);
            $image->delete();
        }


        $album->delete();

        return response()->json(['success' => true]);
    }
    public function storeAlbum(Request $request)
    {

        $request->validate([
            'album_name' => 'required|string|max:255',
            'album_type' => 'required|exists:photoshoot_types,id',
        ]);


        $album = new Album();
        $album->album_name = $request->input('album_name');
        $album->typeID = $request->input('album_type');
        $album->save();

        return redirect()->back()->with('success', 'Album created successfully');
    }
    public function deleteImage($id)
    {
        $image = Gallery::findOrFail($id);

        // Delete the image file from storage
        Storage::delete('public/images/photoshoots/' . $image->image_path);

        // Delete the image record from the database
        $image->delete();

        return response()->json(['success' => true]);
    }
}
