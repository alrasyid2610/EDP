@extends('layouts.main')
@section('content')

<div class="row x_panel">
  <div class="col-12">
    
    <form action="{{ route('tanya.store') }}" method="POST">
      @csrf
      {{-- <input type="hidden" name=""> --}}
      <div class="form-row">
          <div class="form-group col-12">
            <label for="">Pertanyaan</label>
            <textarea class="form-control" name="pertanyaan" id="" rows="3"></textarea>
          </div>
        
        <div class="form-group col-6">
          <label for="">Kategori</label>
          <select class="form-control" name="kategori" id="">
            <option value="">-- Pilih Kategori --</option>
            <option value="Karir">Karir</option>
            <option value="Cinta">Cinta</option>
            <option value="Financial">Financial</option>
          </select>
        </div>

        <div class="form-group col-6">
          <label for="">Pilih User</label>
          <select class="form-control" name="user" id="">
            <option value="{{ $name }}">{{ $name }}</option>
            <option value="Anonymus">Anonymus</option>
          </select>
        </div>
      </div>
      <button type="submit" name="submit" id="" class="btn btn-primary" btn-lg btn-block">Tanya</button>
    </form>
  </div>
</div>

@foreach ($data_pertanyaan as $item)
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>{{ $item->username }}</h2>
            <span>{{ $item->tgl_pertanyaan }}</span>
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
              <!-- /MAIL LIST -->
              <!-- CONTENT MAIL -->
              <div class="col-sm-12 mail_view">
                <div class="inbox-body">
                  {{-- <div class="mail_heading row">
                    <div class="col-md-12 text-right">
                      <p class="date"> 8:02 PM 12 FEB 2014</p>
                    </div>
                    <div class="col-md-12">
                      <h4> Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci. Donec
                        ultrices faucibus rutrum.</h4>
                    </div>
                  </div> --}}
                  {{-- <div class="sender-info">
                    <div class="row">
                      <div class="col-md-12">
                        <strong>{{ $item->username }}</strong>
                        <span>(jon.doe@gmail.com)</span> to <strong>me</strong>
                        <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                      </div>
                    </div>
                  </div> --}}
                  <div class="view-mail">
                    {{ $item->pertanyaan }}
                  </div>
                  {{-- <div class="attachment">
                    <p>
                      <span><i class="fa fa-paperclip"></i> 3 attachments — </span>
                      <a href="#">Download all attachments</a> | <a href="#">View all images</a>
                    </p>
                  </div> --}}
                  <div class="btn-group">
                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
                    {{-- <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip"
                      data-original-title="Forward"><i class="fa fa-share"></i></button> --}}
                    {{-- <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip"
                      data-original-title="Print"><i class="fa fa-print"></i></button> --}}
                    
                      @if ($item->user_id == $id_user)
                        <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip"
                        data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
                      @endif
                  </div>
                </div>
              </div>
              <!-- /CONTENT MAIL -->
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
  {{-- <div class="page-title">
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
  </div> --}}

{{-- <div class="col-md-12 col-sm-12 ">
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
            
        </div>
    </div>
</div> --}}
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
        var urlAjax = `{{ route("ajaxComputer") }}`;
        $.ajax({
            url: urlAjax, //or you can use url: "company/"+id,
            type: "GET",
            success: function (response) {
                $("#datatable-buttons").html(response.html);
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
