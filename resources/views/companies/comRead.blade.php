@extends('layouts.layout')

{{-- scripts for dataTables --}}
@push('dataTables.net')
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"          rel="stylesheet" >
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"     type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
@endpush

@section('content')

    <div class="container">
        <h1>{{ __('layout.allCompanies') }}</h1>

        @if( old('name') && (old('action') == 'added') ) 
            <div class="alert alert-success">
                <strong>{{ __('comRead.success') }}!</strong> {{ __('layout.newCompany') }}  '{{ old('name') }}' {{ old('action') }}.
            </div>
        @elseif( old('name') && (old('action') == 'updated') )
            <div class="alert alert-success">
                <strong>{{ __('comRead.success') }}!</strong> {{ __('comRead.Company') }} '{{ old('name') }}' {{ old('action') }}.
            </div>
        @endif        
        
        <table class="table table-striped" id="comTable" name="comTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('comCreate.Name') }}</th>
                    <th>{{ __('comCreate.email') }}</th>
                    <th>{{ __('comCreate.website') }}</th>
                    <th>{{ __('comRead.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $com)
                    <tr>
                        <td>{{ $com->id }}</td>
                        <td>{{ $com->name }}</td>
                        <td>{{ $com->email or '-' }}</td>
                        <td><a href="{{ $com->website or '#' }}" target="_blank" >{{ $com->website or '-' }}</a></td>
                        <td>
                            <ul class="listColumnActions">
                                <li class="listItemColumnActions">
                                    <a href="/companies/u/{{ $com->id }}/edit" title="{{ __('comRead.update') }}">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                </li>

                                <li class="listItemColumnActions">
                                    <a href="#" id="{{$com->id}}" title="{{ __('comRead.details') }}" class="detail" onclick="showModalComRead({{$com->id}});"     data-name="{{ $com->name }}"
                                         data-email="{{ $com->email }}"
                                         data-website="{{ $com->website }}"
                                         @if(!$com->logo)
                                            data-logo="{{ Storage::url($com->logo) }}no_image.jpg" 
                                         @endif

                                         data-logo="{{ Storage::url($com->logo) }}" >
                                    <span class="fas fa-eye"></span>
                                </a>   
                                </li>
                                
                                <li class="listItemColumnActions">
                                    <a href="/companies/d/{{ $com->id }}" title="{{ __('comRead.delete') }}">
                                    <span class="fas fa-trash"></span>
                                </a>   
                                </li>                                
                            </ul> 
                        </td>
                    </tr>
                @endforeach
            </tbody>        
        </table>

        {{ $companies->links() }}

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
              </div>
              <div class="modal-body">
                <div class="sizeIamge float-left mr-3">
                    <img id="logo" src="" class="rounded-circle border" />
                </div>
                <div>
                    <div id="email"></div>
                    <div id="website"></div>
                </div>                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('comRead.close') }}</button>
              </div>
            </div>
          </div>
        </div>
    
    </div>
    
@stop