@extends('layouts.main')
@section('content')

{{-- {{ $data) }} --}}

<div class="row d-block">
  <div class="title_left col-md-12">
    <h3>Barang Masuk <small> | <a href="{{ url('/barang_masuk/surat_jalan/create') }}" class="text-primary">Input Surat Jalan</a> | 
      <a href="{{ url('/barang_masuk/surat_jalan/') }}" class="text-primary">View Data</a> 	</small></h3>
  </div>
  
  <div class="col-md-12 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Stripped table <small>Stripped table subtitle</small></h2>
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
      <div class="x_content">

        <table class="table table-striped">
          <thead>
            <tr>
              <?php  $no = 1; ?>
              <th>#</th>
              <th>No Bon</th>
              <th>User</th>
              <th>Dept</th>
              <th>Keterangan</th>
              <th>Penerima Bon</th>
              <th>Tanggal Terima</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($data) < 1)

              <tr>
                <td colspan="8" class="text-center" >Data tidak Di temukan</td>
              </tr>
                
            @else
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->no_bon }}</td>
                    <td>{{ $item->user }}</td>
                    <td>{{ $item->dept }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->penerima_bon }}</td>
                    <td>{{ $item->tgl_terima_bon }}</td>
                    <td>
                      <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('surat_jalan.edit', ['surat_jalan' => $item->id]) }}" role="button">Edit</a>

                      <form method="POST" action="{{ route('bon_teknik.destroy', $item->id) }}" class="d-inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" value="Delete user">
                      </form>
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