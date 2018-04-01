@extends('layouts.layout')

{{-- @section('title', 'Update employee') --}}
@section('content')

    <div class="container">
        <div class="card mx-auto border border-dark">
            <div class="card-header bg-info text-white"><strong>Update Employee</strong></div>
            <div class="card-body">
                <form action="/employees/u/{{ $employee->id }}/edit" method="post">
                    {{ method_field('put') }}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control"/>

                    <input type="hidden" name="action" value="updated" class="form-control"/>
                
                    <div class="form-group">
                        <label class="required"><b>First name</b></label>
                        <input class="form-control" name="first_name" type="text" value="{{ $employee->first_name }}" />                
                            @if( $errors->get('first_name') )
                                <div class="alert alert-danger mt-1">                                    
                                    @foreach($errors->get('first_name') as $err)
                                        {{ $err }}</br>                                        
                                    @endforeach                                    
                                </div>          
                            @endif                        
                    </div>

                    <div class="form-group">
                        <label class="required"><b>Last name</b></label>
                        <input class="form-control" name="last_name" type="text" value="{{ $employee->last_name }}"/>                    
                            @if( $errors->get('last_name') )
                                <div class="alert alert-danger mt-1">
                                    @foreach($errors->get('last_name') as $err)
                                        {{ $err }}</br>                                        
                                    @endforeach
                                </div>          
                            @endif                        
                    </div>

                    <div class="form-group">
                        <label><b>Email</b></label>
                        <input class="form-control" name="email" type="email" value="{{ $employee->email }}"/>
                    </div>

                    <div class="form-group">
                        <label><b>Phone</b></label>
                        <input class="form-control" name="phone" type="text" value="{{ $employee->phone }}"/>
                    </div>
                    
                    <div class="form-group">
                        <label><b>Company</b></label></br>
                        <select name="comp_id" class="custom-select col-6">
                            <option value="0">Choose a company</option>
                            @foreach($companies as $comp)
                                <option value="{{ $comp->id }}"
                                        @if( isset($employee) && $comp->id == $employee->comp_id )
                                            selected 
                                        @endif
                                    >{{ $comp->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group mt-4">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>            
            </div>            
        </div>        
    </div>

@stop

@push('main')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endpush