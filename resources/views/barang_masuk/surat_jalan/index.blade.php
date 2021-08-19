@extends('layouts.main')
@section('content')

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




{{-- {{ $data) }} --}}
<x-com-modaldelete></x-com-modaldelete>
<x-com-modalpesan></x-com-modalpesan>

<div class="row d-block">
  <x-breadcrumb></x-breadcrumb>
  
  <div class="col-md-12 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Shipping Documents Data <small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li class="dropdown" id="dropdown1">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">All Data</a>
                <a class="dropdown-item" href="google.com" id="filter1">Completed Data</a>
                <a class="dropdown-item" href="#" id="filter2">Data Without Technical Documents</a>
              </div>
          </li>
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          {{-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> --}}
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        
        <table id="table-data" class="table table-sm table-striped table-bordered style1 rounded" style="width:100%; border-radius: 8px;">

        </table>
        
        {{-- <x-data-ship-doc :dataTable="$data"></x-table-ship-doc> --}}

      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>

@endsection

@section('script')

  @php
    if (session('id')) {
      echo " <script>
        $('document').ready(function() {
                $('#modalPesanEdit').modal('show')
            });
        
          var offset = $('#" . session('id') . " ').offset()
          offset.left -= 20;
          offset.top -= 20;

            $('html, body').animate({
                scrollTop: offset.top,
                scrollLeft: offset.left
            });
          
        document.getElementById('" . session('id') . "').scrollIntoView({behavior: 'smooth'});

        $('#" . session('id') . "  ').css('background-color', '#b6ffbc')

        setTimeout(function(){ 
          $('#" . session('id') . " ').css('background-color', 'white')
        }, 3000);
      </script>";
    }
   
  @endphp

  

  <script>
    $('#filter1').on('click', function(e) {
      e.preventDefault();

      console.log("asfasf");
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
        var urlAjax = `{{ route("api_shipping_documents") }}`;
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