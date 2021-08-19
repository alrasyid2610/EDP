@extends('layouts.main')
@section('content')

  
  <form action="{{ route('shipping_documents.store2') }}" class="form-horizontal" method="POST">
    @csrf
    {{-- {{ old('no_bon') ?? '' }} --}}
    <input type="hidden" value="{{ $data_bon_teknik->id ?? $data_bon_teknik  }}" name="id_bon_teknik">
    <input type="hidden" value="{{ $data_bon_teknik->departement_as ?? $data_bon_teknik  }}" name="section_as">
    <div class="row" style="position: relative">
      <x-breadcrumb2></x-breadcrumb2>
        

        {{-- VIEW SURAT JALAN --}}
        <div class="col-md-4 mb-3 order-2" id="container-ship">
          <div class="dashboard_graph x_panel" style="background-color: rgb(109 182 245 / 32%);">
            <div class="row x_title justify-content-between">
              <div class="col-md-6">
                <h5>Bon Teknik</h5>
                {{-- <h3>Choose a condition1 <small style="font-size: 12px">Input data sesuai dengan Bon Teknik</small></h3> --}}
              </div>
              <div class="col-md-2 text-right">
                <ul class="nav navbar-right panel_toolbox">
                  <li>
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li>
                    <a class="" id="hide"><i class="fa fa-minus-circle"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="container-goods x_content">
              <div class="row mt-lg-2">
                <div class="col-12">
                  <div class="font-weight-bold">Data Bon Teknik</div>
                </div>
              </div>

              <div class="row">
                <div class="col-4">No Bon Teknik</div>
                <div class="col-8">: {{ $data_bon_teknik->no_document }}</div>
              </div>

              <div class="row">
                <div class="col-4">Departement / Section</div>
                <div class="col-8">: {{ $data_bon_teknik->departement }}</div>
              </div>

              <div class="row">
                <div class="col-4">User Pembuat Bon</div>
                <div class="col-8">: {{ $data_bon_teknik->user }}</div>
              </div>

              <div class="row">
                <div class="col-4">Tanggal Buat</div>
                <div class="col-8">: {{ $data_bon_teknik->create_date }}</div>
              </div>
              
              <div class="row mt-lg-2">
                <div class="col-12">
                  <div class="font-weight-bold">Serah Terima Bon</div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-4">Penerima Dokumen</div>
                <div class="col-8">: {{ $data_bon_teknik->document_recipient }}</div>
              </div>

              <div class="row">
                <div class="col-4">Tanggal Terima</div>
                <div class="col-8">: {{ $data_bon_teknik->recived_date }}</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8 col-sm-12 mb-3 order-1" id="con-items">
          
            <div class="dashboard_graph x_panel">
              
              <div class="row x_title justify-content-between">
                <div class="col-md-6">
                  <h5>Choose a condition1 <small style="font-size: 12px">Input data sesuai dengan Bon Teknik</small></h5>
                </div>
                
                <div class="col-md-6 text-right">
                  <h5 class="d-inline-block" style="float: none;">
                    <button href="" type="button" class="btn btn-primary btn-sm" onclick="addGoods()">Adds Goods <i class="fa fa-plus-circle"></i></button> 
                    &nbsp; &nbsp;
                    <button href="" type="button" class="btn btn-danger btn-sm" onclick="removeGoods()">Remove Goods <i class="fa fa-plus-circle"></i></button> 
                  </h5> 
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown" id="dropdown1">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="/goods_come/technical_documents/create?d=4c1a69dd6d993dbe6ce16bc2408311f5">Condition 1</a>
                        </li>
                        <li><a class="dropdown-item" href="/goods_come/technical_documents/create?d=1f95fe52c64a05b5ecc462b355f6d358">Condition 2</a>
                        </li>
                      </ul>
                    </li>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="container-goods x_content">
                
                {{-- Untuk error saat terjadi kesalahan input --}}
                @if ($errors->any())
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li> 
                            @endforeach 
                        </ul>
                      </div>
                    </div>
                  </div>
                @endif

                {{-- dataGoods.goods.goods1.pc_name --}}
                {{-- Untuk error saat terjadi kesalahan input --}}
                
                <div id="goods1" class="mb-4 goods-item" style="border-bottom: 1px solid black;">
                  <div class="row">
                    <div class="col-lg-12 mb-3">
                      <h6>Goods 1</h6>
                      <div class="form-row container-input" data-index='goods1'>
                        <div class="form-group col-3">
                          <label for="no_bon">Types of Goods</label>
                          <select class="form-control select-item" id="select-item1" onchange="selectItem(this)" name="dataGoods[typeGoods][]">
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
                      {{-- <div class="form-row">
                      </div> --}}
                    </div>
                  </div>
                </div>

                <div class="row" id="next-btn">
                  <div class="col-5">
                    <a class="btn btn-primary disabled text-white btn-next"  onclick="nextToBonTeknik()">NEXT</a>
                  </div>
                </div>
              </div>
              
            </div>
        </div>
        

        <div class="col-md-12 col-sm-12 order-3" id="wizard-input">
          <div class="x_panel test bg-secondary2">
            <div class="x_title">
              <h2> <small>Form Data Surat Jalan</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a class="dropdown-item" href="#">Settings 1</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
                <div id="step-1" class="tab-pane" role="tabpanel">
                  <div class="form-row mb-4">
                      {{-- HIDE INPUT FOR MORE IFORMATION --}}
                      {{-- <input type="hidden" value="{{ $data_bon_teknik->recived_shipping_date }}" id="tgl_surat_jalan" name="tgl_surat_jalan"> --}}
                      {{-- <input type="hidden" value="{{ $data_bon_teknik->id }}" name="no_document"> --}}
                      {{-- @if ($data_bon_teknik->destination == 'DNPI Pulogadung')
                        <input type="hidden" value="PULOGADUNG" name="destination">
                        @elseif($data_bon_teknik->destination == 'DNPI Krawang')
                        <input type="hidden" value="KRAWANG" name="destination">
                      @endif --}}

                      <div class="col-12"> {{-- <h5 class="m-0 mb-2 font-italic font-weight-bold">Shipping Documents Data</h5> --}}
                        @if(Session::has('success')) 
                          <div class="alert alert-success"> {{ Session::get('success') }} 
                              @php
                                Session::forget('success'); 
                              @endphp 
                          </div> 
                        @endif 
                      </div>

                      <div class="col-md-12 mb-3">
                        <label for="no_po">No Po</label>
                        <input type="text" class="form-control read-only" id="no_po" placeholder="No Po" name="no_po" required=""
                          value="{{ old('no_po') ?? '' }}"> @if ($errors->has('no_po')) <span
                          class="text-danger">{{ $errors->first('no_po') }}</span> @endif 
                      </div>

                      <div class="col-md-12 mb-3">
                        <label for="item">Item</label>
                                              
                        {{-- @if (Arr::has(old('item'), 'item.Computer'))
                          <h1>sajkfgsakjfg</h1>
                        @else
                          <h1>kocak</h1>

                        @endif --}}
                          <select id="example-getting-started" class="form-control" multiple="multiple" disabled name="item[]">
                              <option value="Computer">Computer</option>
                              <option value="Monitor">Monitor</option>
                              <option value="Printer">Printer</option>
                              <option value="Scanner">Scanner</option>
                              <option value="Other">Other</option>
                          </select>
                      </div>

                      <div class="col-md-12 mb-3">
                        <label for="reciver">Reciver</label>
                        <input type="text" class="form-control read-only" id="reciver" placeholder="reciver" name="reciver" required=""
                          value="{{ old('reciver') ?? '' }}"> @if ($errors->has('reciver')) <span
                          class="text-danger">{{ $errors->first('reciver') }}</span> @endif 
                      </div>

                      <div class="col-md-12 mb-3">
                        <label for="supplier">supplier</label>
                        <select class="form-control read-only" name="supplier" required>
                          <option selected value="">-- Choose --</option>
                          <option value="CV. JODA JAYA ELECTRIC">CV. JODA JAYA ELECTRIC</option>
                          <option value="PT. PLATINDO KARYA PRIMA">PT. PLATINDO KARYA PRIMA</option>
                          <option value="PT. WAHANA DATARINDO SEMPURANA">PT. WAHANA DATARINDO SEMPURANA</option>
                          <option value="PT. MICROREKSA INFONET">PT. MICROREKSA INFONET</option>
                        </select> @if ($errors->has('supplier')) <span class="text-danger">{{ $errors->first('supplier') }}</span> @endif
                      </div>

                      <div class="col-md-12 mb-3">
                        <label for="recived_date">Recived Date</label>
                        <input type="date" class="form-control read-only" id="recived_date" placeholder="Tanggal Terima Barang" name="recived_date"
                          value="">
                      </div>
                      
                      <div class="col-md-12 mb-3">
                        <label for="destination">Destination</label>
                        <select class="form-control read-only" name="destination" required>
                          <option selected value="">-- Choose --</option>
                          <option value="DNPI Pulogadung">DNPI Pulogadung</option>
                          <option value="DNPI Krawang">DNPI Krawang</option>
                        </select> 
                          @if ($errors->has('destination')) 
                            <span class="text-danger">{{ $errors->first('destination') }}</span>
                          @endif 
                      </div>

                      <button type="submit" class="btn btn-primary read-only" name="submit">Submit</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
  </form>
@endsection

@section('technical_document_input_goods')
    <script>

        String.prototype.capitalize = function() {
          return this.charAt(0).toUpperCase() + this.slice(1)
        }

        function addReadOnly() {
          $('.form-horizontal #step-1 .read-only').attr('disabled', 'true')
        }

        $(document).ready(function() {
          
          addReadOnly();

          if ( $('#hide').length ) {
            $('#hide').click(function(e) {
              $('#container-ship').addClass('hide-shipping');
              $('#container-ship').append('<div class="open-ship"><i class="fa fa-plus"></i></div>');
              // console.log($('.con-items'));
              $('#con-items').removeClass('col-md-8');
              $('#con-items').addClass('col-md-12');

              if ( $('.open-ship').length ) {
                $('.open-ship').click(function(e) {
                  $('#con-items').removeClass('col-md-12');
                  $('#con-items').addClass('col-md-8');
                  $('#container-ship').removeClass('hide-shipping');
                  $('.open-ship').remove();
                });

                // console.log($('#hide').length);
              }
            });

            // console.log($('#hide').length);
          }
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
                  <div class="form-row container-input" data-index="goods${jumlahGoods + 1}">
                    <div class="form-group col-3">
                      <label for="no_bon">Types of Goods</label>
                      <select class="form-control select-item" id="select-item${jumlahGoods + 1}" onchange="selectItem(this)" name="dataGoods[typeGoods][]">
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
          enableNextBtn();
          if ( currentGoods == 0 ) {
            // $('#next-btn a.btn-next').prop('disabled', true);
            $('#next-btn a.btn-next').addClass('disabled');
            // $('.form-horizontal #step-1 #step-1 input').attr('readonly', true);
            // $('.form-horizontal #step-1 #btn-submit').prop('disabled', true);
            $('.x_panel.test').addClass('bg-secondary2');

            $('.form-horizontal #step-1 input').attr('readonly');
            // $('.form-horizontal #step-1 select').attr('readonly');
            $('.form-horizontal #step-1 input').prop('disabled', true);
            $('.form-horizontal #step-1 button').prop('disabled', true);
            $('.form-horizontal #step-1 #section').prop('disabled', true);
            console.log($('.form-horizontal #step-1 button'));
          }
        }

        function selectItem(e) {
          let jumlahGoods = $(".goods-item").length;
          var valueSelectGoods = $(e).val();
          // console.log(valueSelectGoods);
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
                <select class="form-control" onchange="selectCondition(this)" name="dataGoods[conditionGoods][]">
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
            // $('#next-btn .btn-next').prop('disabled', true);
            $('#next-btn .btn-next').addClass('disabled');
            // $('.form-horizontal #step-1 input').attr('readonly', true);
            // $('.x_panel.test').addClass('bg-secondary2');
          }
        }

        function selectCondition(e) {
          let containerGoods = $(".container-goods");
          var value = $(e).val();
          var parentContainerInput = $(e).parent().parent();
          let jumlahGoods = parentContainerInput.data('index');
          // console.log(parentContainerInput);
          var valueItem = parentContainerInput.find("select[id*='select-item']").val();

          
          if (value == 'Replacement') {
            parentContainerInput.find('.form-computer').remove();
            parentContainerInput.find('.form-monitor').remove();
            parentContainerInput.find('.form-printer').remove();
            parentContainerInput.find('.form-scanner').remove();
          } else if ( value == 'New' && valueItem == 'computer' ) {
            parentContainerInput.append(`
              <x-com-form-computer jumlah-data='${jumlahGoods}'></x-com-form-computer>
            `);
          } else if ( value == 'New' && valueItem == 'monitor' ) {
            parentContainerInput.append(`
              <x-com-form-monitor jumlah-data='${jumlahGoods}'></x-com-form-monitor>
            `);
          } else if ( value == 'New' && valueItem == 'printer' ) {
            parentContainerInput.append(`
              <x-com-form-printer jumlah-data='${jumlahGoods}'></x-com-form-printer>
            `);
          } else if ( value == 'New' && valueItem == 'scanner' ) {
            parentContainerInput.append(`
              <x-com-form-scanner jumlah-data='${jumlahGoods}'></x-com-form-scanner>`);
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

          // console.log(data);
          // console.log($('.select-item'));
          
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
            // console.log("asfsafsafsafasf ok banget");
            // $('#next-btn a.btn-next').prop('disabled', false);
            $('#next-btn .btn-next').removeClass('disabled');
            
          } else {
            // console.log("ga oke");
            // $('#next-btn a.btn-next').prop('disabled', true);
            $('#next-btn .btn-next').addClass('disabled');
            $('.form-horizontal #step-1 input').attr('readonly', true);
            $('.form-horizontal #step-1 select').attr('readonly', true);
            $('.form-horizontal #btn-submit').prop('disabled', true);
            $('.x_panel.test').addClass('bg-secondary2');
          }
          
        }

        function nextToBonTeknik() {
          $('#example-getting-started').multiselect('enable')
          $('.form-horizontal #step-1 input').removeAttr('readonly');
          $('.form-horizontal #step-1 input').prop('disabled', false);
          $('.form-horizontal #step-1 select').prop('disabled', false);
            $('.form-horizontal #step-1 select').removeAttr('readonly');
          $('.form-horizontal #step-1 button').removeAttr('disabled');
          $('.x_panel.test').removeClass('bg-secondary2');
        }
    </script>
@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('js/js-multiple-select/dist/css/bootstrap-multiselect.min.css') }}">

  <style>
    .multiselect {
      text-align: left;
    }
  </style>
@endsection

@section('script')
  <script src="{{ asset('js/js-multiple-select/dist/js/bootstrap-multiselect.js') }}"></script>

  <script>
    $(document).ready(function () {
      
      var data_item = [<?php echo '"'.implode('","', old('item', [''])).'"' ?>];
      // console.log($('.multiselect-option').addClass('active'));
      console.log(data_item);
      $('#example-getting-started option').each(function(i, e) {
        data_item.forEach(element => {
            if(element == $(e).text()) {
              $(e).attr('selected', 'selected');
              console.log(e);
            }
        });
      });


        $('#example-getting-started').multiselect({
          buttonWidth: '100%',
          delimiterText: '|',
        });

    });
  </script>
@endsection