<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
	/**
	 * Display the Home page.
	 * @return Responce
	 */
    public function home()
    {
    	return view('pages.home');
    }
}
