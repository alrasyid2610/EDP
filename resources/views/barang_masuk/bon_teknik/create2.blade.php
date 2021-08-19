@extends('layouts.main')
@section('content')
  {{-- @php
      dd($data_surat_jalan);
  @endphp --}}

  {{-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $errors->first('pc_name') }}</li>
            @endforeach
            
        </ul>
    </div>
  @endif --}}
  <div id="app">

    <form action="{{ route('technical_documents.store') }}" class="form-horizontal" method="POST">
      @csrf
      {{-- {{ old('no_bon') ?? '' }} --}}
      <input type="hidden" value="{{ $data_surat_jalan->id ?? $data_surat_jalan  }}" name="id_surat_jalan">
      <div class="row" style="position: relative">
        <x-breadcrumb2></x-breadcrumb2>
          
        
          {{-- VIEW SURAT JALAN --}}
          <div class="col-md-4 mb-3 order-2" id="container-ship">
            <div class="dashboard_graph x_panel" style="background-color: rgb(109 182 245 / 32%);">
              <div class="row x_title justify-content-between">
                <div class="col-md-6">
                  <h5>Surat Jalan @{{ selectDevice }}</h5>
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
                <div class="row">
                  <div class="col-4">No Po</div>
                  <div class="col-8">: {{ $data_surat_jalan->no_po }}</div>
                </div>

                <div class="row">
                  <div class="col-4">Reciver</div>
                  <div class="col-8">: {{ $data_surat_jalan->reciver }}</div>
                </div>

                <div class="row">
                  <div class="col-4">Item</div>
                  <div class="col-8">: {{ $data_surat_jalan->item }}</div>
                </div>

                <div class="row">
                  <div class="col-4">Qty Item</div>
                  <div class="col-8">: {{ $data_surat_jalan->qty }}</div>
                </div>

                <div class="row">
                  <div class="col-4">Supplier</div>
                  <div class="col-8">: {{ $data_surat_jalan->supplier }}</div>
                </div>
                
                <div class="row">
                  <div class="col-4">Destination</div>
                  <div class="col-8">: {{ $data_surat_jalan->destination }}</div>
                </div>

                <div class="row">
                  <div class="col-4">Recived Date</div>
                  <div class="col-8">: {{ $data_surat_jalan->recived_shipping_date }}</div>
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
                        <div class="form-row container-input" data-index='1'>
                          <div class="form-group col-3">
                            <label for="no_bon">Types of Goods</label>
                            <select 
                              class="form-control select-item" 
                              id="select-item1" 
                              onchange="selectItem(this)" 
                              name="dataGoods[typeGoods][]">
                              {{-- <option value="" selected>Please select one</option> --}}
                              <option value="" selected>-- Choese --</option>
                              <optgroup label="Computer Components and Peripherals">
                                <option value="computer">Computer</option>
                                <option value="laptop">Laptop</option>
                                <option value="monitor">Monitor</option>
                                <option value="projector">Projector</option>
                                <option value="printer">Printer</option>
                                <option value="scanner">Scanner</option>
                                <option value="mousekeyboard">Mouse & Keyboard</option>
                                <option value="HDD">HDD</option>
                                <option value="Microsoft Office">Microsoft Office</option>
                                <option value="Operation System">Operation System</option>
                                <option value="Other">Other</option>
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
                <h2> <small>Data Computer, Monitor and User</small></h2>
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
                      {{-- HIDE INPUT FOR MORE IFORMATION --}}
                      {{-- tgl ini untuk fixasset --}}
                      <input type="hidden" value="{{ $data_surat_jalan->recived_shipping_date }}" id="tgl_surat_jalan" name="tgl_surat_jalan">
                      @if ($data_surat_jalan->destination == 'DNPI Pulogadung')
                        <input type="hidden" value="PULOGADUNG" name="destination">
                        @elseif($data_surat_jalan->destination == 'DNPI Krawang')
                        <input type="hidden" value="KRAWANG" name="destination">
                      @endif
                      
                      
                      <div class="form-row mb-4">
                        <div class="col-lg-6 mb-3">
                            <label for="no_bon">No Bon Teknik</label>
                            <input type="text" class="form-control read-only" id="no_bon" placeholder="No Bon Teknik" name="no_bon" required=""
                                  value="{{ old('no_bon') ?? '' }}" readonly>
                            @if ($errors->has('no_bon'))
                                <span class="text-danger">{{ $errors->first('no_bon') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="tgl_buat">Tanggal Buat</label>
                            <input type="date" class="form-control read-only" id="tgl_buat" placeholder="Tanggal Buat Bon" name="tgl_buat"
                                  required="" value="{{ old('tgl_buat') ?? '' }}">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="user">User</label>
                            <input type="text" class="form-control read-only" id="user" placeholder="User" name="user" required=""
                                  value="{{ old('user') ?? '' }}">
                            @if ($errors->has('user'))
                                <span class="text-danger">{{ $errors->first('user') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-6 mb-3">

                            <label for="no_bon">Choese Section</label>
                            <select class="form-control read-only" id="section"
                              name="section">
                              <option value="">-- Choese --</option>
                              @if(isset($data_section))
                                <optgroup label="Pulogadung">
                                  @foreach ( $data_section as $value)
                                    <option value="{{ $value->section_name }} | {{ $value->section_name_as }}">{{ $value->section_name }}</option>
                                  @endforeach
                                </optgroup>
                                @else
                                    <option value="{{ old('section') }}" selected>{{ old('section') }}</option>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control read-only" id="keterangan" placeholder="keterangan" name="keterangan"
                                  required="" value="{{ old('keterangan') ?? '' }}">
                            @if ($errors->has('keterangan'))
                                <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                            @endif
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="tgl_terima_bon">Tanggal Terima Bon</label>
                            <input type="date" class="form-control read-only" id="tgl_terima_bon" placeholder="Tanggal Buat Bon"
                                  name="tgl_terima_bon" required="" value="{{ old('tgl_terima_bon') ?? '' }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="penerima_bon">Penerima Bon</label>
                            <input type="text" class="form-control read-only" id="penerima_bon" placeholder="Penerima Bon" name="penerima_bon"
                                  required="" value="{{ old('penerima_bon') ?? '' }}">
                            @if ($errors->has('penerima_bon'))
                                <span class="text-danger">{{ $errors->first('penerima_bon') }}</span>
                            @endif
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="pelaksana">Pelaksana</label>
                            <input type="text" class="form-control read-only" id="pelaksana" placeholder="Pelaksana" name="pelaksana" required=""
                                  value="{{ old('pelaksana') ?? '' }}">
                            @if ($errors->has('pelaksana'))
                                <span class="text-danger">{{ $errors->first('pelaksana') }}</span>
                            @endif
                          </div>
                        <button class="btn btn-sm btn-primary" id="btn-submit" disabled>Submit</button>

                      </div>
                  </div>
              </div>
            </div>
          </div>
      </div>
    </form>
  </div>

@endsection

@section('technical_document_input_goods')

  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>

    <script>
      $(document).ready(function () {
        const app = new Vue({
          el: '#app',
          data: {
              message: 'data kocak',
              selectDevice: 'kocak'
          }
        });
      })

      
      
        var data_qty = <?= $data_surat_jalan->qty ?>;
        var data_qty_arr = [<?= '"' . implode('","', explode("|", $data_surat_jalan->qty)).'"' ?>];
        var data_item_arr = [<?= '"' . implode('","', explode("|", $data_surat_jalan->item)).'"' ?>];


        function test24() {
          $('#co').val('One User');
          $('#brand').val('RAKITAN');
          $('#processor').val('Intel ® Core™ i3-6100 Processor');
          $('#os').val('Windows 7 Pro');
          $('#ram').val('4');
          $('#hdd').val('1000');
          $('#ip').val('-');
          $('#internet').val('YES');
          $('#description').val('PC Rakitan');
          $('#nsi').val('YES');
          $('#boss').val('YES');
          $('#office').val('Microsoft Office 2010');
          $('#antivirus').val('YES');
          $('#wsus').val('YES');
          $('#one').val('YES');
          $('#ax').val('YES');
          $('#ppc').val('YES');
          $('#ups').val('NO');
          $('#loc').val('PULOGADUNG');
        }
        

        // console.log(data_item_arr);
        // console.log(data_qty_arr);
        
        function use_prefix(el) {
          console.log($(el).parent().parent().parent().parent().find('.pc_name').remove());
          let jumlahGoods = $(el).parent().parent().parent().parent().data('index');
          let element = '';
          if ($(el).prop("checked") == true) {
            var a = $(el).parent().parent().parent().parent().find('.select-item').val();
            console.log(a);
            $(el).parent().parent().find('.pc_name').hide();
            $(el).parent().parent().find('.pc_name input').attr('required', false);
            $(el).parent().parent().find('.pc_name input').hide();

              if (a == 'computer') {
                 element += `
                  <div class="col-12 mb-3 pc_name prefix">
                    <div class="row">
                        <div class="col-6">
                            <label for="pc_name">PC Name</label>
                            <input type="text" class="form-control" id="pc_name" placeholder="PC Name Prefix" name="dataGoods[goods][${jumlahGoods}][pc_name][prefix][pc_name]" required="">  
                        </div>

                        <div class="col-4">
                            <label for="index_prefix">Index Prefix</label>
                            <input type="text" class="form-control" id="pc_name" placeholder="Index Prefix" name="dataGoods[goods][${jumlahGoods}][pc_name][prefix][index_prefix]">  
                            <small>Optional</small>
                        </div>

                        <div class="col-2">
                            <label for="qty">Qty</label>
                            <input type="number" class="form-control" placeholder="PC Name Prefix" name="dataGoods[goods][${jumlahGoods}][pc_name][prefix][qty]" value="${data_qty}" required="">  
                        </div>
                        
                        <div class="col-4">
                            <label for="ip_prefix">IP Prefix</label>
                            <input type="text" class="form-control" id="ip_prefix" placeholder="Ip Prefix" name="dataGoods[goods][${jumlahGoods}][pc_name][prefix][ip_prefix]">  
                            <small>Optional</small>
                        </div>

                        <div class="col-4">
                            <label for="ip_index"></label>
                            <input type="text" class="form-control" id="ip_index" placeholder="Ip Index" name="dataGoods[goods][${jumlahGoods}][pc_name][prefix][ip_index]">  
                            <small>Optional</small>
                        </div>
                    </div>
                    
                  </div>
                `;
              } else if (a == 'monitor') {
                 element += `
                  <div class="col-12 mb-3 pc_name prefix">
                    <div class="row">
                        <div class="col-6">
                            <label for="pc_name">PC Name</label>
                            <input type="text" class="form-control" id="pc_name" placeholder="PC Name Prefix" name="dataGoods[goods][${jumlahGoods}][pc_name][prefix][pc_name]" required="">  
                        </div>

                        <div class="col-4">
                            <label for="index_prefix">Index Prefix</label>
                            <input type="text" class="form-control" id="pc_name" placeholder="Index Prefix" name="dataGoods[goods][${jumlahGoods}][pc_name][prefix][index_prefix]">  
                            <small>Optional</small>
                        </div>

                        <div class="col-2">
                            <label for="qty">Qty</label>
                            <input type="number" class="form-control" placeholder="PC Name Prefix" name="dataGoods[goods][${jumlahGoods}][pc_name][prefix][qty]" value="${data_qty}" required="">  
                        </div>
                    </div>
                    
                  </div>
                `;
              }

            $(el).parent().parent().append(element)

           
            
          } else {
            $(el).parent().parent().find('.pc_name').show();
            $(el).parent().parent().find('.pc_name.prefix').hide();
            $(el).parent().parent().find('.pc_name input').attr('required', true);
            $(el).parent().parent().find('.pc_name input').show();
          }
          
        }

        function test(el) {
          var parentCont = $(el).parent().parent();
          var data = $(el).val();
          var item = $(el).parent().parent().find('.select-item').val()
          let jumlahGoods = $(el).parent().parent().data('index');

          if (data == 'one') {
            if (item == 'computer') {
              $(el).parent().parent().find('.form-computer').remove();
              $(el).parent().parent().append(`
                    <x-com-form-computer jumlah-data='${jumlahGoods}'></x-com-form-computer>
              `);
            } else if (item == 'monitor') {
              $(el).parent().parent().find('.form-monitor').remove();
              $(el).parent().parent().append(`
                    <x-com-form-monitor jumlah-data='${jumlahGoods}'></x-com-form-monitor>
              `);
            }
          } else if(data == "more") {
            if (item == 'computer') {
              $(el).parent().parent().find('.form-computer').remove();
              $(el).parent().parent().append(`
                    <x-com-form-computer2 jumlah-data='${jumlahGoods}' qty='${data_qty}'></x-com-form-computer2>
              `);

              var el = ``;
              for (let index = 0; index < data_qty; index++) {
                el += `
                  <div class="col-6 mb-4  pc_name">
                    <label for="pc_name">PC Name ${index + 1} </label>
                    <input type="text" class="form-control" id="pc_name${index + 1}" placeholder="PC Name" name="dataGoods[goods][${jumlahGoods}][pc_name][]" required="">  
                  </div>
                  
                `;
              }

              parentCont.find('.item').append(el)
              // console.log($(el).parent().parent());              
              // $(el).parent().parent().find('.item');

            } else if (item == 'monitor') {
              $(el).parent().parent().find('.form-monitor').remove();
              $(el).parent().parent().append(`
                    <x-com-form-monitor2 jumlah-data='${jumlahGoods}' qty='${data_qty}'></x-com-form-monitor2>
              `);

              var el = ``;
              for (let index = 0; index < data_qty; index++) {
                el += `
                  <div class="col-6 mb-4 pc_name">
                    <label for="pc_name">PC Name ${index + 1} </label>
                    <input type="text" class="form-control" id="pc_name${index + 1}" placeholder="PC Name" name="dataGoods[goods][${jumlahGoods}][pc_name][]" required="">  
                  </div>
                  
                `;
              }

              parentCont.find('.item').append(el)

              // $("#item").append(el);
            }
          }
        }

        String.prototype.capitalize = function() {
          return this.charAt(0).toUpperCase() + this.slice(1)
        }

        function addReadOnly() {
          $('.form-horizontal #step-1 .read-only').attr('disabled', 'true')
        }

        function inputManual(el) {
           var parentContainerInput = $(el).parent().parent();
          let jumlahGoods = parentContainerInput.data('index');
          var val = $(el).val();

          if (val == 'input_manual') {
            $($(el).parent().parent().children('div')[1]).after(`
            <div class="col-12" id="fix_asset${jumlahGoods}">
              <div class="row">
            
                <div class="form-group col-4">
                  <label for="pc_name">Fix Asset Awal  </label>
                  <input type="text" class="form-control" id="pc_name" placeholder="PC Name" name="dataGoods[goods][${jumlahGoods}][fix_asset_awal]" required="">  
                </div>
                <div class="form-group col-4">
                  <label for="pc_name">Fix Asset Akhir  </label>
                  <input type="text" class="form-control" id="pc_name" placeholder="PC Name" name="dataGoods[goods][${jumlahGoods}][fix_asset_akhir]" required="">  
                </div>

                <div class="offset-4"></div>

                <div class="form-group col-2">
                  <label for="pc_name">No Akhir laptop</label>
                  <input type="text" class="form-control" id="pc_name" placeholder="No Akhir Laptop" name="dataGoods[goods][${jumlahGoods}][no_akhir_laptop]" required="">  
                </div>

                <div class="form-group col-3">
                  <label for="prefix_name">Fixasset Date</label>
                  <input type="date" class="form-control" id="pc_name" placeholder="Prefix Name" name="dataGoods[goods][${jumlahGoods}][fix_asset_date]" required="">  
                </div>

                <div class="form-group col-3">
                  <label for="prefix_name">Prefix Name  </label>
                  <input type="text" class="form-control" id="pc_name" placeholder="Prefix Name" name="dataGoods[goods][${jumlahGoods}][prefix]" required="">  
                </div>

              </div>
            </div>

                
            `);
          }
        }

        function generateMultipleInput(item, data_qty, jumlahGoods, parentContainerInput) {
          // console.log(data_qty)
            
            if (data_qty < 4) {
              if (item == 'computer') {
                parentContainerInput.append(`
                  <x-com-form-computer jumlah-data='${jumlahGoods}'></x-com-form-computer>
                `);
              } else if (item == 'monitor') {
                parentContainerInput.append(`
                  <x-com-form-monitor jumlah-data='${jumlahGoods}'></x-com-form-monitor>
                `);
              }
            } else {

              if (item == 'projector') {
                console.log('asfsaf');
                parentContainerInput.append(`
                  <x-com-form-projector jumlah-data='${jumlahGoods}'></x-com-form-projector>
                `);
              }

              
              
              if (item == 'computer') {
                parentContainerInput.append(`
                  <x-com-form-computer2 jumlah-data='${jumlahGoods}' qty='${data_qty}'></x-com-form-computer2>
                `);
              } else if (item == 'monitor') {
                parentContainerInput.append(`
                  <x-com-form-monitor2 jumlah-data='${jumlahGoods}' qty='${data_qty}'></x-com-form-monitor2>
                `);
              }

              var el = ``;
              for (let index = 0; index < data_qty; index++) {
                el += `
                  <div class="col-6 mb-4 pc_name">
                    <label for="pc_name">PC Name ${index + 1} </label>
                    <input type="text" class="form-control" id="pc_name${index + 1}" placeholder="PC Name" name="dataGoods[goods][${jumlahGoods}][pc_name][]" required="">  
                  </div>
                  
                `;
              }
            }

              parentContainerInput.find('.item').append(el);

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
                  <div class="form-row container-input" data-index="${jumlahGoods + 1}">
                    <div class="form-group col-3">
                      <label for="no_bon">Types of Goods</label>
                      <select class="form-control select-item" id="select-item${jumlahGoods + 1}" onchange="selectItem(this)" name="dataGoods[typeGoods][]">
                        <option value="">-- Choese --</option>
                        <optgroup label="Computer Components and Peripherals">
                          <option value="computer">Computer</option>
                          <option value="laptop">Laptop</option>
                          <option value="monitor">Monitor</option>
                          <option value="projector">Projector</option>
                          <option value="printer">Printer</option>
                          <option value="scanner">Scanner</option>
                          <option value="mousekeyboard">Mouse & Keyboard</option>
                          <option value="HDD">HDD</option>
                          <option value="Microsoft Office">Microsoft Office</option>
                          <option value="Operation System">Operation System</option>
                          <option value="Other">Other</option>
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
            // console.log($('.form-horizontal #step-1 button'));
          }
        }

        function selectItem(e) {
          
          var valueSelectGoods = $(e).val();
          // console.log(valueSelectGoods);
          var parentContainerInput = $(e).parent().parent();
          // $("#select-option-input").remove();
          // let jumlahGoods = $(".goods-item").length;
          let jumlahGoods = parentContainerInput.data('index');
          parentContainerInput.find('.select-option-input').remove();
          parentContainerInput.find('.form-computer').remove();
          parentContainerInput.find('.form-laptop').remove();
          parentContainerInput.find('.form-monitor').remove();
          parentContainerInput.find('.form-printer').remove();
          parentContainerInput.find('.form-scanner').remove();
          parentContainerInput.find('.form-os').remove();
          parentContainerInput.find('.form-keyboard').remove();

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

          
          

          if(valueSelectGoods == 'projector') {
            // console.log('asfsaf');
            // generateMultipleInput('projector', data_qty, jumlahGoods, parentContainerInput)
            parentContainerInput.find('.select-condition').remove();
              // console.log('asfasfsaf');
              parentContainerInput.append(`
              <x-com-form-projector jumlah-data='${jumlahGoods}'></x-com-form-projector>
            `);
          }
          
          if (valueSelectGoods == 'mousekeyboard') {
            // generateMultipleInput('mousekeyboard', data_qty, jumlahGoods, parentContainerInput)

            // this code
            parentContainerInput.find('.select-condition').remove();
              // console.log('asfasfsaf');
              parentContainerInput.append(`
              <x-form-keyboard jumlah-data='${jumlahGoods}'></x-form-keyboard>
            `);
          } else if (valueSelectGoods == 'HDD') {
            // this code
          } else if (valueSelectGoods == 'Microsoft Office') {
            // this code
            parentContainerInput.find('.select-condition').remove();
              parentContainerInput.append(`
              <x-form-office jumlah-data='${jumlahGoods}'></x-form-office>
            `);
          } else if (valueSelectGoods == 'Operation System') {
            parentContainerInput.find('.select-condition').remove();
              parentContainerInput.append(`
              <x-form-os jumlah-data='${jumlahGoods}'></x-form-os>
            `);
            // this code
          } else if (valueSelectGoods == 'HUB') {
            // this code
          } else if (valueSelectGoods == 'network_cable') {
            // this code
          } else if (valueSelectGoods == 'rj45_connector') {
            // this code
          } else if (valueSelectGoods == 'laptop') {
            // console.log(data_qty);
            // parentContainerInput.find('.select-condition').remove();
            parentContainerInput.append(`
              <x-com-form-laptop jumlah-data='${jumlahGoods}'></x-com-form-laptop>
            `);

            $(parentContainerInput.children('div')[0]).after(`
              <div class="form-group col-5">
                <label for="no_bon">Condition Fix Asset</label>
                <select class="form-control" onchange="inputManual(this)" name="dataGoods[goods][${jumlahGoods}][fix_asset_input]">
                  <option value="">-- Choese --</option>
                  <option value="input_manual">Input Manual</option>
                </select>
              </div>
            `);

            // // console.log(parentContainerInput);
              // if ( data_qty > 1 ) {
              //   // console.log($(e).parent());
              //   $(e).parent().after(`
              //     <div class="form-group col-3 mb-3 select-option-input">
              //       <label for="no_bon">Select Option Input</label>
              //       <select class="form-control select-option-input" onchange="test(this)" name="optionInput">
              //         <option value="more" selected>More Than One Item</option>
              //         <option value="one">Only One Item</option>
              //       </select>
              //     </div>

              //   `);
              // }
              
          } else if (valueSelectGoods == 'Other') {
            parentContainerInput.find('.select-condition').remove();
              parentContainerInput.append(`
              <x-com-form-others jumlah-data='${jumlahGoods}'></x-com-form-others>
            `);
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
            parentContainerInput.find('.select-option-input').remove();
            parentContainerInput.find('.form-computer').remove();
            parentContainerInput.find('.form-monitor').remove();
            parentContainerInput.find('.form-printer').remove();
            parentContainerInput.find('.form-scanner').remove();
            parentContainerInput.find('.form-keyboard').remove();
            parentContainerInput.find('.form-os').remove();
          } else if ( value == 'New' && valueItem == 'computer') {

            generateMultipleInput('computer', data_qty, jumlahGoods, parentContainerInput)
            
          } else if ( value == 'New' && valueItem == 'monitor' ) {
            
            generateMultipleInput('monitor', data_qty, jumlahGoods, parentContainerInput)
            
          } else if ( value == 'New' && valueItem == 'printer' ) {
            parentContainerInput.append(`
              <x-com-form-printer jumlah-data='${jumlahGoods}'></x-com-form-printer>
            `);
          } else if ( value == 'New' && valueItem == 'scanner' ) {
            parentContainerInput.append(`
              <x-com-form-scanner jumlah-data='${jumlahGoods}'></x-com-form-scanner>`);
          } else {
            parentContainerInput.find('.select-option-input').remove();
            parentContainerInput.find('.form-computer').remove();
            parentContainerInput.find('.form-monitor').remove();
            parentContainerInput.find('.form-printer').remove();
            parentContainerInput.find('.form-scanner').remove();
            parentContainerInput.find('.form-os').remove();
            parentContainerInput.find('.form-keyboard').remove();
            
          }

          if (value == 'New' && (valueItem == 'computer' || valueItem == 'monitor' || valueItem == 'printer' || valueItem == 'scanner' || valueItem == 'laptop')) {
            // console.log(parentContainerInput);
            if ( data_qty > 1 ) {
              // console.log($(e).parent());
              $(e).parent().after(`
                <div class="form-group col-3 mb-3 select-option-input">
                  <label for="no_bon">Select Option Input</label>
                  <select class="form-control select-option-input" onchange="test(this)" name="optionInput">
                    <option value="more" selected>More Than One Item</option>
                    <option value="one">Only One Item</option>
                  </select>
                </div>

              `);
            }
            
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
          $('.form-horizontal #step-1 input').removeAttr('readonly');
          $('.form-horizontal #step-1 input').prop('disabled', false);
          $('.form-horizontal #step-1 select').prop('disabled', false);
            $('.form-horizontal #step-1 select').removeAttr('readonly');
          $('.form-horizontal #step-1 button').removeAttr('disabled');
          $('.x_panel.test').removeClass('bg-secondary2');
        }
    </script>
@endsection


