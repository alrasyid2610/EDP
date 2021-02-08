@extends('layouts.main')
@section('content')



<div class="row">
	<div class="title_left col-md-12">
    <h3>Barang Masuk <small> | <a href="{{ url('/barang_masuk/surat_jalan/create') }}" class="text-primary">Input Surat Jalan</a> | 
      <a href="{{ url('/barang_masuk/surat_jalan/') }}" class="text-primary">View Data</a> 	</h3>
	</div>

	<div class="col-md-8 col-sm-12 offset-md-2 ">

		
		<div class="dashboard_graph">
			<div class="row x_title">
				<div class="col-md-6">
					<h3>Form Input <small style="font-size: 12px">Input data sesuai dengan Surat Jalan</small></h3>
				</div>
				
			</div>

			{{-- <form>
				<div class="form-group">
					<label for="exampleFormControlInput1">Email address</label>
					<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Example select</label>
					<select class="form-control" id="exampleFormControlSelect1">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect2">Example multiple select</label>
					<select multiple class="form-control" id="exampleFormControlSelect2">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Example textarea</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
			</form> --}}
			<form method="POST" action=" {{ route('surat_jalan.store') }} ">
				@csrf
				<div class="form-row mb-4">
					<div class="col-12">
						<h5 class="m-0 mb-2 font-italic font-weight-bold">Data Surat Jalan</h5>
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
						<label for="penerima">Penerima Barang</label>
						<input type="text" class="form-control" id="penerima" placeholder="penerima" name="penerima" required="" value="{{ old('penerima') ?? '' }}">
						@if ($errors->login->has('penerima'))
							<span class="text-danger">{{ $errors->login->first('penerima') }}</span>
						@endif
					</div>

					<div class="col-md-12 mb-3">
						<label for="supplier">supplier</label>
						<select class="custom-select" name="supplier" required>
							<option selected value="">-- Choose --</option>
							<option value="CV. JODA JAYA ELECTRIC">CV. JODA JAYA ELECTRIC</option>
						</select>
						@if ($errors->login->has('supplier'))
							<span class="text-danger">{{ $errors->login->first('supplier') }}</span>
						@endif
					</div>

					<div class="col-md-12 mb-3">
						<label for="tgl_terima">Tanggal terima barang</label>
						<input type="date" class="form-control" id="tgl_terima" placeholder="Tanggal Terima Barang" name="tgl_terima" value="">
					</div>

					<div class="col-md-12 mb-3">
						<label for="tujuan">Tujuan</label>
						<select class="custom-select" name="tujuan" required>
							<option selected value="">-- Choose --</option>
							<option value="DNPI Pulogadung">DNPI Pulogadung</option>
							<option value="DNPI Krawang">DNPI Krawang</option>
						</select>
						@if ($errors->login->has('tujuan'))
							<span class="text-danger">{{ $errors->login->first('tujuan') }}</span>
						@endif
					</div>
				</div>
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
		</div>



		
	</div>
</div>
@php
dd(session()->all());
@endphp		
@endsection
