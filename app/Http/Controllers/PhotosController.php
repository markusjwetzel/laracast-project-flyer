<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use App\AddPhotoToFlyer;
use App\Http\Requests\AddPhotoRequest;

class PhotosController extends Controller
{

    /**
     * Apply a photo to the referenced flyer.
     * @param string  $zip
     * @param string  $street
     * @param AddPhotoRequest $request
     */
    public function store($zip, $street, AddPhotoRequest $request)
    {
        $flyer = Flyer::locatedAt( $zip, $street );
        $photo = $request->file('photo');

        ( new AddPhotoToFlyer($flyer, $photo) )->save();
    }

    /**
     * Removes the photo from the database.
     * @param  integer $id
     * @return Responce
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id)->delete();
        return back();
    }
}
