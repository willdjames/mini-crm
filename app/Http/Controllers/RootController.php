<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller {


	public function __construct() {
		$this->middleware('auth');
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return redirect()->action('HomeController@index');
    }

}
