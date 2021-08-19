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

    <page size="A4" id="container-box" class="container" style="font-family: serif">
      <div class="row text-dark con-header">
        <div class="col-12 text-right">
          <span class="mt-1 d-block"><u> &nbsp; Bon No : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span> 
          <span class=" d-block"><u> &nbsp; LPM No : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span> 
        </div>
        <div class="col-12">
          <h2 style="font-family: serif; font-size: 24pt; text-decoration: underline" class="text-center mt-4 font-weight-bold">Bon Permintaan Perbaikan . Pembelian</h2>
          <p style="font-family: serif;  text-decoration: underline; font-size: 20px" class="text-center">Jika Tidak ada Tanda tangan yang Bertanggung -jawab, tidak berlaku</p>
        </div>
      </div>
    </page>

    {{-- <page size="A4"></page> --}}
    {{-- <page size="A4"></page> --}}
    

    <button id="print">Print</button>
  </div>

@endsection

@section('script')
  <script>
    $('document').ready(function() {
        $('#modalPesanEdit').modal('show')
    });
  </script>

  <script src="{{ asset('/js/jquery-print/jQuery.print.min.js') }}"></script>
  <script>
    $("#print").click(() => {
      $("#container").print(
        {
                        //Use Global styles
                        globalStyles : false,
                        //Add link with attrbute media=print
                        mediaPrint : false,
                        //Custom stylesheet
                        stylesheet : "{{ asset('css/print.css') }}",
                        //Print in a hidden iframe
                        iframe : false,
                        //Don't print this
                        noPrintSelector : ".avoid-this",
                        //Add this at top
                        // prepend : "Hello World!!!<br/>",
                        //Add this on bottom
                        // append : "<span><br/>Buh Bye!</span>",
                        //Log to console when printing is done via a deffered callback
                        deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                    }
      )
    })
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

@section('style')
  <style>
    body {
      background: rgb(204,204,204); 
    }
    page[size="A4"] {
      background: rgb(255, 255, 255);
      width: 21cm;
      height: 29.7cm;
      display: block;
      margin: 0 auto;
      margin-bottom: 0.5cm;
      margin-top: 80px;
      box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }

    .box-con  {
      padding: 2px;
      font-size: 16pt;
      width: 100%;
      /* height: 3200px; */
      border: 1px solid black;
    }
    
    @media print {
      page[size="A4"] {
        margin: 0;
        box-shadow: 0;
      }
    }
  </style>
@endsection
