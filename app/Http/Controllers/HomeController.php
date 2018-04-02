<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
use App;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware(['auth', 'applyLocale']);  // Middleware 'applyLocale' para traduzir antes de renderizar a pagina
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $allCompany  = Company::count(); // Valor exibido no card da home page
        $allEmployee = Employee::count(); // Valor exibido no card da home page
        
        return view('home', compact('allCompany', 'allEmployee'));
    }
}
