@extends('layouts.layout')

{{-- @section('title', 'New employee') --}}
@section('content')

    <div class="container">
        <div class="card mx-auto border border-dark">
            <div class="card-header bg-info text-white"><strong>{{ __('layout.newEmployee') }}</strong></div>
            <div class="card-body">
                <form action="/employees/c" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control"/>

                    <input type="hidden" name="action" value="added" class="form-control"/>
                
                    <div class="form-group">
                        <label class="required"><b>{{ __('empCreate.fName') }}</b></label>
                        <input class="form-control" name="first_name" type="text"/>                        
                            @if( $errors->get('first_name') )
                                <div class="alert alert-danger mt-1">                                    
                                    @foreach($errors->get('first_name') as $err)
                                        {{ $err }}</br>                                        
                                    @endforeach                                    
                                </div>          
                            @endif                        
                    </div>

                    <div class="form-group">
                        <label class="required"><b>{{ __('empCreate.lName') }}</b></label>
                        <input class="form-control" name="last_name" type="text"/>                        
                            @if( $errors->get('last_name') )
                                <div class="alert alert-danger mt-1">
                                    @foreach($errors->get('last_name') as $err)
                                        {{ $err }}</br>                                        
                                    @endforeach
                                </div>          
                            @endif                        
                    </div>

                    <div class="form-group">
                        <label><b>{{  __('comCreate.email') }}</b></label>
                        <input class="form-control" name="email" type="email" value="{{ old('email') }}"/>
                    </div>

                    <div class="form-group">
                        <label><b>{{ __('empCreate.phone') }}</b></label>
                        <input class="form-control" name="phone" type="text" value="{{ old('phone') }}"/>
                    </div>
                    
                    <div class="form-group">
                        <label><b>{{ __('comRead.Company') }}</b></label></br>
                        <select name="comp_id" class="custom-select col-md-6">
                            <option value="0">{{ __('empCreate.chComp') }}</option> 
                            @foreach($companies as $comp)
                                <option value="{{ $comp->id }}">{{ $comp->name }}</option>
                            @endforeach
                        </select>
                        <a href="/companies/c" class="col-md-6" target="_blank">{{ __('empCreate.question') }}</a>
                    </div>
                    
                    <div class="form-group">                        
                        <button class="btn btn-success">{{ __('comCreate.submit') }}</button>                        
                    </div>
                </form>            
            </div>            
        </div>        
    </div>

@stop

@push('main')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endpush