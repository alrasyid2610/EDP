@extends('layouts.main')
@section('content')

  {{-- {{ $data) }} --}}

  <x-com-modaldelete></x-com-modaldelete>
  <x-com-modalpesan></x-com-modalpesan>

  <div class="row d-block">
    <div class="title_left col-md-12">
      <h3>Barang Masuk <small> | <a href="{{ url('/barang_masuk/bon_teknik/?data=noComplete') }}" class="text-primary">Input Bon
            Teknik</a> |
          <a href="{{ url('/barang_masuk/bon_teknik/') }}" class="text-primary">View Data</a></small>  </h3>
    </div>

    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                  class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content" id="table">
          {{-- JIKA TIDAK ADA ACTION PADA INDEX BON TEKNIK MAKA TAMPILKAN SEMUA DATA YANG SUDAH COMPLETE (DATA SURAT JALAN DAN BON TEKNIK) --}}
          @if ( empty($action) ) 
            <span class="text-success">Data berikut adalah surat jalan yang sudah di lengkapi data bon teknik</span>
            <table class="table table-striped">
                <thead>
                  <tr> <?php $no = 1; ?> <th>#</th>
                    <th>No Bon</th>
                        <th>User</th>
                        <th>Departement</th>
                        <th>Description</th>
                        <th>Document Recipient</th>
                        <th>Recived Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> @if (count($data) < 1) <tr>
                    <td colspan="8" class="text-center">Data tidak Di temukan</td>
                    </tr> @else @foreach ($data as $item) <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $item->no_document }}</td>
                      <td>{{ $item->user }}</td>
                      <td>{{ $item->departement }}</td>
                      <td>{{ $item->description }}</td>
                      <td>{{ $item->document_recipient }}</td>
                      <td>{{ $item->recived_date }}</td>
                      <td>
                        <a name="" id="" class="btn btn-primary btn-sm"
                          href="{{ route('bon_teknik.edit', ['bon_teknik' => $item->id]) }}" role="button">Edit</a>
                        <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'bon_teknik'">
                        </x-com-btn-trigger-modal-delete>
                      </td>
                    </tr> <?php $no++; ?> @endforeach @endif </tbody>
            </table>
          @else 
              {{-- JIKA ACTION ADA, MAKA TAMPILKAN SURAT JALAN YANG BELUM DISERTAI DATA BON TEKNIK --}}
              <span class="text-warning">Data berikut adalah surat jalan yang belum di input bon teknik</span>
              <table class="table table-striped">
                <thead>
                  <tr> 
                    <?php $no = 1; ?> 
                    <th>#</th>
                    <th>No Po</th>
                    <th>Supplier</th>
                    <th>Penerima</th>
                    <th>Tujuan</th>
                    <th>Tanggal Terima</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @if (count($data) < 1) <tr>
                    <td colspan="8" class="text-center">Data tidak Di temukan</td>
                    </tr> 
                  @else
                     @foreach ($data as $item) <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $item->no_po }}</td>
                      <td>{{ $item->supplier }}</td>
                      <td>{{ $item->recive }}</td>
                      <td>{{ $item->destination }}</td>
                      <td>{{ $item->date_recived }}</td>
                      <td>
                        <a name="" id="" class="btn btn-primary btn-sm"
                          href="{{ route('bon_teknik.create') }}/{{ $item->id }}/  " role="button">Lengkapi Bon Teknik</a>
                        {{-- <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'bon_teknik'">
                        </x-com-btn-trigger-modal-delete> --}}
                      </td>
                    </tr> <?php $no++; ?> 
                    @endforeach 
                  @endif </tbody>
              </table>
          @endif
          

        </div>
      </div>
    </div>

    <div class="clearfix"></div>
  </div>

@endsection
