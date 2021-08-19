@extends('layouts.main')
@section('content')
  <div class="page-title">
    <div class="title_left col-md-12">
      <h3>COI <small> | <a href="{{ route('computers.create') }}" class="text-primary">Input Komputer</a> |
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
            <h2>COI <small>Coi Double</small></h2>
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
            @if(session()->has('message'))
              <div class="row">
                <div class="col-12">
                  <div class="alert alert-success" role="alert">
                    {{-- {{ $message }} --}}
                    {!! session()->get('message') !!}
                  </div>
                </div>
              </div>
            @endif

            <form action="{{ route('coi_action') }}" method="POST">
              @csrf
              <div class="form-row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="coi">No COI</label>
                    <input 
                      type="text" 
                      class="form-control" 
                      id="COFCode" 
                      name="COFCode"
                      placeholder="No COI">
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label for="fi">NO FI</label>
                    <input 
                      type="text"
                      name="CFINo"
                      class="form-control"
                      id="CFINo"
                      placeholder="FI No">
                  </div>
                </div>
              </div>

              <button 
              class="btn btn-sm btn-primary"
              type="submit"
              {{-- type="button" --}}
              {{-- onclick="checkData(this)" --}}
              >Submit</button>
              
            </form>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div class="form-check d-inline">
                            <label class="form-check-label">
                            </label>
                        </div>
                        <table 
                          id="table-data2" class="table table-sm table-striped table-bordered style1 rounded" style="width:100%; border-radius: 8px;">
                          <thead>
                            <tr>
                              <th>
                               COFCode 
                              </th>
                              <th>
                               COFCode 
                              </th>
                            </tr>
                          </thead>
                          <tbody id="table-body-data2">
                            
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
  <script>
    function checkData(el) {
      let CFINo = $('#CFINo').val();
      let COFCode = $('#COFCode').val();
      
      axios.get("/coi_check/" + CFINo + '/' + COFCode)
        .then(response => {
          let TFinalInspection0 = response.data.TFinalInspection[0];
          let TFinalInspection1 = response.data.TFinalInspection[1];

          console.log();
          
          if (TFinalInspection1) {
            JSON.parse(TFinalInspection1).forEach(element => {
              $('#table-body-data2').append(`
                <tr>
                  <td>
                    ${ element.COFCode }
                  </td>
                </tr>
              `);
            });
            
          }





        table = $("#table-data2").on('init.dt', function () {
          // vueGo = true;
          data2 = true;
          // console.log(data2);

        }).dataTable({
            // "processing": true,
            // "serverSide": true,
            "scrollY": 400,
            "scrollX": true,
            "scrollCollapse": true,
            "autoFill": true,
            // "select": "multi",
            // "paging": false,
            "paging" : true,
            "ordering" : true,
            // "scrollCollapse" : true,
            "searching" : true,
            // "columnDefs" : [{"targets":3, "type":"date-eu"}],
            "bInfo": true,
            "orderMulti": true,
            // "fixedHeader": true,
            dom: "Blfrtip",
            buttons: [
                {
                    extend: "copy",
                    className: "btn-sm",
                },
                {
                    extend: "csv",
                    className: "btn-sm",
                },
                {
                    extend: "excel",
                    className: "btn-sm",
                },
                {
                    extend: "pdfHtml5",
                    className: "btn-sm",
                },
                {
                    extend: "print",
                    className: "btn-sm",
                },
            ],
            responsive: true,
            // "ajax" : urlAjax
        });
        });
    }
  </script>
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
        
    </script>
@endsection
