<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Employee;
use App\Http\Requests\EmployeesRequest;

class EmployeesController extends Controller {


    public function __construct() {
        $this->middleware(['auth', 'applyLocale']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $employees = DB::table('employees')
            ->leftjoin('companies', 'employees.comp_id', '=', 'companies.id')
            ->select('employees.*', 'companies.name')
            ->paginate(10);

        return view('employees.empRead', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $companies = DB::table('companies')->select('id', 'name')->orderBy('name')->get();
        
        return view('employees.empCreate', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request) {

        $employee = $request->except('action');

        if( $employee['comp_id'] == "0") $employee['comp_id'] = null;  
        
        Employee::create($employee);

        return redirect()->action('EmployeesController@index')->withInput();
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

        $employee = Employee::find($id);

        if($employee == null) return redirect()->back();

        $companies = DB::table('companies')->select('id', 'name')->orderBy('name')->get();
        
        return view('employees.empUpdate', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $employee = Employee::find($id);
        $params = $request->except('action');
        
        if( $params['comp_id'] == "0") $params['comp_id'] = null;
        
        $employee->update($params);

        return redirect()->action('EmployeesController@index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->action('EmployeesController@index');
    }
}
