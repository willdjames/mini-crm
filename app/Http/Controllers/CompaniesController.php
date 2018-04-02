<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\CompaniesRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller {


    public function __construct() {
        $this->middleware(['auth', 'applyLocale']); // Middleware 'applyLocale' para traduzir antes de renderizar a pagina
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $companies = Company::paginate(10);
    
        return view('companies.comRead', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('companies.comCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesRequest $request) {
                
        $params = $request->except('action');
       
        if( $request->file('logo') ){ // Se falso, esta propriendade persiste NULL, se verdadeiro, presiste o path
            $params['logo'] = Storage::putFile('public', $request->file('logo')); // save and return the path
        }
        
        Company::create($params);

        return redirect('/companies')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $company = Company::find($id);
        
        if($company == null) { // Para que não retorne no final erro 500 - (digitando um ID invalido na URI) -, caso seja NULL.
            return redirect()->back();
        }
        
        
        return view('companies.comUpdate', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompaniesRequest $request, $id) {

        $company = Company::find($id); // find register's company
        $params  = $request->except('action'); // receive the paramiter's form
        Storage::delete($company->logo); // delete the old image

        if($request->file('logo')){
            $params['logo'] = Storage::putFile('public', $request->file('logo')); // save and return the path    
        }else {
            $params['logo'] = null;
        }       
        
        $company->update($params);

        return redirect('/companies')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        $company = Company::find($id);
        Storage::delete($company->logo);
        $company->delete();

        return redirect()->action('CompaniesController@index');
    }
}
