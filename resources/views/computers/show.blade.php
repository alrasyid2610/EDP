@php
    

   

    // Data untuk nilai enum (yes,NO)
    
    
    /**
     * @param $data -> data yang akan di tampilkan, ARRAY
     * @param $val -> values dari database
     * @param $key -> 
     * */
    if (isset($dataComputer[0])) {
        $GLOBALS['a'] = $dataComputer[0];
    }

    function loopSelectDataSection($dataSection, $val) {
      foreach ($dataSection as $item) {
            if ( $item->section_name == $val)  {
                echo "<option value='$item->section_name' selected>$item->section_name</option>";
            } else {
                echo "<option value='$item->section_name'>$item->section_name</option>";
            }
            
        }
    }

    // dd(loopSelectData("saf", "safsaf"));

    
@endphp




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

<div id="app">

{{-- FOR MODAL FORM Service --}}
    <div class="modal fade" id="service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Edit </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form 
              method="POST"
              v-bind:action="editAction.url"
              id='form'
              >
                @csrf
                @method('PUT')
                <div id="inputsection">


              {{-- <h4>Pengembalian dari User ke EDP</h4> --}}

                    <div class="form-row"
                        v-if="editAction.data == 'Profile'"
                    >

                        <div class="col-lg-6 mb-3">
                            <label for="nik">NIK User</label>
                            <input type="text" class="form-control" id="nik" v-bind:value="dataUser.nik" name="nik" required=""> 
                            @if ($errors->has('nik')) 
                                <span class="text-danger">{{ $errors->first('nik') }}</span> 
                            @endif 
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" v-bind:value="dataUser.name" name="name" required="">  
                            @if ($errors->has('name')) 
                                <span class="text-danger">{{ $errors->first('name') }}</span> 
                            @endif
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" v-bind:value="dataUser.email" name="email" required=""
                            value="{{ $dataComputer[0]->email ?? '' }}">  
                            @if ($errors->has('email')) 
                                <span class="text-danger">{{ $errors->first('email') }}</span> 
                            @endif
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="user_login">User Login</label>
                            <input type="text" class="form-control" id="user_login" v-bind:value="dataUser.user_login" name="user_login" required=""
                            value="{{ $dataComputer[0]->user_login ?? '' }}">  
                            @if ($errors->has('user_login')) 
                                <span class="text-danger">{{ $errors->first('user_login') }}</span> 
                            @endif
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" v-bind:value="dataUser.password" name="password"
                            value="{{ $dataComputer[0]->password ?? '' }}">  
                            @if ($errors->has('password')) 
                                <span class="text-danger">{{ $errors->first('password') }}</span> 
                            @endif
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                            <label for="section">Section</label>
                            <select class="form-control" name="section" id="section">
                                @php
                                loopSelectDataSection($dataSection, $data->get_user->section);
                                @endphp
                            </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="position">Position</label>
                            <input type="position" class="form-control" id="position" placeholder="Position" name="position"
                            :value="dataUser.position">  
                            @if ($errors->has('position')) 
                            <span class="text-danger">{{ $errors->first('position') }}</span> 
                            @endif
                        </div>
                    </div>
                    <div id="step-2" class="form-row" role="tabpanel"
                        v-else-if="editAction.data == 'Computer'">
                        <div class="col-lg-8 mb-3">
                        <label for="pc_name">PC Name</label>
                        <input type="text" class="form-control" id="pc_name" placeholder="PC Name" name="pc_name" required=""
                            value="{{ $dataComputer[0]->pc_name ?? '' }}"> 
                            @if ($errors->has('pc_name')) 
                            <span class="text-danger">{{ $errors->first('pc_name') }}</span> 
                            @endif 
                        </div>
                        <div class="col-lg-4 mb-3">
                        <label for="computer_operation">Computer Operation</label>
                        <select class="custom-select" name="computer_operation">
                            <option value="">-- Choose --</option>  
                            @php
                                loopSelectData(getDataComputerOperation(), 'computer_operation');
                            @endphp
                        </select>
                        </div>

                        <div class="col-md-12 mb-3">
                        <label for="pc_brand">Brand PC</label>
                        <select class="custom-select" name="pc_brand">
                            <option value="">-- Choose --</option>  
                            @php
                                loopSelectData(getDataBrandPc(), 'pc_brand');
                            @endphp
                        </select>
                        </div>

                        <div class="col-md-6 mb-3">
                        <label for="processor">Processor</label>
                        <select class="custom-select" id="processor" name="processor">
                            <option value="">-- Choose --</option>
                            @php
                                loopSelectData(getDataProcessor(), 'processor');
                            @endphp
                        </select>
                        </div>

                        <div class="col-md-6 mb-3">
                        <label for="operating_system">OS</label>
                        <select class="custom-select" name="operating_system">
                            <option value="">-- Choose --</option>\
                            @php
                                loopSelectData(getDataOs(), 'operating_system');
                            @endphp
                        </select>
                        </div>

                        <div class="col-lg-6 mb-3">
                        <label for="ram">Ram</label>
                        <input type="text" class="form-control" id="ram" placeholder="Ram" name="ram" required=""
                            value="{{ $dataComputer[0]->ram ?? '' }}">  
                            @if ($errors->has('ram')) 
                            <span class="text-danger">{{ $errors->first('ram') }}</span> 
                            @endif
                        </div>

                        <div class="col-lg-6 mb-3">
                        <label for="hdd">HDD</label>
                        <input type="text" class="form-control" id="hdd" placeholder="HDD" name="hdd" required=""
                            value="{{ $dataComputer[0]->hdd ?? '' }}">  
                            @if ($errors->has('hdd')) 
                            <span class="text-danger">{{ $errors->first('hdd') }}</span> 
                            @endif
                        </div>

                        <div class="col-lg-6 mb-3">
                        <label for="ip">IP Komputer</label>
                        <input type="text" class="form-control" id="ip" placeholder="IP Komputer" name="ip" required=""
                            value="{{ $dataComputer[0]->ip ?? '' }}">  
                            @if ($errors->has('ip')) 
                            <span class="text-danger">{{ $errors->first('ip') }}</span> 
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                        <label for="internet">Internet</label>
                        <select class="custom-select" name="internet">
                            <option value="">-- Choose --</option>
                            @php
                                loopSelectData(getDataEnumYN(), 'internet');
                            @endphp
                        </select>
                        </div>

                        <div class="col-lg-12 mb-3">
                        <label for="computer_description">Computer Description</label>
                        <textarea name="computer_description"  class="form-control" id="" cols="30" rows="3">{{ $dataComputer[0]->computer_description ?? '' }}</textarea>
                            @if ($errors->has('computer_description')) 
                            <span class="text-danger">{{ $errors->first('computer_description') }}</span> 
                            @endif
                        </div>

                        <h2>Fix Asset Komputer</h2>
                        <div class="col-lg-6 mb-3">
                        <label for="fa_computer">Nomor Fix Asset</label>
                        <input type="text" class="form-control" id="fa_computer" placeholder="Nomor Fix Asset Komputer" name="fa_computer" required=""
                            value="{{ $dataComputer[0]->fa_computer ?? '' }}">  
                            @if ($errors->has('fa_computer')) 
                            <span class="text-danger">{{ $errors->first('fa_computer') }}</span> 
                            @endif
                        </div>

                        <div class="col-lg-6 mb-3">
                        <label for="com_edp_number">EDP No</label>
                        <input type="text" class="form-control" id="com_edp_number" placeholder="EDP No" name="com_edp_number" required=""
                            value="{{ $dataComputer[0]->com_edp_number ?? '' }}">  
                            @if ($errors->has('com_edp_number')) 
                            <span class="text-danger">{{ $errors->first('com_edp_number') }}</span> 
                            @endif
                        </div>

                        <div class="col-md-12 mb-3">
                        <label for="computer_date">Tanggal Fix Asset</label>
                        <input type="date" class="form-control" id="computer_date" placeholder="Tanggal Fix Asset" name="computer_date"
                            required="" value="{{ $dataComputer[0]->computer_date ?? '' }}">
                        </div>
                    </div>
                    <div class="form-row"
                    v-else-if="editAction.data == 'Monitor'"
                    >
                        <div id="step-4" class="tab-pane" role="tabpanel">
                            <div class="col-md-6 mb-3">
                            <label for="monitor_brand">Monitor Brand</label>
                            <select class="custom-select" name="monitor_brand">
                                <option value="">-- Choose --</option>
                                @php
                                    loopSelectData(getDataBrandMonitor(), $data->get_monitor->monitor_brand);
                                @endphp
                            </select>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="screen_plugs">Port Dislay</label>
                            <select class="custom-select" name="screen_plugs">
                                <option value="">-- Choose --</option>
                                @php
                                    loopSelectData(getDataScreenPlugs(), $data->get_monitor->screen_plugs);
                                @endphp
                            </select>
                            </div>

                            <h2>Fix Asset Komputer</h2>
                            <div class="col-lg-6 mb-3">
                            <label for="fa_monitor">Nomor Fix Monitor</label>
                            <input type="text" class="form-control" id="fa_monitor" placeholder="Nomor Fix Asset Komputer" name="fa_monitor" required=""
                                value="{{ $dataComputer[0]->fa_monitor ?? '' }}">  
                                @if ($errors->has('fa_monitor')) 
                                <span class="text-danger">{{ $errors->first('fa_monitor') }}</span> 
                                @endif
                            </div>

                            <div class="col-lg-6 mb-3">
                            <label for="edp_monitor_number">EDP No</label>
                            <input type="text" class="form-control" id="edp_monitor_number" placeholder="EDP No" name="edp_monitor_number" required=""
                                value="{{ $dataComputer[0]->edp_monitor_number ?? '' }}">  
                                @if ($errors->has('edp_monitor_number')) 
                                <span class="text-danger">{{ $errors->first('edp_monitor_number') }}</span> 
                                @endif
                            </div>

                            <div class="col-md-12 mb-3">
                            <label for="monitor_date">Tanggal Fix Asset</label>
                            <input type="date" class="form-control" id="monitor_date" placeholder="Tanggal Fix Asset" name="monitor_date"
                                required="" value="{{ $dataComputer[0]->monitor_date ?? '' }}">
                            </div>

                        </div>
                    </div>
                    <div id="step-3" class="form-row" role="tabpanel"
                    v-else-if="editAction.data == 'Program'">
                        <div id="sectionProgram">

                            <div class="col-md-6 mb-3">
                                <label for="nsi">NSI</label>
                                <select class="custom-select" name="nsi">
                                    <option value="">-- Choose --</option>
                                    @php
                                        loopSelectData(getDataEnumYN(), $data->get_computer->nsi);
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="boss">BOSS</label>
                                <select class="custom-select" name="boss">
                                    <option value="">-- Choose --</option>
                                    @php
                                        loopSelectData(getDataEnumYN(), $data->get_computer->boss);
                                    @endphp
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="ms_office">Microsoft Office</label>
                                <select class="custom-select" name="ms_office">
                                    <option value="">-- Choose --</option>
                                    @php
                                        loopSelectData(getDataMicrosoftOffice(), $data->get_computer->ms_office, 'Computer', '.ms_office');
                                    @endphp
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="antivirus">Antivirus</label>
                                <select class="custom-select" name="antivirus">
                                    <option value="">-- Choose --</option>
                                    @php
                                        loopSelectData(getDataEnumYN(), $data->get_computer->antivirus);
                                    @endphp
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="wsus">WSUS</label>
                                <select class="custom-select" name="wsus">
                                    <option value="">-- Choose --</option>
                                    @php
                                        loopSelectData(getDataEnumYN(), $data->get_computer->wsus);
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="click_one">Click One</label>
                                <select class="custom-select" name="click_one">
                                    <option value="">-- Choose --</option>
                                    @php
                                        loopSelectData(getDataEnumYN(), $data->get_computer->click_one);
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="ax">AX</label>
                                <select class="custom-select" name="ax">
                                    <option value="">-- Choose --</option>
                                    @php
                                        loopSelectData(getDataEnumYN(), $data->get_computer->ax);
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="schedule_ppc">Schedule PPC</label>
                                <select class="custom-select" name="schedule_ppc">
                                    <option value="">-- Choose --</option>
                                    @php
                                        loopSelectData(getDataEnumYN(), $data->get_computer->schedule_ppc);
                                    @endphp
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

              
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
{{-- FOR MODAL FORM Service --}}

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Profile User <small></small></h2>
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
                <!------ Include the above in your HEAD tag ---------->
                <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <i class="fa fa-user" style="height: 100%; width: 100%; font-size: 200px;"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-head">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5> {{ $data->get_user->name }} </h5>
                                            <h6> {{ $data->get_user->section }} </h6>
                                        </div>
                                        <div class="col-4">
                                            {{-- <a type="submit" class=" btn btn-info btn-sm d-inline-block"
                                                href="{{ route('computers.edit', ['computer' => $data->id]) }}" name="btnAddMore" value="Edit Profile" />Edit
                                            Profile</a> --}}
                                            <div class="d-flex">

                                                <div class="input-group">
                                                    <select class="custom-select" id="inputGroupSelect04" v-model="editAction" ref='editSelectElement'>
                                                        <option value='' selected>Choose...</option>
                                                        <option value="AllData | safsaf" >Edit All Data</option>
                                                        <option value="Profile | {{ route('users.editProfile', $data->get_user->id) }}" data-url="">Edit Profile</option>
                                                        <option value="Computer | {{ route('computer.editComputer', $data->get_computer->id) }}">Edit Computer</option>
                                                        <option value="Program | {{ route('computer.editProgram', $data->get_computer->id) }}">Edit Program</option>
                                                        <option value="Monitor | {{ route('monitor.editMonitor', $data->get_monitor->id) }}">Edit Monitor</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button 
                                                        {{-- data-toggle="modal" 
                                                        data-target="#service"  --}}
                                                            class="btn btn-success" type="button" @click="test(this)">Edit</button>
                                                        {{-- <a class="btn btn-success text-white" type="button">Edit</a> --}}
                                                    </div>
                                                    <a type="submit" class="btn btn-primary" href="{{ route('computers.index') }}" name="btnAddMore" value="Edit Profile" />Back</a>
                                                </div>

                                            </div>

                                        </div>
                                        
                                    </div>
                                    
                                    <p class="proile-rating"></p>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                                aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#computer" role="tab"
                                                aria-controls="computer" aria-selected="false">Computer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="computer"
                                                aria-selected="false">Program</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="monitor-tab" data-toggle="tab" href="#monitor" role="tab" aria-controls="computer"
                                                aria-selected="false">Monitor</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                {{-- <div class="profile-work">
                                    <p>Information</p>
                                    <div>
                                        <label for="">{{ $data->pc_name }}</label>
                                    </div>
                                    <div>
                                        <label for="">{{ $data->ip }}</label>
                                    </div>
                                    <div>
                                        <label for="">Internet : {{ $data->internet }}</label>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NIK</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $data->get_user->nik }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $data->get_user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $data->get_user->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Login</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <code>dnpi1\</code> {{ $data->get_user->user_login }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Section</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $data->get_user->section }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="computer" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <h5>Computer Specifications</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Pc Name</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->pc_name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>IP</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->ip }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Brand</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->pc_brand }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Processor</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->processor }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>OS</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->operating_system }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Storage</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->hdd }} GB</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>RAM</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->ram }} GB</p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Internet</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->internet }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>WSUS</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->wsus }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>UPS</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->ups }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Location</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->location }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Computer Description</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->computer_description }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Computer Operation</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->computer_operation }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Fixed Asset</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Nomor Fixed Asset</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->fix_asset->fixed_asset_number }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>EDP No</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->fix_asset->edp_fixed_asset_number }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Computer Date</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->fix_asset->fixed_asset_date }}</p>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="program" role="tabpanel" aria-labelledby="program-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <h5>Programs</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Microsoft Office</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->ms_office }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>NSI</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->nsi }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Click One</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->click_one }}</p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>BOSS</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->boss }}</p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>AX</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->ax }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Schedule PPC</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_computer->schedule_ppc }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="monitor" role="tabpanel" aria-labelledby="monitor-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <h5>Monitor</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Brand</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_monitor->monitor_brand }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Port Display</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_monitor->screen_plugs }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Fixed Asset</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Nomor Fixed Asset</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $data->get_monitor->fix_asset->fixed_asset_number }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>EDP No</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                {{-- <p>{{ $data->edp_monitor_number }}</p> --}}
                                                                <p>{{ $data->get_monitor->fix_asset->edp_fixed_asset_number }}</p>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Monitor Date</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                {{-- <p>{{ $data->monitor_date }}</p> --}}
                                                                <p>{{ $data->get_monitor->fix_asset->fixed_asset_date }}</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>

  
    <script>
    var app = new Vue({
        el: '#app',
        data() {
            return {
                kocak: 'kocal lu ndrow',
                editAction: '',
                dataUser: '',
                dataComputer: '',
                urlAction: '',
                elProgram: ''
            }

        },

        methods: {
            test: function(el) {

                var data = this.editAction.split('|')[0];

                if (this.editAction == '') {
                    
                } else {
                    

                    // var editData = this.editAction.data;
                    // // console.log(editData);

                    $('#service').modal({
                        show: true,
                    });

                    $('#service').on('shown.bs.modal', function (a = 'a', b = data) {

                        console.log(b);
                        
                        // if (b == 'Program') {
                        //     console.log('oke cak');
                        //     // this.elProgram = $('#form #sectionProgram').clone();
                        //     // console.log(this.elProgram);
                        // }
                    });

                    $('#service').on('hidden.bs.modal', function (e, b = '') {
                        console.log(b);
                        // var d = $('#form #inputsection').html('');
                        // if (editData == 'Program') {
                        //     // $('#form #sectionProgram').replaceWith(this.elProgram);
                        // }
                    });
                }

                this.dataUser = {!! $data->get_user !!},
                this.dataComputer = {!! $data->get_computer !!}
            }
        }
    });
        
        
        
        
        
        $('#inputGroupSelect04').on('change', function (e) {
            var href = $(this).val();
            $(this).parent().find('a').attr('href', href);
        })
    </script>
@endsection

