<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests\AddPhotoRequest;
use App\Http\Requests\FlyerRequest;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware( 'auth', [ 'except' => ['show'] ] );
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Responce
     */
    public function create()
    {
    	return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  FlyerRequest $request
     * @return Responce
     */
    public function store(FlyerRequest $request)
    {
    	Flyer::create( $request->all() );

    	flash()->success('Success!', 'Your flyer has been created.');

    	return redirect()->back();
    }

    /**
     * Display the specified resource.
     * @param  string $zip
     * @param  string $street
     * @return Responce
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip,$street);
        
        return view('flyers.show', compact('flyer') );
    }

    /**
     * Apply a photo to the referenced flyer.
     * @param string  $zip
     * @param string  $street
     * @param AddPhotoRequest $request
     */
    public function addPhoto($zip, $street, AddPhotoRequest $request)
    {
        $photo = Photo::fromFile( $request->file('photo') );

        Flyer::locatedAt( $zip, $street )->addPhoto( $photo );
    }

    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named( $file->getClientOriginalName() )
            ->move( $file );
    }
}
