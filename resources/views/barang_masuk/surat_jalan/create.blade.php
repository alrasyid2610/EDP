@extends('layouts.main')
@section('content')
  <div class="row">
		<x-breadcrumb></x-breadcrumb>


		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
          <h2>Form Input <small>Enter Shipping Document Data</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown" id="dropdown1">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a class="dropdown-item"
                    href="{{ route('shipping_documents.create') }}?d=4c1a69dd6d993dbe6ce16bc2408311f5">Condition 1</a>
                </li>
                <li><a class="dropdown-item"
                    href="{{ route('shipping_documents.create') }}?d=1f95fe52c64a05b5ecc462b355f6d358">Condition 2</a>
                </li>
              </ul>
            </li>
            </li>
          </ul>
          <div class="clearfix"></div>
						{{-- <h3>Form Input <small style="font-size: 12px">Input data according to shipping documents</small></h3> --}}
				</div>

        
        
				
				<div class="x_content">
          <br>
          <form method="POST" action=" {{ route('shipping_documents.store') }} ">
             @csrf 
            <div class="form-row mb-4">
              <div class="col-12"> {{-- <h5 class="m-0 mb-2 font-italic font-weight-bold">Shipping Documents Data</h5> --}}
                @if(Session::has('success')) 
                  <div class="alert alert-success"> {{ Session::get('success') }} 
                      @php
                        Session::forget('success'); 
                      @endphp 
                  </div> 
                @endif 
              </div>



              <div class="col-6">
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label for="no_po">No Po</label>
                    <input type="text" class="form-control" id="no_po" placeholder="No Po" name="no_po" required=""
                      value="{{ old('no_po') ?? '' }}"> @if ($errors->has('no_po')) <span
                      class="text-danger">{{ $errors->first('no_po') }}</span> @endif 
                  </div>
                  {{-- <div class="col-md-12 mb-3">
                    <label for="item">Item</label>
                    <input type="text" class="form-control" id="item" placeholder="Item" name="item" required=""
                      value="{{ old('item') ?? '' }}"> @if ($errors->has('item')) <span
                      class="text-danger">{{ $errors->first('item') }}</span> @endif 
                  </div> --}}

                  <div class="col-md-12 mb-3">
                    <label for="item">Item</label>
                                          
                    {{-- @if (Arr::has(old('item'), 'item.Computer'))
                      <h1>sajkfgsakjfg</h1>
                    @else
                      <h1>kocak</h1>

                    @endif --}}
                      <select id="example-getting-started" class="form-control" multiple="multiple" name="item[]">
                          <option value="Computer">Computer</option>
                          <option value="Laptop">Laptop</option>
                          <option value="Monitor">Monitor</option>
                          <option value="Printer">Printer</option>
                          <option value="Scanner">Scanner</option>
                          <option value="Os">Operation System</option>
                          <option value="MS Ofiice">MS Office</option>
                          <option value="Projector">Projector</option>
                          <option value="Other">Other</option>
                      </select>
                  </div>

                  <div id="qty" class="col-md-12 mb-3">
                    
                    
                  </div>
                  
                  

                  <div class="col-md-12 mb-3">
                    <label for="Reciver">Reciver</label>
                    <select class="custom-select" name="reciver" required>
                      <option selected value="">-- Choose --</option>
                      <option value="Chevy" {{ old('reciver', '')=='Chevy' ? 'selected' : ''  }}>Chevy</option>
                      <option value="Harun" {{ old('reciver', '')=='Harun' ? 'selected' : ''  }}>Harun</option>
                      <option value="Hilman" {{ old('reciver', '')=='Hilman' ? 'selected' : ''  }}>Hilman</option>
                      <option value="Edi Irfan" {{ old('reciver', '')=='Edi Irfan' ? 'selected' : ''  }}>Edi Irfan</option>
                    </select> 
                    @if ($errors->has('supplier')) 
                      <span class="text-danger">{{ $errors->first('reciver') }}</span> 
                    @endif
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="supplier">supplier</label>
                    <select class="custom-select" name="supplier" required>
                      <option selected value="">-- Choose --</option>
                      <option value="CV. JODA JAYA ELECTRIC" {{ old('supplier', '')=='CV. JODA JAYA ELECTRIC' ? 'selected' : ''  }}>CV. JODA JAYA ELECTRIC</option>
                      <option value="PT. PLATINDO KARYA PRIMA" {{ old('supplier', '')=='PT. PLATINDO KARYA PRIMA' ? 'selected' : ''  }}>PT. PLATINDO KARYA PRIMA</option>
                      <option value="PT. WAHANA DATARINDO SEMPURANA" {{ old('supplier', '')=='PT. WAHANA DATARINDO SEMPURANA' ? 'selected' : ''  }}>PT. WAHANA DATARINDO SEMPURANA</option>
                      <option value="PT. MICROREKSA INFONET" {{ old('supplier', '')=='PT. MICROREKSA INFONET' ? 'selected' : ''  }}>PT. MICROREKSA INFONET</option>
                      <option value="SURYA MANDIRI" {{ old('supplier', '')=='SURYA MANDIRI' ? 'selected' : ''  }}>SURYA MANDIRI</option>
                    </select> 
                    @if ($errors->has('supplier')) 
                      <span class="text-danger">{{ $errors->first('supplier') }}</span> 
                    @endif
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="recived_date">Recived Date</label>
                    <input type="date" class="form-control" id="recived_date" placeholder="Tanggal Terima Barang" name="recived_date"
                      value="{{ old('recived_date', '') }}">
                  </div>
                  
                  <div class="col-md-12 mb-3">
                    <label for="destination">Destination</label>
                    <select class="custom-select" name="destination" required>
                      <option selected value="">-- Choose --</option>
                      <option value="DNPI Pulogadung" {{ old('destination', '')=='DNPI Pulogadung' ? 'selected' : ''  }}>DNPI Pulogadung</option>
                      <option value="DNPI Krawang" {{ old('destination', '')=='DNPI Krawang' ? 'selected' : ''  }}>DNPI Krawang</option>
                    </select> 
                      @if ($errors->has('destination')) 
                        <span class="text-danger">{{ $errors->first('destination') }}</span>
                      @endif 
                  </div>
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </div>
              
              
              
              
            </div>
          </form>

          
				</div>
				
			</div>
		</div>
	</div>

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

      // ============================ Untuk mengisi kembali form multi select ketika ada error ==================================
      var data_item = [<?= '"'.implode('","', old('item', [''])).'"' ?>];
      // console.log($('.multiselect-option').addClass('active'));
      // console.log(data_item);
      $('#example-getting-started option').each(function(i, e) {
        data_item.forEach(element => {
          if(element == $(e).text()) {
            $(e).attr('selected', 'selected');
          }
        });
      });

      var data_qty = [<?= '"'.implode('","', old('qty', [''])).'"' ?>];
      console.log(data_qty);
      // ============================ Untuk mengisi kembali form multi select ketika ada error ==================================


        $('#example-getting-started').multiselect({
          buttonWidth: '100%',
          delimiterText: '|',
          selectAllValue: 'multiselect-all',
          onDropdownHide: function(event) {
            $("#qty").html('');
            var el = `<div class="row">`;
            $('.dropdown-item.active .form-check-input').each(function(e, i) {
              var data = $(this).val();
              el += `<div class="col-md-3">
                  <label for="qty${data}">Qty ${data}</label>
                  <input type="number" min='1' class="form-control" id="qty${data}" placeholder="Qty ${data}" name="qty[]" required=""
                        value="{{ old('reciver') ?? '1' }}"> 
                </div>`;
            });
            
            el += `</div>`; 
            
            $("#qty").append(el);

          }
        });
    });
  </script>
@endsection

