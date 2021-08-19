@extends('layouts.main')
@section('content')
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

<div class="col-md-6 col-sm-12 col-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Computer <small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                  <a class="btn btn-sm btn-success btn-light px-2" href="{{ route('computers.edit', $data->id) }}?flag=computer_incomplete"><i class="fa fa-pencil text-white"></i></a>
              </li>
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
            <!------ Include the above in your HEAD tag ---------->
                <div class="row">
                  <div class="col-12 col-md-4"><span>PC Name</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->pc_name}}</div>
                </div>
                
                <div class="row">
                  <div class="col-12 col-md-4"><span>Brand</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->pc_brand}}</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>IP</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->ip}}</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>PC Location</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->location}}</div>
                </div>

                <div class="row mt-4">
                  <div class="col-12" style='font-size: 18px'><span>  Hardware Specifications </span></div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>Processor</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->processor}}</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>OS</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->operating_system}}</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>Ram</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->ram }} GB</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>HDD</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->hdd }} GB</div>
                </div>

                <div class="row mt-4">
                  <div class="col-12" style='font-size: 18px'><span>  Fix Asset </span></div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>Fix Asset Number</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->fix_asset->fixed_asset_number }}</div>
                </div>

                {{-- <div class="row">
                  <div class="col-12 col-md-4"><span>No Fix Asset</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->fix_asset }}</div>
                </div> --}}

                <div class="row">
                  <div class="col-12 col-md-4"><span>EDP Fix Asset</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->fix_asset->edp_fixed_asset_number }}</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>Fix Asset Date</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">{{$data->fix_asset->fixed_asset_date }}</div>
                </div>



        </div>
    </div>
</div>
@endsection

@section('style')
    <style>
      .row {
        margin-bottom: 8px;
        border-bottom: 1px solid rgb(206, 206, 206);
        padding-bottom: 8px;
      }

      .value {
        color: #0062cc;
        font-weight: bold;
      }

      .row span {
        font-weight: bold;
      }
    </style>
@endsection
