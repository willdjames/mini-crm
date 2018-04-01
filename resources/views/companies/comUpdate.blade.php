@extends('layouts.layout')

{{-- @section('title', 'Update company') --}}
@section('content')

    <div class="container">
        <div class="card mx-auto border border-dark">
            <div class="card-header bg-info text-white"><strong>{{ __('comUpdate.upCom') }}</strong></div>
            <div class="card-body">
                <form action="/companies/u/{{$company->id}}/edit" method="post" enctype="multipart/form-data">
                    {{ method_field('put') }}

                    <input class="form-control"     name="_token"  value="{{ csrf_token() }}"                         type="hidden"/>

                    <input class="form-control"     name="action"  value="updated"                                    type="hidden" />
                
                    <div class="form-group">
                        <label class="required"><b>{{ __('comCreate.Name') }}</b></label>
                        <input class="form-control" name="name"    value="{{$company->name or old('name')}}"          type="text"/>
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
                        <input class="form-control" name="email"   value="{{$company->email or old('email')}}"        type="email"/>
                    </div>
                    <div class="form-group">
                        <label><b>{{ __('comCreate.website') }}</b></label>
                        <input class="form-control" name="website"    value="{{$company->website or old('website')}}" type="text"/>
                    </div>
                    <div class="custom-file">
                        <label for="logo"><b>{{ __('comCreate.logo') }}</b></label>
                        <input class="form-control-file" name="logo" id="logo" type="file"/>
                    </div>
                    <div class="form-group mt-4">
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