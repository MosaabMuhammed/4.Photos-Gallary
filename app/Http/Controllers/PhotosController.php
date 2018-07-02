<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
	public function show($id)
	{
		$photo = Photo::find($id);
		return view('photos.show', compact('photo'));
	}
	public function create($album_id)
	{
		return view('photos.create', compact('album_id'));
	}

	public function store(Request $request)
	{
		$photo = $request->validate([
			'title'			=> 'required',
			'description'	=>	'required|min:2',
			'photo'			=>	'image|max:1999',
		]);

		// Get filename with extension
		$filenameWithExt = $request->file('photo')->getClientOriginalName();

		// get just the filename
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

		// Get the Extension
		$extension = $request->file('photo')->getClientOriginalExtension();

		// Create new Filename
		$filenameToStore = $filename . '_' . time() . '.' . $extension;

		// Upload the Image
		$path = $request->file('photo')->storeAs('public/photos' . $request->input(''), $filenameToStore);

		$photo = new Photo;
		$photo->title 		= $request->input('title');
		$photo->photo 		= $filenameToStore;
		$photo->size 		= $request->file('photo')->getClientSize();
		$photo->description = $request->input('description');
		$photo->album_id	= $request->input('album_id');

		$photo->save();

		return redirect('/albums/'.$photo->album_id)->with('success', 'Photo Uploaded Successfully!');
		//TODO: php artisan storage:link

	}
	public function destroy($id)
	{
		$photo = Photo::find($id);
		if(Storage::delete('public/photos/' . $photo->photo))
		{
			$photo->delete();

			return redirect('/')->with('success', 'Photo Deleted');
		}
	}
}
