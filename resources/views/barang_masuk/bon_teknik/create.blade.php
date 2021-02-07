@extends('layouts.main')
@section('content')
<div class="row">
	<div class="title_left col-md-12">
    <h3>Barang Masuk <small> | <a href="{{ url('/barang_masuk/bon_teknik/create') }}" class="text-primary">Input Bon Teknik</a> | 
      <a href="{{ url('/barang_masuk/bon_teknik/') }}" class="text-primary">View Data</a> 	</h3>
	</div>

	<div class="col-md-8 col-sm-12 offset-md-2 ">

		
		<div class="dashboard_graph">
			<div class="row x_title">
				<div class="col-md-6">
					<h3>Form Input <small style="font-size: 12px">Input data sesuai dengan Bon Teknik</small></h3>
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
			

			<form method="POST" action=" {{ route('bon_teknik.store') }} ">
				@csrf
				<div class="form-row mb-4">
					<div class="col-12">
						<h5 class="m-0 mb-2 font-italic font-weight-bold">Data Bon Teknik</h5> 
						{{-- Jika berhasil input --}}
						@if ( session('succsess') )
						
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<strong>{{ session('succsess') }}</strong>
							</div>
							
						@endif
						
					</div>
					<div class="col-lg-6 mb-3">
						<label for="no_po ">No Bon Teknik</label>
						<input type="text" class="form-control" id="no_bon" placeholder="No Bon Teknik" name="no_bon" required="">
					</div>

					<div class="col-lg-6 mb-3">
						<label for="tgl_buat">Tanggal Buat</label>
						<input type="date" class="form-control" id="tgl_buat" placeholder="Tanggal Buat Bon" name="tgl_buat" required="">
					</div>

					<div class="col-lg-6 mb-3">
						<label for="user">User</label>
						<input type="text" class="form-control" id="user" placeholder="User" name="user" required="">
					</div>

					<div class="col-lg-6 mb-3">
						<label for="dept">Dept / Section</label>
						<input type="text" class="form-control" id="dept" placeholder="Dept / Section" name="dept" required="">
					</div>

					<div class="col-md-12 mb-3">
						<label for="keterangan">Keterangan</label>
						<input type="text" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan" required="">
					</div>

					<div class="col-md-12 mb-3">
						<label for="tgl_terima_bon">Tanggal Terima Bon</label>
						<input type="date" class="form-control" id="tgl_terima_bon" placeholder="Tanggal Buat Bon" name="tgl_terima_bon" required="">
					</div>

					<div class="col-md-12 mb-3">
						<label for="penerima_bon">Penerima Bon</label>
						<input type="text" class="form-control" id="penerima_bon" placeholder="Penerima Bon" name="penerima_bon" required="">
					</div>

					<div class="col-md-12 mb-3">
						<label for="pelaksana">Pelaksana</label>
						<input type="text" class="form-control" id="pelaksana" placeholder="Pelaksana" name="pelaksana" required="">
					</div>

					

					{{-- <div class="col-md-12 mb-3">
						<label for="supplier">supplier</label>
						<select class="custom-select" name="supplier">
							<option selected>-- Choose --</option>
							<option value="CV. JODA JAYA ELECTRIC">CV. JODA JAYA ELECTRIC</option>
						</select>
					</div> --}}

					<div class="col-md-12 mb-3">
						<label for="tgl_terima">Tanggal terima barang</label>
						<input type="date" class="form-control" id="tgl_terima" placeholder="Tanggal Terima Barang" name="tgl_terima" required="">
					</div>

				</div>
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
		</div>
		

		
	</div>
</div>
@endsection