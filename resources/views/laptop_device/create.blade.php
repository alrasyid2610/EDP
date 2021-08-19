@extends('layouts.main')
@section('content')

<x-com-modaldelete></x-com-modaldelete>
<x-com-modalpesan></x-com-modalpesan>
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
          <form method="POST" action=" {{ route('device_laptop.store') }} ">
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
                    <label for="brand">Brand</label>
                    <select class="custom-select" name="brand" required>
                      <option selected value="">-- Choose --</option>
                      <option value="LENOVO" {{ old('brand', '')=='LENOVO' ? 'selected' : ''  }}>LENOVO</option>
                      <option value="HP" {{ old('brand', '')=='HP' ? 'selected' : ''  }}>HP</option>
                      <option value="DELL" {{ old('brand', '')=='DELL' ? 'selected' : ''  }}>DELL</option>
                      <option value="ASUS" {{ old('brand', '')=='ASUS' ? 'selected' : ''  }}>ASUS</option>
                    </select> 
                    @if ($errors->has('brand')) 
                      <span class="text-danger">{{ $errors->first('brand') }}</span> 
                    @endif
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="series">Series</label>
                    <input type="text" class="form-control" id="type" placeholder="Enter Series Laptop" name="series" required=""
                      value="{{ old('series') ?? '' }}"> 
                      @if ($errors->has('series')) 
                        <span class="text-danger">{{ $errors->first('series') }}</span> 
                      @endif 
                  </div>
                  
                  <div class="col-md-12 mb-3">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" placeholder="Enter Type Laptop" name="type" required=""
                      value="{{ old('type') ?? '' }}"> 
                      @if ($errors->has('type')) 
                        <span class="text-danger">{{ $errors->first('type') }}</span> 
                      @endif 
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="processor">Processor</label>
                    <input type="text" class="form-control" id="processor" placeholder="Enter Processor Laptop" name="processor" required=""
                      value="{{ old('processor') ?? '' }}"> 
                      @if ($errors->has('processor')) 
                        <span class="text-danger">{{ $errors->first('processor') }}</span> 
                      @endif 
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="os">Operation System</label>
                    <input type="text" class="form-control" id="os" placeholder="Enter Operation System Laptop" name="os" required=""
                      value="{{ old('os') ?? '' }}"> 
                      @if ($errors->has('os')) 
                        <span class="text-danger">{{ $errors->first('os') }}</span> 
                      @endif 
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="ram">Ram</label>
                    <input type="text" class="form-control" id="ram" placeholder="Enter Ram Laptop" name="ram" required=""
                      value="{{ old('ram') ?? '' }}"> 
                      @if ($errors->has('ram')) 
                        <span class="text-danger">{{ $errors->first('ram') }}</span> 
                      @endif 
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="storage">Storage</label>
                    <input type="text" class="form-control" id="storage" placeholder="Enter storage Laptop" name="storage" required=""
                      value="{{ old('storage') ?? '' }}"> 
                      @if ($errors->has('storage')) 
                        <span class="text-danger">{{ $errors->first('storage') }}</span> 
                      @endif 
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="type_storage">Type Storage</label>
                    <input type="text" class="form-control" id="type_storage" placeholder="Enter Type Storage Laptop" name="type_storage" required=""
                      value="{{ old('type_storage') ?? '' }}"> 
                      @if ($errors->has('type_storage')) 
                        <span class="text-danger">{{ $errors->first('type_storage') }}</span> 
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

  <script>
    $('document').ready(function() { 
      $('#modalPesanEdit').modal('show') 
    });
   </script>
@endsection
