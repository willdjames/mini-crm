@extends('layouts.layout')

{{-- @section('title', 'New companies') --}}
@section('content')

    <div class="container">
        <div class="card mx-auto border border-dark">
            <div class="card-header bg-info text-white"><strong>{{ __('layout.newCompany') }}</strong></div>
            <div class="card-body">
                <form action="/companies/c" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control"/>

                    <input type="hidden" name="action" value="added" class="form-control"/>
                
                    <div class="form-group">
                        <label class="required"><b>{{ __('comCreate.Name') }}</b></label>                        
                        <input class="form-control" name="name" type="text"/>                        
                            @if( $errors->get('name') )
                                <div class="alert alert-danger mt-1">    
                                    @foreach($errors->get('name') as $err)
                                        {{ $err }}</br>
                                    @endforeach                                    
                                </div>          
                            @endif                        
                    </div>
                    
                    <div class="form-group">
                        <label><b>{{ __('comCreate.email') }}</b></label>
                        <input class="form-control" name="email" type="email" value="{{ old('email') }}" />
                    </div>
                    
                    <div class="form-group">
                        <label><b>{{ __('comCreate.website') }}</b></label>
                        <input class="form-control" name="website" type="text" value="{{ old('website') }}"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="logo"><b>{{ __('comCreate.logo') }}</b></label>
                        <input class="form-control-file" name="logo" id="logo" type="file"/>
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