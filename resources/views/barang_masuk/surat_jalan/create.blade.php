@extends('layouts.main')
@section('content')
<div class="row">
	<div class="title_left col-md-12">
    <h3>Goods Come <small> | <a href="{{ url('/barang_masuk/shipping_documents/create') }}" class="text-primary">Enter Shipping Documents</a> | 
      <a href="{{ url('/barang_masuk/shipping_documents/') }}" class="text-primary">View Data</a> </small>	</h3>
	</div>
	</div>

	<div class="col-md-8 col-sm-12 offset-md-2 ">

		
		<div class="dashboard_graph">
			<div class="row x_title">
				<div class="col-md-6">
					<h3>Form Input <small style="font-size: 12px">Input data according to shipping documents</small></h3>
				</div>
			</div>

			<form method="POST" action=" {{ route('shipping_documents.store') }} ">
				@csrf
				<div class="form-row mb-4">
					<div class="col-12">
						<h5 class="m-0 mb-2 font-italic font-weight-bold">Shipping Documents Data</h5>
						@if(Session::has('success'))
							<div class="alert alert-success">
									{{ Session::get('success') }}
									@php
											Session::forget('success');
									@endphp
							</div>
						@endif
					</div>
					<div class="col-md-12 mb-3">
						<label for="no_po">No Po</label>
						<input type="text" class="form-control" id="no_po" placeholder="No Po" name="no_po" required="" value="{{ old('no_po') ?? '' }}">
						@if ($errors->has('no_po'))
							<span class="text-danger">{{ $errors->first('no_po') }}</span>
						@endif

					</div>

					<div class="col-md-12 mb-3">
						<label for="reciver">Reciver</label>
						<input type="text" class="form-control" id="reciver" placeholder="reciver" name="reciver" required="" value="{{ old('reciver') ?? '' }}">
						@if ($errors->has('reciver'))
							<span class="text-danger">{{ $errors->first('reciver') }}</span>
						@endif
					</div>

					<div class="col-md-12 mb-3">
						<label for="supplier">supplier</label>
						<select class="custom-select" name="supplier" required>
							<option selected value="">-- Choose --</option>
							<option value="CV. JODA JAYA ELECTRIC">CV. JODA JAYA ELECTRIC</option>
							<option value="PT. PLATINDO KARYA PRIMA">PT. PLATINDO KARYA PRIMA</option>
							<option value="PT. WAHANA DATARINDO SEMPURANA">PT. WAHANA DATARINDO SEMPURANA</option>
							<option value="PT. MICROREKSA INFONET">PT. MICROREKSA INFONET</option>
						</select>
						@if ($errors->has('supplier'))
							<span class="text-danger">{{ $errors->first('supplier') }}</span>
						@endif
					</div>

					<div class="col-md-12 mb-3">
						<label for="recived_date">Recived Date</label>
						<input type="date" class="form-control" id="recived_date" placeholder="Tanggal Terima Barang" name="recived_date" value="">
					</div>

					<div class="col-md-12 mb-3">
						<label for="destination">Destination</label>
						<select class="custom-select" name="destination" required>
							<option selected value="">-- Choose --</option>
							<option value="DNPI Pulogadung">DNPI Pulogadung</option>
							<option value="DNPI Krawang">DNPI Krawang</option>
						</select>
						@if ($errors->has('destination'))
							<span class="text-danger">{{ $errors->first('destination') }}</span>
						@endif
					</div>
				</div>
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection

