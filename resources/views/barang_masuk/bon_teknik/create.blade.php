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
              <form class="form-horizontal" action="{{ route('technical_documents.store2') }}" method="POST">
                @csrf
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
                            value="{{ old('no_document') ?? '' }}">
                      @if ($errors->has('no_document'))
                          <span class="text-danger">{{ $errors->first('no_document') }}</span>
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                      <label for="create_date">Create Date</label>
                      <input type="date" class="form-control" id="create_date" placeholder="Create Date" name="create_date"
                            required="" value="{{ old('create_date', '') }}">
                  </div>

                  <div class="col-lg-6 mb-3">
                      <label for="user">User</label>
                      <input type="text" class="form-control" id="user" placeholder="User" name="user" required=""
                            value="{{ old('user') ?? '' }}">
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
                            @foreach ( $data_section['data_section_plg'] as $value)
                              <option value="{{ $value->section_name }} | {{ $value->section_name_as }} | Pulogadung" {{ old('departement') == "$value->section_name" . ' | ' . "$value->section_name_as" ? 'selected' : '' }}>{{ $value->section_name }}</option>
                            @endforeach
                          </optgroup>
                          <optgroup label="Krawang">
                            @foreach ( $data_section['data_section_krw'] as $value)
                              <option value="{{ $value->section_name }} | {{ $value->section_name_as }} | Krawang" {{ old('departement') == "$value->section_name" . ' | ' . "$value->section_name_as" ? 'selected' : '' }}>{{ $value->section_name }}</option>
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
                            required="" value="{{ old('description') ?? '' }}">
                      @if ($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description') }}</span>
                      @endif
                  </div>

                  <div class="col-md-12 mb-3">
                      <label for="recived_date">Recived Date</label>
                      <input type="date" class="form-control" id="recived_date" placeholder="Tanggal Buat Bon"
                            name="recived_date" required="" value="{{ old('recived_date', '') }}">
                  </div>

                  <div class="col-md-12 mb-3">
                      <label for="document_recipient">Document Recipient</label>
                      <input type="text" class="form-control" id="document_recipient" placeholder="Penerima Bon" name="document_recipient"
                            required="" value="{{ old('document_recipient') ?? '' }}">
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

{{-- @section('technical_document_input_goods')
    <script>

        String.prototype.capitalize = function() {
          return this.charAt(0).toUpperCase() + this.slice(1)
        }

        function addReadOnly() {
          $('.form-horizontal input').attr('readonly', '')
        }

        $(document).ready(function() {
          addReadOnly();
        });
      
        /**
         * @description Fungsi ini digunakan ketika event select/change untuk element select digunakan
         * jika select condition terpenuhi maka jalankan printah anonimus function
        * @param element - element yang akan di kenakan event
         * @param anonymus function.
         */

        function addGoods() {
          let containerGoods = $(".container-goods");
          let jumlahGoods = $(".goods-item").length;
          $(`
            <div id="goods${jumlahGoods + 1}" class="mb-4 goods-item" style="border-bottom: 1px solid black;">
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <h6>Goods ${jumlahGoods + 1}</h6>
                  <div class="form-row container-input">
                    <div class="form-group col-3">
                      <label for="no_bon">Types of Goods</label>
                      <select class="form-control select-item" id="select-item${jumlahGoods + 1}" onchange="selectItem(this)">
                        <option value="">-- Choese --</option>
                        <optgroup label="Computer Components and Peripherals">
                          <option value="computer">Computer</option>
                          <option value="monitor">Monitor</option>
                          <option value="printer">Printer</option>
                          <option value="scanner">Scanner</option>
                          <option value="mouse">Mouse</option>
                          <option value="keyboard">Keyboard</option>
                          <option value="HDD">HDD</option>
                          <option value="Microsoft Office">Microsoft Office</option>
                          <option value="Operation System">Operation System</option>
                        </optgroup>
                        <optgroup label="Network Equipments">
                          <option value="HUB">HUB</option>
                          <option value="network_cable">Network Cable</option>
                          <option value="rj45_connector">RJ45 connector</option>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                  </div>
                </div>
              </div>
            </div>
          `).insertBefore('#next-btn');
          // console.log("safasfasf");

          enableNextBtn();
        }


        function removeGoods() {
          let containerGoods = $(".container-goods");
          let currentGoods = $(".goods-item").length - 1;
          
          $($(".goods-item")[currentGoods]).remove();
          if ( currentGoods == 0 ) {
            $('#next-btn button').prop('disabled', true);
            $('.form-horizontal input').attr('readonly', true);
            $('.x_panel.test').addClass('bg-secondary2');
          }
        }

        function selectItem(e) {
          var valueSelectGoods = $(e).val();
          var parentContainerInput = $(e).parent().parent();
          parentContainerInput.find('.form-computer').remove();
          parentContainerInput.find('.form-monitor').remove();
          parentContainerInput.find('.form-printer').remove();
          parentContainerInput.find('.form-scanner').remove();

          // enable next button
          
          if (valueSelectGoods == 'computer' || valueSelectGoods == 'monitor' || valueSelectGoods == 'scanner' || valueSelectGoods == 'printer') {
            parentContainerInput.find('.select-condition').remove();
            parentContainerInput.append(`
              <div class="form-group col-5 select-condition">
                <label for="no_bon">Select Conditions</label>
                <select class="form-control" onchange="selectCondition(this)">
                  <option value="">-- Choese --</option>
                  <option value="New">New Goods for User / Section</option>
                  <option value="Replacement">Replacement</option>
                </select>
              </div>
            `);
          }  else if (valueSelectGoods == '') {
            parentContainerInput.find('.select-condition').remove();
          } else {

            parentContainerInput.find('.select-condition').remove();
          }
          
          if (valueSelectGoods == 'mouse') {
            // this code
          } else if (valueSelectGoods == 'keyboard') {
            // this code
          } else if (valueSelectGoods == 'HDD') {
            // this code
          } else if (valueSelectGoods == 'Microsoft Office') {
            // this code
          } else if (valueSelectGoods == 'Operation System') {
            // this code
          } else if (valueSelectGoods == 'HUB') {
            // this code
          } else if (valueSelectGoods == 'network_cable') {
            // this code
          } else if (valueSelectGoods == 'rj45_connector') {
            // this code
          }
          enableNextBtn();

          if (valueSelectGoods == '') {
            $('#next-btn button').prop('disabled', true);
            // $('.form-horizontal input').attr('readonly', true);
            // $('.x_panel.test').addClass('bg-secondary2');
          }
        }

        function selectCondition(e) {
          let containerGoods = $(".container-goods");
          let jumlahGoods = $(".goods-item").length;
          var value = $(e).val();
          var parentContainerInput = $(e).parent().parent();
          var valueItem = parentContainerInput.find("select[id*='select-item']").val();

          
          if (value == 'Replacement') {
            parentContainerInput.find('.form-computer').remove();
            parentContainerInput.find('.form-monitor').remove();
            parentContainerInput.find('.form-printer').remove();
            parentContainerInput.find('.form-scanner').remove();
          } else if ( value == 'New' && valueItem == 'computer' ) {
            parentContainerInput.append(`
              <x-com-form-computer></x-com-form-computer>
            `);
          } else if ( value == 'New' && valueItem == 'monitor' ) {
            parentContainerInput.append(`
              <x-com-form-monitor></x-com-form-monitor>
            `);
          } else if ( value == 'New' && valueItem == 'printer' ) {
            parentContainerInput.append(`
              <x-com-form-printer></x-com-form-printer>
            `);
          } else if ( value == 'New' && valueItem == 'scanner' ) {
            parentContainerInput.append(`
              <x-com-form-scanner></x-com-form-scanner>`);
          } else {
            parentContainerInput.find('.form-computer').remove();
            parentContainerInput.find('.form-monitor').remove();
            parentContainerInput.find('.form-printer').remove();
            parentContainerInput.find('.form-scanner').remove();
            
          }
          // console.log(enableNextBtn());
          enableNextBtn();
        }

        function enableNextBtn() {
          var flag = true;
          var flag2 = true;
          var data = [];
          var data2 = [];
          $('.select-item').each(function(i, e) {
            // console.log($(e).val());
            let val = $(e).val();
            data.push(val);
          });

          console.log(data.indexOf(''));
          
          var elSelecCondition;

          if (data.indexOf('') >= 0) {
            flag =  false;
            elSelecCondition = $('.select-condition select');
          } else {
            flag = true;
            elSelecCondition = $('.select-condition select');
          }

            // console.log($('.select-condition select'));
            $('.select-condition select').each(function(i, e) {
              var val2 = $(e).val();

              data2.push(val2);
            });
            
            if (data2.indexOf('') < 0) {
              flag2 = true;
            } else {
              flag2 =  false;
            }
            
          if (flag && flag2) {
            console.log("asfsafsafsafasf ok banget");
            $('#next-btn button').prop('disabled', false);
            
          } else {
            console.log("ga oke");
            $('#next-btn button').prop('disabled', true);
            $('.form-horizontal input').attr('readonly', true);
            $('.x_panel.test').addClass('bg-secondary2');
          }
          
        }

        function nextToBonTeknik() {
          $('.form-horizontal input').removeAttr('readonly');
          $('.x_panel.test').removeClass('bg-secondary2');
        }
    </script>
@endsection --}}

