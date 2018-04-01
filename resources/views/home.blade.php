@extends('layouts.layout')

@section('content')

	<div class="container  mx-auto">
		<h1>{{ __('home.crambs') }}</h1>
		<div class="card-deck">
			<ul class="list-inline mx-auto mt-3">
				<li class="list-inline-item" style="width: 18rem">
					<div class="card text-white bg-success" style="max-width: 18rem;">
					  <div class="card-header text-center">{{ __('home.totalCom') }}</div>
					  <div class="card-body text-center">
					    <h1 class="card-title">{{ $allCompany }}</h1>			    
					  </div>
					  <div class="card-footer text-right">
					  	<a href="{{ action('CompaniesController@index') }}" class="text-white">{{ __('home.View') }} <span class="fas fa-arrow-right"></span></a> 
					  </div>
					</div>
				</li>

				<li class="list-inline-item" style="width: 18rem">
					<div class="card text-white bg-info" style="max-width: 18rem;">
					  <div class="card-header text-center">{{ __('home.totalEmp') }}</div>
					  <div class="card-body">
					    <h1 class="card-title text-center">{{ $allEmployee }}</h1>			    
					  </div>
					  <div class="card-footer text-right">
					  	<a href="{{ action('EmployeesController@index') }}" class="text-white">{{ __('home.View') }} <span class="fas fa-arrow-right"></span></a> 
					  </div>
					</div>
				</li>
			</ul>		
		</div>
	</div>
    

@endsection