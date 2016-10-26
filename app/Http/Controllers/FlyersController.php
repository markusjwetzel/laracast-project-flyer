<?php

namespace App\Http\Controllers;

use Auth;
use App\Flyer;
use App\Http\Requests\FlyerRequest;

class FlyersController extends Controller
{

    /**
     * Must be logged in to view all routes except show.
     */
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
        $flyer = Auth::user()->publish(
            new Flyer( $request->all() )
        );

    	flash()->success('Success!', 'Your flyer has been created.');

    	return redirect( flyer_path( $flyer ) );
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
}
