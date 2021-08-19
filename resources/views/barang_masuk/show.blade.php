@extends('layouts.main')
@section('content')
{{-- {{ dd($data) }} --}}
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
{{-- {{ dd($data) }} --}}
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="row">
        <div class="col-md-6 col-sm-12 "">
          <div class="x_panel" style="min-height: 300px">
              <div class="x_title">
                  <h2>Surat Jalan</h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link2"><i class="fa fa-chevron-up"></i></a>
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

                <div class="row">
                  <div class="col-md-4 col-4">
                    No Po
                    <button onclick="generatePDF()" class="btn btn-sm btn-primary">PDF</button>
                    <div id="id_good_come" data='{{ $id_good_come }}'></div>
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[0]->no_po }}
                  </div>
                </div>
                  
                <div class="row">
                  <div class="col-md-4 col-4">
                    Supplier
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[0]->supplier }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Item
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[0]->item }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Qty
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[0]->qty }}
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4 col-4">
                    Reciver
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[0]->reciver }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Date
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[0]->recived_shipping_date }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Destination
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[0]->destination }}
                  </div>
                </div>
              </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-12 ">
          <div class="x_panel" style="min-height: 300px">
              <div class="x_title">
                  <h2>Bon Teknik</h2>
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
                  <div class="col-md-4 col-4">
                    No Bon Teknik
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[1]->no_document }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Pembuat Bon
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[1]->user }} 
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Section
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[1]->departement }} 
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Tanggal Buat
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[1]->create_date }} 
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Description
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[1]->description }} 
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Penerima Bon
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[1]->document_recipient }} 
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-4 col-4">
                    Tanggal Terima Bon
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[1]->recived_date }} 
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-4">
                    Pelaksana
                  </div>
                  <div class="col-md-6 col-8">
                    : {{ $data[1]->executor }} 
                  </div>
                </div>

                

                
              </div>
          </div>
        </div>
      </div>

    </div>

    {{-- {{ dd($data) }} --}}
    
    <div class="col-md-12 col-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Item</h2>
            {{-- {{ dd($data) }} --}}
            <ul class="nav navbar-right panel_toolbox">
                <li>
                  <button class="btn btn-sm btn-primary" id="print">Print Label</button>
                </li>
                <li>
                  <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                  <li>
                    <a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content" id="kocak">
          <div class="row">
            @isset($data->computer)
              @foreach ($data->computer as $item)
                  <div class="col-md-3 col-12 mb-4 mb-md-4">
                  <div class="card test" style="padding-top: 20px; position: relative; box-shadow: 0 3px 3px rgba(0,0,0,0.2); margin-top: 20px;">
                    <div class="card-body">
                      <div class="card-icon">
                        <img src="{{ asset('images/perangkat logo/'. 'computer' .'.png') }}" alt="">
                        {{-- <img src="https://i.pinimg.com/originals/30/d7/85/30d7858fed83528f7dc396db56847a8a.jpg" alt=""> --}}
                      </div>
                      {{-- <div class="row">
                        <div class="col-4">PC Name</div>
                        <div class="col-8 text-right">{{ $item->pc_name }}</div>
                      </div> --}}
                      <div class="font-weight-bold">Data Hardware</div>
                      <table class="mb-3">
                        <tbody>
                          <tr>
                            <td>PC Name</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->pc_name }}</td>
                          </tr>

                          <tr>
                            <td>Processor</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->processor }}</td>
                          </tr>

                          <tr>
                            <td>RAM</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->ram }} GB</td>
                          </tr>

                          <tr>
                            <td>HDD</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->hdd }} GB</td>
                          </tr>
                          

                          <tr>
                            <td>IP</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->ip }}</td>
                          </tr>

                          <tr>
                            <td>PC Brand</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->pc_brand }}</td>
                          </tr>

                        </tbody>
                      </table>

                      <div class="font-weight-bold">Data Fix Asset</div>
                      <table>
                        <tbody>
                          <tr>
                            <td>No Fix Asset</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->fix_asset->fixed_asset_number }}</td>
                          </tr>

                          <tr>
                            <td>No EDP</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->fix_asset->edp_fixed_asset_number }}</td>
                          </tr>

                          <tr>
                            <td>Tanggal Fix Asset</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->fix_asset->fixed_asset_date }}</td>
                          </tr>

                          <tr>
                            <td>Location</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->fix_asset->location }}</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              @endforeach
            @endisset
            
            @isset ($data->scanner)
                @foreach ($data->scanner as $item)
                  <div class="col-md-3 col-3 mb-4">
                    <div class="card" style="padding-top: 20px; position: relative; box-shadow: 0 3px 3px rgba(0,0,0,0.2); margin-top: 20px;">
                      <div class="card-body">
                        <div class="card-icon">
                          <img src="{{ asset('images/perangkat logo/'. 'scanner' .'.png') }}" alt="">
                        </div>
                        {{-- <p class="mb-2" style="font-size: 16px">PC Name : <span>{{ $item->pc_name }}</span></p>
                        <p>IP : <span>{{ $item->ip }}</span></p> --}}
                        <div class="font-weight-bold">Data Hardware</div>
                        <table class="mb-3">
                          <tbody>
                            <tr>
                              <td>Scanner Brand</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->scanner_brand }}</td>
                            </tr>
                            <tr>
                              <td>Type Scanner</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->type_scanner }}</td>
                            </tr>

                            <tr>
                              <td>Port Connection</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->port_connection }}</td>
                            </tr>
                          </tbody>
                        </table>

                        <div class="font-weight-bold">Data Fix Asset</div>
                        <table>
                          <tbody>
                            <tr>
                              <td>No Fix Asset</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->fixed_asset_number }}</td>
                            </tr>

                            <tr>
                              <td>No EDP</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->edp_fixed_asset_number }}</td>
                            </tr>

                            <tr>
                              <td>Tanggal Fix Asset</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->fixed_asset_date }}</td>
                            </tr>

                            <tr>
                              <td>Location</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->location }}</td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                @endforeach
            @endisset
            
            @isset ($data->monitor)
                @foreach ($data->monitor as $item)
                  <div class="col-md-3 col-12">
                    <div class="card" style="padding-top: 20px; position: relative; box-shadow: 0 3px 3px rgba(0,0,0,0.2); margin-top: 20px;">
                      <div class="card-body">
                        <div class="card-icon">
                          <img src="{{ asset('images/perangkat logo/'. 'monitor' .'.png') }}" alt="">
                        </div>
                        {{-- <p class="mb-2" style="font-size: 16px">PC Name : <span>{{ $item->pc_name }}</span></p>
                        <p>IP : <span>{{ $item->ip }}</span></p> --}}

                        <div class="font-weight-bold">Data Hardware</div>
                        <table class="mb-3">
                          <tbody>
                            <tr>
                              <td>Monitor Brand</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->monitor_brand }}</td>
                            </tr>

                            <tr>
                              <td>Port</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->screen_plugs }}</td>
                            </tr>

                            <tr>
                              <td>Screen Size</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->screen_size = '' ? '' : '-'  }}</td>
                            </tr>
                          </tbody>
                        </table>

                        <div class="font-weight-bold">Data Fix Asset</div>
                        <table>
                          <tbody>
                            <tr>
                              <td>No Fix Asset</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->fixed_asset_number }}</td>
                            </tr>

                            <tr>
                              <td>No EDP</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->edp_fixed_asset_number }}</td>
                            </tr>

                            <tr>
                              <td>Tanggal Fix Asset</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->fixed_asset_date }}</td>
                            </tr>

                            <tr>
                              <td>Location</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->location }}</td>
                            </tr>

                          </tbody>
                        </table>
                        
                      </div>
                    </div>
                  </div>
                @endforeach
            @endisset
            
            @isset ($data->printer)
                @foreach ($data->printer as $item)
                  <div class="col-md-3 col-3 mb-4">
                    <div class="card" style="padding-top: 20px; position: relative; box-shadow: 0 3px 3px rgba(0,0,0,0.2); margin-top: 20px;">
                      <div class="card-body">
                        <div class="card-icon">
                          <img src="{{ asset('images/perangkat logo/'. 'printer'.'.png') }}" alt="">
                        </div>
                        {{-- <p class="mb-2" style="font-size: 16px">PC Name : <span>{{ $item->pc_name }}</span></p>
                        <p>IP : <span>{{ $item->ip }}</span></p> --}}
                        <div class="font-weight-bold">Data Hardware</div>
                        <table class="mb-3">
                          <tbody>
                            <tr>
                              <td>Printer Brand</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->printer_brand }}</td>
                            </tr>
                            <tr>
                              <td>Type Printer</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->type }}</td>
                            </tr>

                            <tr>
                              <td>Port Connection</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->port_connection }}</td>
                            </tr>
                          </tbody>
                        </table>

                        <div class="font-weight-bold">Data Fix Asset</div>
                        <table>
                          <tbody>
                            <tr>
                              <td>No Fix Asset</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->fixed_asset_number }}</td>
                            </tr>

                            <tr>
                              <td>No EDP</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->edp_fixed_asset_number }}</td>
                            </tr>

                            <tr>
                              <td>Tanggal Fix Asset</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->fixed_asset_date }}</td>
                            </tr>

                            <tr>
                              <td>Location</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->location }}</td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                @endforeach
            @endisset
            
            @isset ($data->projector)
                @foreach ($data->projector as $item)
                  <div class="col-md-3 col-3 mb-4">
                    <div class="card" style="padding-top: 20px; position: relative; box-shadow: 0 3px 3px rgba(0,0,0,0.2); margin-top: 20px;">
                      <div class="card-body">
                        <div class="card-icon">
                          <img src="{{ asset('images/perangkat logo/'. 'projector' .'.png') }}" alt="">
                        </div>
                        {{-- <p class="mb-2" style="font-size: 16px">PC Name : <span>{{ $item->pc_name }}</span></p>
                        <p>IP : <span>{{ $item->ip }}</span></p> --}}
                        <div class="font-weight-bold">Data Hardware</div>
                        <table class="mb-3">
                          <tbody>
                            <tr>
                              <td>Projector Brand</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->projector_brand }}</td>
                            </tr>
                            <tr>
                              <td>Type Printer</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->type }}</td>
                            </tr>
                          </tbody>
                        </table>

                        <div class="font-weight-bold">Data Fix Asset</div>
                        <table>
                          <tbody>
                            <tr>
                              <td>No Fix Asset</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->fixed_asset_number }}</td>
                            </tr>

                            <tr>
                              <td>No EDP</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->edp_fixed_asset_number }}</td>
                            </tr>

                            <tr>
                              <td>Tanggal Fix Asset</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->fixed_asset_date }}</td>
                            </tr>

                            <tr>
                              <td>Location</td>
                              <td>&nbsp;&nbsp;&nbsp;:</td>
                              <td>{{ $item->fix_asset->location }}</td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                @endforeach
            @endisset

            {{-- Operation System --}}
            @if (isset($data->os))

              <div class="col-md-3 col-12 mb-4 ">
                <div class="card" style="padding-top: 20px; position: relative; box-shadow: 0 3px 3px rgba(0,0,0,0.2); margin-top: 20px;">
                  <div class="card-body">
                    <div class="card-icon">
                      <img src="{{ asset('images/perangkat logo/os2.png') }}" alt="">
                    </div>
                    {{-- <p class="mb-2" style="font-size: 16px">PC Name : <span>{{ $item->pc_name }}</span></p> --}}
                    {{-- <p>OS : <span>{{ $item->os }}</span></p>
                    <p>Qty : <span>{{ $item->qty }}</span></p> --}}

                    <table>
                      <tbody>
                        <tr>
                          <td>OS</td>
                          <td>&nbsp;&nbsp;&nbsp;:</td>
                          <td>{{ $data->os->os }}</td>
                        </tr>

                        <tr>
                          <td>Qty</td>
                          <td>&nbsp;&nbsp;&nbsp;:</td>
                          <td>{{ $data->os->qty }}</td>
                        </tr>

                        <tr>
                          <td>Status</td>
                          <td>&nbsp;&nbsp;&nbsp;:</td>
                          <td>{{ $data->os->status }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            @endif

            {{-- MS Office --}}
            @if (isset($data->ms_office))
              <div class="col-md-3 col-12 mb-4 ">
                <div class="card" style="padding-top: 20px; position: relative; box-shadow: 0 3px 3px rgba(0,0,0,0.2); margin-top: 20px;">
                  <div class="card-body">
                    <div class="card-icon">
                      <img src="{{ asset('images/perangkat logo/office.png') }}" alt="">
                    </div>
                    {{-- <p class="mb-2" style="font-size: 16px">PC Name : <span>{{ $item->pc_name }}</span></p> --}}
                    {{-- <p>OS : <span>{{ $item->os }}</span></p>
                    <p>Qty : <span>{{ $item->qty }}</span></p> --}}

                    <table>
                      <tbody>
                        <tr>
                          <td>OS</td>
                          <td>&nbsp;&nbsp;&nbsp;:</td>
                          <td>{{ $data->ms_office->ms_office }}</td>
                        </tr>

                        <tr>
                          <td>Qty</td>
                          <td>&nbsp;&nbsp;&nbsp;:</td>
                          <td>{{ $data->ms_office->qty }}</td>
                        </tr>

                        <tr>
                          <td>Status</td>
                          <td>&nbsp;&nbsp;&nbsp;:</td>
                          <td>{{ $data->ms_office->status }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            @endif

            {{-- Other Offive --}}
            @isset($data->other_devices)
              @foreach ($data->other_devices as $item)
              {{-- {{ dd($item) }} --}}
                <div class="col-md-3 col-12 mb-4 mb-md-4">
                  <div class="card" style="padding-top: 20px; position: relative; box-shadow: 0 3px 3px rgba(0,0,0,0.2); margin-top: 20px;">
                    <div class="card-body">
                      <div class="card-icon">
                        <img src="{{ asset('images/perangkat logo/'.  json_decode($item->description, true)["description"] .'.png') }}" alt="">
                        {{-- <img src="https://i.pinimg.com/originals/30/d7/85/30d7858fed83528f7dc396db56847a8a.jpg" alt=""> --}}
                      </div>
                      {{-- <div class="row">
                        <div class="col-4">PC Name</div>
                        <div class="col-8 text-right">{{ $item->pc_name }}</div>
                      </div> --}}
                      <div class="font-weight-bold">Data Item</div>
                      <table class="mb-3">
                        <tbody>
                          <tr>
                            <td>Item Name</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->item_name }}</td>
                          </tr>

                          <tr>
                            <td>Item Type</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ json_decode($item->description, true)['description'] }}</td>
                          </tr>

                          <tr>
                            <td>Qty</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td>{{ $item->qty }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              @endforeach
            @endisset

            <div class="row">
              <div class="col-12">
                
              </div>
            </div>
            
            <page size="A4" layout="landscape" id="label-container" class="page">
              <div class="container-label">
                    @isset($data->computer)
                      @foreach ($data->computer as $key => $item)
                      @if (($key + 1) % 21 == 0)

                        <div class="garis" style="margin-bottom: 23px">
                            <div class="label-box">
                              <div><span>PC Name</span>  : {{ $item->pc_name }}</div>
                              <div><span>IP Address</span> : {{ $item->ip  }}</div>
                                {!! QrCode::size(50)->backgroundColor(255,255,255)->generate($item->id) !!}
                            </div>
                        </div>
                      @else 
                        <div class="garis">
                            <div class="label-box">
                              <div><span>PC Name</span>  : {{ $item->pc_name }}</div>
                              <div><span>IP Address</span> : {{ $item->ip  }}</div>
                                {!! QrCode::size(50)->backgroundColor(255,255,255)->generate($item->id) !!}
                            </div>
                        </div>
                      @endif
                      @endforeach
                    @endisset

                     {{-- @isset($data->monitor)
                      @foreach ($data->monitor as $key => $item)
                      @if (($key + 1) % 21 == 0)

                        <div class="garis" style="margin-bottom: 23px">
                            <div class="label-box">
                              <div><span>Mon Name</span>  : {{  substr($item->edp_fixed_asset_number, 4)	 }}</div>
                              <div><span>Brand</span> : {{ $item->monitor_brand  }}</div>
                                {!! QrCode::size(50)->backgroundColor(255,255,255)->generate($item->id) !!}
                            </div>
                        </div>
                      @else 
                        <div class="garis">
                            <div class="label-box">
                              <div><span>Mon Name</span>  : {{  substr($item->edp_fixed_asset_number, 4)	 }}</div>
                              <div><span>Brand</span> : {{ $item->monitor_brand  }}</div>
                                {!! QrCode::size(50)->backgroundColor(255,255,255)->generate($item->id) !!}
                            </div>
                        </div>
                      @endif
                      @endforeach
                    @endisset --}}
              </div>
            </page>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>


@endsection

@section('style')
  {{-- <link rel="stylesheet" href="{{ asset('js/print/style.css') }}"> --}}
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

        <script src=" {{ asset('js/print/printThis.js') }} "></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>


    <script>
      
      
      $('#print').on('click', function() {
        $('#label-container').printThis({
          debug: true,
            loadCSS: ["http://127.0.0.1:8000/css/print.css"],
        });
      });

// Default export is a4 paper, portrait, using millimeters for units
    </script>
@endsection
