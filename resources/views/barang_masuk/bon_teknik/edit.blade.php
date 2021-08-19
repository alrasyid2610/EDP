@extends('layouts.main')
@section('content')


{{-- @if (Session::has('message'))
    <h1>{{ Session::get('message') }}</h1>
@endif --}}

@if(Session::has('message'))
  <div class="modal" tabindex="-1" role="dialog" id="modalPesanEdit" data-show='true'>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>{{ Session::get('message') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endif
  
  <div class="row">
    <x-breadcrumb2></x-breadcrumb2>
      <div class="col-md-12 col-sm-12" id="wizard-input">
        <div class="x_panel test">
          <div class="x_title">
            <h2>Form Input <small>Enter Technical Document Data</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown" id="dropdown1">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    {{-- <a class="dropdown-item" href="/goods_come/technical_documents/create?d=4c1a69dd6d993dbe6ce16bc2408311f5">Condition 1</a> --}}
                    <a class="dropdown-item" href="{{ route('technical_documents.create') }}">Condition 1</a>
                  </li>
                  <li>
                    {{-- <a class="dropdown-item" href="/goods_come/technical_documents/create?d=1f95fe52c64a05b5ecc462b355f6d358">Condition 2</a> --}}
                    <a class="dropdown-item" href="{{ route('technical_documents.create', ['d' => '1f95fe52c64a05b5ecc462b355f6d358']) }}">Condition 2</a>
                  </li>
                </ul>
              </li>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
              <form class="form-horizontal" action="{{ route('technical_documents.update', $data->id) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="route" value="{{ url()->previous() }}">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="row">
                  <div class="col-12"> {{-- <h5 class="m-0 mb-2 font-italic font-weight-bold">Shipping Documents Data</h5> --}}
                    @if(Session::has('success')) 
                        <div class="alert alert-success"> {{ Session::get('success') }} 
                          @php
                            Session::forget('success'); 
                          @endphp 
                      </div> 
                    @endif 
                  </div>
                </div>
                

                <div class="form-row mb-4">
                  <div class="col-lg-6 mb-3">
                      <label for="no_document">No Document Technical</label>
                      <input type="text" class="form-control" id="no_document" placeholder="No Document Technical" name="no_document" required=""
                            value="{{ old('no_document', $data->no_document) }}">
                      @if ($errors->has('no_document'))
                          <span class="text-danger">{{ $errors->first('no_document') }}</span>
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                      <label for="create_date">Create Date</label>
                      <input type="date" class="form-control" id="create_date" placeholder="Create Date" name="create_date"
                            required="" value="{{ old('create_date', $data->create_date) }}">
                  </div>

                  <div class="col-lg-6 mb-3">
                      <label for="user">User</label>
                      <input type="text" class="form-control" id="user" placeholder="User" name="user" required=""
                            value="{{ old('user', $data->user) }}">
                      @if ($errors->has('user'))
                          <span class="text-danger">{{ $errors->first('user') }}</span>
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    {{-- <h2>{{ old('departement', '') }}</h2> --}}
                      <label for="no_bon">Choese Section</label>
                      <select class="form-control read-only" id="section"
                        name="departement">
                        <option value="">-- Choese --</option>
                        @if(isset($data_section))
                          <optgroup label="Pulogadung">
                            @foreach ( $data_section as $value)
                              <option value="{{ $value->section_name }} | {{ $value->section_name_as }}" {{ old('departement', $data->departement) == "$value->section_name" . ' | ' . "$value->section_name_as" ? 'selected' : '' }}>{{ $value->section_name }}</option>
                            @endforeach
                          </optgroup>
                          @else
                              <option value="{{ old('section') }}" selected>{{ old('section') }}</option>
                          @endif
                      </select>
                  </div>

                  <div class="col-md-12 mb-3">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="description" placeholder="Description" name="description"
                            required="" value="{{ old('description', $data->description) }}">
                      @if ($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description') }}</span>
                      @endif
                  </div>

                  <div class="col-md-12 mb-3">
                      <label for="recived_date">Recived Date</label>
                      <input type="date" class="form-control" id="recived_date" placeholder="Tanggal Buat Bon"
                            name="recived_date" required="" value="{{ old('recived_date', $data->recived_date) }}">
                  </div>

                  <div class="col-md-12 mb-3">
                      <label for="document_recipient">Document Recipient</label>
                      <input type="text" class="form-control" id="document_recipient" placeholder="Penerima Bon" name="document_recipient"
                            required="" value="{{ old('document_recipient', $data->document_recipient) }}">
                      @if ($errors->has('document_recipient'))
                          <span class="text-danger">{{ $errors->first('document_recipient') }}</span>
                      @endif
                  </div>

                  {{-- <div class="col-md-12 mb-3">
                      <label for="pelaksana">Pelaksana</label>
                      <input type="text" class="form-control" id="pelaksana" placeholder="Pelaksana" name="pelaksana" required=""
                            value="{{ old('pelaksana') ?? '' }}">
                      @if ($errors->has('pelaksana'))
                          <span class="text-danger">{{ $errors->first('pelaksana') }}</span>
                      @endif
                  </div> --}}

                  <div class="col-md-12 mb-3">
                      <label for="executor">Pelaksana</label>
                      <input type="text" class="form-control" id="executor" placeholder="Pelaksana" name="executor"
                            required="" value="{{ old('executor', $data->executor) }}">
                      @if ($errors->has('executor'))
                          <span class="text-danger">{{ $errors->first('executor') }}</span>
                      @endif
                  </div>
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
  </div>
@endsection

@section('script')
   <script>
    $('document').ready(function() { 
      $('#modalPesanEdit').modal('show') 
    });
   </script>
@endsection

