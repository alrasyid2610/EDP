@extends('layouts.main')
@section('content')

  {{-- {{ $data) }} --}}

  @if (session('message'))
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
              <p>{{ session('message') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>
@endif

  <x-com-modaldelete></x-com-modaldelete>
  <x-com-modalpesan></x-com-modalpesan>

  <div class="row d-block">
    <x-breadcrumb2></x-breadcrumb2>

    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data<small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown" id="dropdown1">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                  class="fa fa-wrench"></i></a>
              @if ( empty($action) )
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <label class="dropdown-item" for="input1" >
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="input" id="input1" value="checkedValue" checked>
                        Display 1
                    </div>
                  </label>
                  <label class="dropdown-item" for="input2" >
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="input" id="input2" value="checkedValue">
                        Display 2
                    </div>
                  </label>
                  {{-- <a class="dropdown-item" href="#">Input 2</a> --}}
                </div>
              @else
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <label class="dropdown-item" for="input1" >
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="input" id="input1" value="checkedValue" checked>
                        Input 1
                    </div>
                  </label>
                  <label class="dropdown-item" for="input2" >
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="input" id="input2" value="checkedValue">
                        Input 2
                    </div>
                  </label>
                  {{-- <a class="dropdown-item" href="#">Input 2</a> --}}
                </div>
              @endif
              
            </li>
            {{-- <li><a class="close-link"><i class="fa fa-close"></i></a> --}}
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content" id="table">
          {{-- JIKA TIDAK ADA ACTION PADA INDEX BON TEKNIK MAKA TAMPILKAN SEMUA DATA YANG SUDAH COMPLETE (DATA SURAT JALAN DAN BON TEKNIK) --}}
          @if ( empty($action) ) 
            <span class="text-success">Data berikut adalah surat jalan yang sudah di lengkapi data bon teknik</span>
            <table id="table-data" class="table table-sm table-striped table-bordered style1 rounded" style="width:100%; border-radius: 8px;">
                
            </table>
          @endif
          

        </div>
      </div>
    </div>

    <div class="clearfix"></div>
  </div>

@endsection

@section('script')
  <script>
    $('document').ready(function() {
        $('#modalPesanEdit').modal('show')
    });
  </script>
@endsection

@section('data-table')
    <!-- Datatables -->

        <script src=" {{ asset("/admin/vendors/datatables.net/js/jquery.dataTables.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
        
        <script src=" {{ asset("/admin/vendors/datatables.net/js/moment.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net/js/datetime-moment.js") }}"></script>
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
        $.fn.dataTable.moment( 'DD-MM-YYYY' );
        var urlAjax = `{{ route("getDataBonTeknikAll") }}`;
        $.ajax({
            url: urlAjax, //or you can use url: "company/"+id,
            type: "GET",
            success: function (response) {
                $("#table-data").html(response.html);
                // conso
                init_DataTables();
                // le.log(response);
            },

            error: function (msg) {
                // console.log(msg)
            },
        });

    </script>
@endsection
