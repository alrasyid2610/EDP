@extends('layouts.main')
@section('content')
  <div class="row">
    <div class="title_left col-md-12">
      <h3>Barang Masuk <small>> <a href="{{ url('/barang_masuk/bon_teknik/input') }}" class="text-primary">Input Bon
            Teknik</a> </h3>
    </div>

    <div class="col-md-8 col-sm-12 offset-md-2 ">


      <div class="dashboard_graph">
        <div class="row x_title">
          <div class="col-md-6">
            <h3>Form Input <small style="font-size: 12px">Input data sesuai dengan Bon Teknik</small></h3>
          </div>

        </div>

        <form method="POST" action="inventory_prog.php">
          <div class="form-row mb-4">
            <div class="col-12">
              <h5 class="m-0 mb-2 font-italic font-weight-bold">Data Bon Teknik</h5>
            </div>
            <div class="col-md-12 mb-3">
              <label for="no_bon">No Bon</label>
              <input type="text" class="form-control" id="no_bon" placeholder="No Bon" name="no_bon" required="">
            </div>

            <div class="col-md-12 mb-3">
              <label for="user">Diminta Oleh</label>
              <input type="text" class="form-control" id="user" placeholder="Nama pembuat Bon" name="user" required="">
            </div>

            <div class="col-md-12 mb-3">
              <label for="dept">Section</label>
              <input type="text" class="form-control" id="dept" placeholder="Section" name="dept" required="">
            </div>

            <div class="col-md-12 mb-3">
              <label for="tgl_buat">Tanggal Buat Bon</label>
              <input type="date" class="form-control" id="tgl_buat" placeholder="Tanggal Buat Bon" name="tgl_buat"
                required="">
            </div>

            <div class="col-md-12 mb-3">
              <label for="keterangan">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="2" class="form-control"></textarea>
            </div>

            <div class="col-md-12 mb-3">
              <label for="penerima_bon">Penerima Bon</label>
              <input type="text" class="form-control" id="penerima_bon" placeholder="Penerima Bon" name="penerima_bon"
                required="">
            </div>

            <div class="col-md-12 mb-3">
              <label for="dilakukan_oleh">Dilakukan Oleh</label>
              <input type="text" class="form-control" id="dilakukan_oleh" placeholder="Dilakukan Oleh"
                name="dilakukan_oleh" required="">
            </div>

            <div class="col-md-12 mb-3">
              <label for="tgl_terima_bon">Tanggal Terima Bon</label>
              <input type="date" class="form-control" id="tgl_terima_bon" placeholder="date" name="tgl_terima_bon"
                required="">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>



    </div>
  </div>
@endsection
