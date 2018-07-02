<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function index()
    {
      $albums = Album::with('photos')->get();
    	return view('albums.index', compact('albums'));
    }

    public function create()
    {
    	return view('albums.create');
    }

    public function store(Request $request)
    {
    	$request->validate([
            'name'          => 'required',
            'cover_image'   => 'image|max:1999'
        ]);

       // Get filename with extension
       $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

       // get just the filename
       $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

       // Get the Extension
       $extension = $request->file('cover_image')->getClientOriginalExtension();

       // Create new Filename
       $filenameToStore = $filename . '_' . time() . '.' . $extension;

       // Upload the Image
       $path = $request->file('cover_image')->storeAs('public/album_cover', $filenameToStore);

       // save the data into the database
       $album = new Album;
       $album->name         = $request->input('name');
       $album->description  = $request->input('description');
       $album->cover_image  = $filenameToStore;

       $album->save();

       return redirect('/')->with('success', 'Album Created!');
       //TODO: php artisan storage:link

    }
    public function show($id)
    {
      $album = Album::with('photos')->find($id);
      return view('albums.show', compact('album'));
    }
}
