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
		<x-breadcrumb2></x-breadcrumb2>

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
           <table class="table table-striped" id='table-data'>
              <thead>
                <tr> <?php $no = 1; ?> 
                  <th>#</th>
                  <th>No Document Technical</th>
                  <th>User</th>
                  <th>Departement</th>
                  <th>Document Recipent</th>
                  <th>Create Date</th>
                  <th>Description</th>
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
                    <td>{{ $item->no_document }}</td>
                    <td>{{ $item->user }}</td>
                    <td>{{ $item->departement }}</td>
                    <td>{{ $item->document_recipient }}</td>
                    <td>{{ $item->create_date }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                      {{-- <form action="{{ route('shipping_documents.create2', ['id_surat_jalan' => $item->id ]) }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id_technical_document">
                        <button class="btn btn-primary btn-sm" type="submit">Lengkapi Bon Teknik</button>
                      </form> --}}

                      <a href="{{ route('shipping_documents.create2', ['id_technical_document' => $item->id ]) }}" class="btn btn-primary btn-sm">Lengkapi Bon Teknik</a>
                      <a name="" id="" class="btn btn-success btn-sm" href="{{ route('technical_documents.edit', ['technical_document' => $item->id]) }}" role="button">Edit</a>
                      <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'technical_documents'" ></x-com-btn-trigger-modal-delete>
                      
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

	
</div>
@endsection

@section('script')
   <script>
    $('document').ready(function() { 
      $('#modalPesanEdit').modal('show') 
    });
   </script>
@endsection

