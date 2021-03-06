@extends('layouts.main')
@section('content')


{{-- {{ $data) }} --}}
<x-com-modaldelete></x-com-modaldelete>
<x-com-modalpesan></x-com-modalpesan>

<div class="row d-block">
  <div class="title_left col-md-12">
    <h3>Goods Come <small> | <a href="{{ url('/barang_masuk/shipping_documents/create') }}" class="text-primary">Enter Shipping Documents</a> | 
      <a href="{{ url('/barang_masuk/shipping_documents/') }}" class="text-primary">View Data</a> </small>	</h3>
	</div>
  </div>
  
  <div class="col-md-10 col-sm-2 offset-1">
    <div class="x_panel">
      <div class="x_title">
        <h2>Shipping Documents Data <small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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

        <table class="table table-striped">
          <thead>
            <tr>
              <?php  $no = 1; ?>
              <th>#</th>
              <th>No Po</th>
              <th>Supplier</th>
              <th>Reciver</th>
              <th>Destination</th>
              <th>Recived Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($data) < 1)

              <tr>
                <td colspan="7" class="text-center" >Data tidak Di temukan</td>
              </tr>
                
            @else
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->no_po }}</td>
                    <td>{{ $item->supplier }}</td>
                    <td>{{ $item->reciver }}</td>
                    <td>{{ $item->destination }}</td>
                    <td>{{ $item->recived_date }}</td>
                    <td>
                      <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('shipping_documents.edit', ['shipping_document' => $item->id]) }}" role="button">Edit</a>                      
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

  <div class="clearfix"></div>
</div>

@endsection