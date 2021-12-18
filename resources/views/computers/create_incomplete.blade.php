@extends('layouts.main')
@section('content')

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

  @php
      $title = "Form Input";
      $route = 'computers.store';
  @endphp
  <x-table-computer :title="$title" :route="$route" :dataSection="$data_section"></x-table-computer>

@endsection

  @section('script')
    <script>
      $('#pc_name').on('input', function() {
        let value = $(this).val();
        var smallText = $(this).next();
        var result = '';

        if (value == '') {
          smallText.removeClass('d-block');
          smallText.addClass('d-none');
          smallText.html('');
        } else {
            axios
              .get('/check_pc_name/' + value)
              .then( response => {
                result = response.data
                if (result == 0) {
                  smallText.removeClass('text-danger')
                  smallText.addClass('d-block text-success');
                  smallText.html('PC name valid')
                } else if (result == 1) {
                  smallText.removeClass('text-success')
                  smallText.addClass('d-block text-danger');
                  smallText.html('PC name sudah terdaftar')
                }
              })
        }

      });
    </script>

    <script>
    $('document').ready(function() { 
      $('#modalPesanEdit').modal('show') 
    });
   </script>
  @endsection