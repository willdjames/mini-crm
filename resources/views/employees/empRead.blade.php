@extends('layouts.layout')


@push('dataTables.net')
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"          rel="stylesheet" >
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"     type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
@endpush

@section('content')

    <div class="container">
        <h1>{{ __('layout.allEmployees') }}</h1>

        @if( old('first_name') && (old('action') == 'added') ) 
            <div class="alert alert-success">
                <strong>{{ __('comRead.success') }}!</strong> {{ __('layout.newEmployee') }} '{{ old('first_name') }}' {{ old('action') }}.
            </div>
        @elseif( old('first_name') && (old('action') == 'updated') )
            <div class="alert alert-success">
                <strong>{{ __('comRead.success') }}!</strong> {{ __('layout.Employee') }} '{{ old('first_name') }}' {{ old('action') }}.
            </div>
        @endif        
        
        <table class="table table-striped" id="empTable" name="empTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('comCreate.Name') }}</th>
                    <th>{{ __('comCreate.email') }}</th>
                    <th>{{ __('empCreate.phone') }}</th>
                    <th>{{ __('comRead.Company') }}</th>
                    <th>{{ __('comRead.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $emp)
                    <tr>
                        <td>{{ $emp->id }}</td>
                        <td>{{ $emp->first_name }} {{ $emp->last_name }}</td>
                        <td>{{ $emp->email or '-' }}</td>
                        <td>{{ $emp->phone or '-' }}</td>
                        <td>{{ $emp->name or '-' }}</td>
                        <td>
                            <ul class="listColumnActions">
                                <li class="listItemColumnActions">
                                    <a href="/employees/u/{{$emp->id}}/edit" title="{{ __('comRead.update') }}">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                </li>
                                <li class="listItemColumnActions">
                                    <a href="/employees/d/{{ $emp->id }}" title="{{ __('comRead.delete') }}">
                                    <span class="fas fa-trash"></span>
                                </a>   
                                </li>                                
                            </ul>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>        
        </table>

        {{ $employees->links() }}
    
    </div>

@stop