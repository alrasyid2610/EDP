@php
    if (isset($data)) {
        $GLOBALS['a'] = $data;
    }
@endphp
@extends('layouts.main')
@section('content')
	<div class="row">
		<x-breadcrumb></x-breadcrumb>
    {{-- {{ dd($data) }} --}}

		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
          <h2>Form {{ $page_action }} <small style="font-size: 12px"> {{ $page_action }} data according to shipping documents</small></h2>
          
          <div class="clearfix"></div>
				</div>

        <div class="x_content">
          <br>
          <form method="POST" action=" {{ route('shipping_documents.update', ['shipping_document' => $data->id]) }} "> @csrf
            @method('PUT') 
            <input type="hidden" name="route" value="{{ url()->previous() }}">
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="form-row mb-4">
              <div class="col-12"> {{-- <h5 class="m-0 mb-2 font-italic font-weight-bold">Shipping Documents Data</h5> --}}
                @if(Session::has('success')) <div class="alert alert-success"> {{ Session::get('success') }} @php
                  Session::forget('success'); @endphp </div> @endif </div>
              <div class="col-md-12 mb-3">
                <label for="no_po">No Po</label>
                <input type="text" class="form-control" id="no_po" placeholder="No Po" name="no_po" required="" minlength="8"
                  value="{{ $data->no_po ?? '' }}"> @if ($errors->has('no_po')) <span
                  class="text-danger">{{ $errors->first('no_po') }}</span> @endif </div>

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
              {{-- <div class="col-md-12 mb-3">
                <label for="item">Item</label>
                <input type="text" class="form-control" id="item" placeholder="Item" name="item" required=""
                  value="{{ $data->item ?? '' }}"> @if ($errors->has('item')) <span
                  class="text-danger">{{ $errors->first('item') }}</span> @endif 
              </div> --}}

              <div id="qty" class="col-md-12 mb-3">
                    
              </div>

              <div class="col-md-12 mb-3">
                <label for="reciver">Reciver</label>
                <input type="text" class="form-control" id="reciver" placeholder="reciver" name="reciver" required=""
                  value="{{ $data->reciver ?? '' }}"> @if ($errors->has('reciver')) <span
                  class="text-danger">{{ $errors->first('reciver') }}</span> @endif </div>
              <div class="col-md-12 mb-3">
                <label for="supplier">supplier</label>
                <select class="custom-select" name="supplier" required>
                  <option selected value="">-- Choose --</option> @php loopSelectData(getDataSupplier(), 'supplier'); @endphp
                </select> @if ($errors->has('supplier')) <span class="text-danger">{{ $errors->first('supplier') }}</span> @endif
              </div>
              <div class="col-md-12 mb-3">
                <label for="recived_date">Recived Date</label>
                <input type="date" class="form-control" id="recived_shipping_date" placeholder="Tanggal Terima Barang"
                  name="recived_shipping_date" value="{{ $data->recived_shipping_date ?? '' }}">
              </div>
              <div class="col-md-12 mb-3">
                <label for="destination">Destination</label>
                <select class="custom-select" name="destination" required>
                  <option selected value="">-- Choose --</option> @php loopSelectData(getDataDestination(), 'destination');
                  @endphp
                </select> @if ($errors->has('destination')) <span class="text-danger">{{ $errors->first('destination') }}</span>
                @endif </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>
				
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
      
        var data_qty = "{{ $data->qty }}";
        data_qty = data_qty.split('|');

          function qty(data_qty) {
            $("#qty").html('');
            var el = `<div class="row">`;
            console.log($('.dropdown-item.active .form-check-input'));
            $('.dropdown-item.active .form-check-input').each(function(e, i) {
              var data = $(this).val();
              var qty = data_qty[e].trim();
              el += `<div class="col-md-3">
                  <label for="qty${data}">Qty ${data}</label>
                  <input type="number" min='1' class="form-control" id="qty${data}" placeholder="Qty ${data}" name="qty[]" required=""
                        value="{{ old('reciver') ?? '${qty}' }}"> 
                </div>`;
            });
            
            el += `</div>`; 
            
            $("#qty").append(el);

          }

      
      var data_item = [<?php echo '"'.trim(implode('","', array_map('trim', explode('|',$data->item)))).'"' ?>];
      // console.log($('.multiselect-option').addClass('active'));
      $('#example-getting-started option').each(function(i, e) {
        data_item.forEach(element => {
            if(element == $(e).text()) {
              $(e).attr('selected', 'selected');
              // console.log(e);
            }
        });
      });


        $('#example-getting-started').multiselect({
          buttonWidth: '100%',
          delimiterText: '|',
        });

        
        
        qty(data_qty);


    });


  </script>
@endsection