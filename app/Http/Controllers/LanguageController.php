<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller {
    
    public function chooser($lang) {

    	Session::put('locale', $lang); // Salva o idioma na sessão
    	
    	return redirect()->back();
    }
}
