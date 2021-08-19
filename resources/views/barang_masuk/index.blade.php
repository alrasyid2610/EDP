@extends('layouts.main')
@section('content')

<x-com-modaldelete></x-com-modaldelete>
<x-com-modalpesan></x-com-modalpesan>

  <div class="page-title">
    <div class="title_left col-md-12">
      <h3>Komputer <small> | <a href="{{ route('computers.create') }}" class="text-primary">Input Komputer</a> |
        <a href="{{ route('computers.index') }}" class="text-primary">View Data</a> </small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5  form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Button Example <small>Users</small></h2>
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
        <div class="x_content">
            <div class="row">
                @if(Session::has('success')) 
                <div class="col-12">
                  <div class="alert alert-success"> {{ Session::get('success') }} 
                      @php
                        Session::forget('success'); 
                      @endphp 
                  </div> 
                </div>
                @endif 
                <div class="col-sm-12">
                  @method('DELETE')
                  @csrf
                    <div class="card-box table-responsive">
                        <table id="table-data" class="table table-sm table-striped table-bordered style1 rounded" style="width:100%; border-radius: 8px;">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('data-table')
    <!-- Datatables -->

        <script src=" {{ asset("/admin/vendors/datatables.net/js/jquery.dataTables.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/jszip/dist/jszip.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/pdfmake/build/pdfmake.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/pdfmake/build/vfs_fonts.js") }}"></script>

    <script>
        var urlAjax = `{{ route("ajaxGoodCome") }}`;
        var token = `{{ csrf_token() }}`;
        $(document).ready(function() {

          $.ajax({
              url: urlAjax, //or you can use url: "company/"+id,
              type: "GET",
              data: {
                'token' : token
              },
              success: function (response) {
                  $("#table-data").html(response.html);
                  // conso
                  init_DataTables();
                  // le.log(response);
              },

              error: function (msg) {
                  console.log(msg)
              },
          });
        })
        

    </script>
@endsection
@section('script')
   <script>
    $('document').ready(function() { 
      $('#modalPesanEdit').modal('show') 
    });
   </script>
@endsection

