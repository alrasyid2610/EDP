@extends('layouts.main')
@section('content')

<x-com-modaldelete></x-com-modaldelete>
<x-com-modalpesan></x-com-modalpesan>

@if(Session::has('message'))
  <div class="modal" tabindex="-1" role="dialog" id="modalPesanEdit" data-show='true'>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>{{ Session::get('message') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endif

    <div class="row">
        <x-breadcrumb></x-breadcrumb>
        <div class="col-md-12 col-sm-12 mb-3">
            <div class="x_panel">
                <div class="x_title">
                    <h2> <small>Data surat jalan yang belum lengkap</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown" id="dropdown1">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    {{-- <a class="dropdown-item" href="/goods_come/technical_documents/create?d=4c1a69dd6d993dbe6ce16bc2408311f5">Condition 1</a> --}}
                                    <a class="dropdown-item" href="{{ route('technical_documents.create') }}">Condition 1</a>
                                </li>
                                <li>
                                    {{-- <a class="dropdown-item" href="/goods_come/technical_documents/create?d=1f95fe52c64a05b5ecc462b355f6d358">Condition 2</a> --}}
                                    <a class="dropdown-item" href="{{ route('technical_documents.create', ['d' => '1f95fe52c64a05b5ecc462b355f6d358']) }}">Condition 2</a>
                                </li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-sm table-striped table-hover" id="table-data">
                        <thead>
                            <tr>
                                <?php $no = 1; ?>
                                <th>No Doc</th>
                                <th>No Po</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Supplier</th>
                                <th>Reciver</th>
                                <th>Destination</th>
                                <th>Recived Date</th>
                                <th>Status</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) < 1)
                                <tr>
                                    <td colspan="8" class="text-center">Data tidak Di temukan</td>
                                </tr>
                            @else
                                @foreach ($data as $item)
                                    <tr id="{{ $item->id }}">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->supplier }}</td>
                                        <td>{{ $item->reciver }}</td>
                                        <td>{{ $item->destination }}</td>
                                        <td>
                                            @php
                                                echo date_format(date_create($item->recived_shipping_date), 'd-m-Y');
                                            @endphp
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-danger p-2"> {{ $item->status }} </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('technical_documents.create2', ['id_surat_jalan' => $item->id]) }}" class="btn btn-primary btn-sm">Lengkapi Surat Jalan</a>
                                            <a name="" id="" class="btn btn-info btn-sm" href="{{ route('shipping_documents.edit', ['shipping_document' => $item->id]) }}" role="button">Edit</a>

                                            
                                            {{-- <form action="" class="d-inline" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $item->id }}">

                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form> --}}
                                            {{-- <form action="{{ route('technical_documents.create2', ['id_surat_jalan' => $item->id ]) }}" method="POST"> @csrf <input
                                                  type="hidden" value="{{ $item->id }}" name="id_surat_jalan">
                                                <button class="btn btn-primary btn-sm" type="submit">Lengkapi Surat Jalan</button>
                                              </form> --}}
                                            <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'shipping_documents'" ></x-com-btn-trigger-modal-delete>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
   <script>
    $('document').ready(function() { 
      $('#modalPesanEdit').modal('show') 
    });
   </script>
@endsection