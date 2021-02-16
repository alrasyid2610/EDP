@extends('layouts.main')
@section('content')
  <div class="row">
    <div class="title_left col-md-12">
      <h3>Barang Masuk <small> | <a href="{{ url('/barang_masuk/bon_teknik/?data=noComplete') }}" class="text-primary">Input
            Bon Teknik</a> |
          <a href="{{ url('/barang_masuk/bon_teknik/') }}" class="text-primary">View Data</a> </small> </h3>
    </div>

    <div class="col-md-8 col-sm-12 offset-md-2 ">


      <div class="dashboard_graph">
        <div class="row x_title">
          <div class="col-md-6">
            <h3>Form Input <small style="font-size: 12px">Input data sesuai dengan Bon Teknik</small></h3>
          </div>

        </div>

        <form method="POST" action=" {{ route('bon_teknik.store') }} ">
          @csrf
          <div class="form-row mb-4">
            <div class="col-12">
              <h5 class="m-0 mb-2 font-italic font-weight-bold">Data Bon Teknik</h5>
              <h6>Tambahkan data Bon Teknik pada surat jalan <a href=" {{ route('surat_jalan.show', ['surat_jalan' => request('id_surat_jalan') ]) }} " style="color: blue"> {{ request('id_surat_jalan') }} </a></h6>
              {{-- Jika berhasil input --}}
              @if (Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                  @php
                    Session::forget('success');
                  @endphp
                </div>
              @endif

            </div>
            <div class="col-lg-6 mb-3">
              <label for="no_bon">No Bon Teknik</label>
              <input type="text" class="form-control" id="no_bon" placeholder="No Bon Teknik" name="no_bon" required=""
                value="{{ old('no_bon') ?? '' }}">
              @if ($errors->has('no_bon'))
                <span class="text-danger">{{ $errors->first('no_bon') }}</span>
              @endif
            </div>

            <div class="col-lg-6 mb-3">
              <label for="tgl_buat">Tanggal Buat</label>
              <input type="date" class="form-control" id="tgl_buat" placeholder="Tanggal Buat Bon" name="tgl_buat"
                required="">
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
              <label for="dept">Dept / Section</label>
              <input type="text" class="form-control" id="dept" placeholder="Dept / Section" name="dept" required=""
                value="{{ old('dept') ?? '' }}">
              @if ($errors->has('dept'))
                <span class="text-danger">{{ $errors->first('dept') }}</span>
              @endif
            </div>

            <div class="col-md-12 mb-3">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan"
                required="" value="{{ old('keterangan') ?? '' }}">
              @if ($errors->has('keterangan'))
                <span class="text-danger">{{ $errors->first('keterangan') }}</span>
              @endif
            </div>

            <div class="col-md-12 mb-3">
              <label for="tgl_terima_bon">Tanggal Terima Bon</label>
              <input type="date" class="form-control" id="tgl_terima_bon" placeholder="Tanggal Buat Bon"
                name="tgl_terima_bon" required="">
            </div>

            <div class="col-md-12 mb-3">
              <label for="penerima_bon">Penerima Bon</label>
              <input type="text" class="form-control" id="penerima_bon" placeholder="Penerima Bon" name="penerima_bon"
                required="" value="{{ old('penerima_bon') ?? '' }}">
              @if ($errors->has('penerima_bon'))
                <span class="text-danger">{{ $errors->first('penerima_bon') }}</span>
              @endif
            </div>

            <div class="col-md-12 mb-3">
              <label for="pelaksana">Pelaksana</label>
              <input type="text" class="form-control" id="pelaksana" placeholder="Pelaksana" name="pelaksana" required=""
                value="{{ old('pelaksana') ?? '' }}">
              @if ($errors->has('pelaksana'))
                <span class="text-danger">{{ $errors->first('pelaksana') }}</span>
              @endif
            </div>



            {{-- <div class="col-md-12 mb-3">
						<label for="supplier">supplier</label>
						<select class="custom-select" name="supplier">
							<option selected>-- Choose --</option>
							<option value="CV. JODA JAYA ELECTRIC">CV. JODA JAYA ELECTRIC</option>
						</select>
					</div> --}}
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>



    </div>
  </div>
@endsection
