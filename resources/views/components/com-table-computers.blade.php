{{-- Works For       : Components for displaying computer input forms
    Param           : @param title - string - For the form title
                      @param route - route(string) - To determine the route in the data display process
                      @param<optional> dataComputer - collection -  Computer data set to be displayed by default
    Component call  : <x-table-computer :title="" :route="" :dataComputer=""></x-table-computer>
    Example Call    : <x-table-computer :title="$title" :route="$route" :dataComputer="$data"></x-table-computer> --}}

{{-- {{ dd($dataSection) }} --}}

@php

// Data untuk nilai enum (yes,NO)

/**
 * @param $data -> data yang akan di tampilkan, ARRAY
 * @param $val -> values dari database
 * @param $key ->
 * */
// function loopSelectDataSection($dataSection, $val)
// {
//     foreach ($dataSection as $item) {
//         if (isset($GLOBALS['a'])) {
//             if ($item->section_name == htmlentities($GLOBALS['a']->$val)) {
//                 echo "<option value='$item->section_name' selected>$item->section_name</option>";
//             } else {
//                 echo "<option value='$item->section_name'>$item->section_name</option>";
//             }
//         } else {
//             echo "<option value='$item->section_name'>$item->section_name</option>";
//             // echo "<option value='$item'>$item</option>";
//         }
//     }
// }

// dd(loopSelectData("saf", "safsaf"));
$kosong = false;
if (empty($dataComputer)) {
    $kosong = true;
}

@endphp

{{-- {{ dd($dataComputer[0]) }} --}}



<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ $title }} <small>Data Computer, Monitor and User</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />

                <div id="wizard" class="form_wizard wizard_horizontal">
                    <ul class="wizard_steps">
                        <li>
                            <a href="#step-1">
                                <span class="step_no">1</span>
                                <span class="step_descr"> Step 1<br />
                                    <small>Data User</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <span class="step_no">2</span>
                                <span class="step_descr"> Step 2<br />
                                    <small>Data Komputer</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <span class="step_no">3</span>
                                <span class="step_descr"> Step 3<br />
                                    <small>Data Program dll</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-4">
                                <span class="step_no">4</span>
                                <span class="step_descr"> Step 4<br />
                                    <small>Data Monitor</small>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        @if (isset($route))
                            @if ($route == 'computers.store')
                                <form class="form-horizontal form-label-left" method="POST" action="{{ route($route) }}">
                                    @csrf
                                @elseif ( $route == 'computers.update' )
                                    <form class="form-horizontal form-label-left" method="POST" data-action="edit" action="{{ route($route, ['computer' => $dataComputer->get_computer->id]) }}">
                                        @csrf
                                        @method('PUT')
                                    @else
                                        <form class="form-horizontal form-label-left" method="POST">
                            @endif
                        @endif
                        <div id="step-1" class="tab-pane" role="tabpanel">
                            <div class="col-lg-6 mb-3">
                                <label for="nik">NIK User</label>
                                <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" required="" value="{{ $dataComputer->get_user->nik ?? '' }}">
                                @if ($errors->has('nik'))
                                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="name">name</label>
                                <input type="text" class="form-control" id="name" placeholder="Nama" name="name" required="" value="{{ $dataComputer->get_user->name ?? '' }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email" required="" value="{{ $dataComputer->get_user->email ?? '' }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="user_login">User Login</label>
                                <input type="text" class="form-control" id="user_login" placeholder="User Logon" name="user_login" required="" value="{{ $dataComputer->get_user->user_login ?? '' }}">
                                @if ($errors->has('user_login'))
                                    <span class="text-danger">{{ $errors->first('user_login') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ $dataComputer->get_user->password ?? '' }}">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="section">Section</label>
                                    <select class="form-control" name="section" id="section">
                                        @php
                                            if ($kosong) {
                                                loopSelectData($dataSection, '', 'section');
                                            } else {
                                                loopSelectData($dataSection, $dataComputer->get_user->section, 'section');
                                            }
                                        @endphp
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="position">Position</label>
                                <input type="position" class="form-control" id="position" placeholder="Position" name="position" value="{{ $dataComputer->get_user->position ?? '' }}">
                                @if ($errors->has('position'))
                                    <span class="text-danger">{{ $errors->first('position') }}</span>
                                @endif
                            </div>
                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel">
                            <div class="col-lg-8 mb-3">
                                <label for="pc_name">PC Name</label>
                                <input type="text" class="form-control" id="pc_name" placeholder="PC Name" name="pc_name" required="" value="{{ $dataComputer->get_computer->pc_name ?? '' }}">
                                @if ($errors->has('pc_name'))
                                    <span class="text-danger">{{ $errors->first('pc_name') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="computer_operation">Computer Operation</label>
                                <select class="custom-select" name="computer_operation">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataComputerOperation(), '');
                                        } else {
                                            loopSelectData(getDataComputerOperation(), $dataComputer->get_computer->computer_operation);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="pc_brand">Brand PC</label>
                                <select class="custom-select" name="pc_brand">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataBrandPc());
                                        } else {
                                            loopSelectData(getDataBrandPc(), $dataComputer->get_computer->pc_brand);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="processor">Processor</label>
                                <select class="custom-select" id="processor" name="processor">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataProcessor(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataProcessor(), htmlentities($dataComputer->get_computer->processor));
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="operating_system">OS</label>
                                <select class="custom-select" name="operating_system">
                                    <option value="">-- Choose --</option>\
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataOs(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataOs(), $dataComputer->get_computer->operating_system);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="ram">Ram</label>
                                <input type="text" class="form-control" id="ram" placeholder="Ram" name="ram" required="" value="{{ $dataComputer->get_computer->ram ?? '' }}">
                                @if ($errors->has('ram'))
                                    <span class="text-danger">{{ $errors->first('ram') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="hdd">HDD</label>
                                <input type="text" class="form-control" id="hdd" placeholder="HDD" name="hdd" required="" value="{{ $dataComputer->get_computer->hdd ?? '' }}">
                                @if ($errors->has('hdd'))
                                    <span class="text-danger">{{ $errors->first('hdd') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="ip">IP Komputer</label>
                                <input type="text" class="form-control" id="ip" placeholder="IP Komputer" name="ip" required="" value="{{ $dataComputer->get_computer->ip ?? '' }}">
                                @if ($errors->has('ip'))
                                    <span class="text-danger">{{ $errors->first('ip') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="internet">Internet</label>
                                <select class="custom-select" name="internet">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataEnumYN(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataEnumYN(), $dataComputer->get_computer->internet);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="computer_description">Computer Description</label>
                                <textarea name="computer_description" class="form-control" id="" cols="30" rows="3">{{ $dataComputer->get_computer->computer_description ?? '' }}</textarea>
                                @if ($errors->has('computer_description'))
                                    <span class="text-danger">{{ $errors->first('computer_description') }}</span>
                                @endif
                            </div>

                            <h2>Fix Asset Komputer</h2>
                            <div class="col-lg-6 mb-3">
                                <label for="fa_computer">Nomor Fix Asset</label>
                                <input type="text" class="form-control" id="fa_computer" placeholder="Nomor Fix Asset Komputer" name="fa_computer" required="" value="{{ $dataComputer->get_computer->fix_asset->fixed_asset_number ?? '' }}">
                                @if ($errors->has('fa_computer'))
                                    <span class="text-danger">{{ $errors->first('fa_computer') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="com_edp_number">EDP No</label>
                                <input type="text" class="form-control" id="com_edp_number" placeholder="EDP No" name="com_edp_number" required="" value="{{ $dataComputer->get_computer->fix_asset->edp_fixed_asset_number ?? '' }}">
                                @if ($errors->has('com_edp_number'))
                                    <span class="text-danger">{{ $errors->first('com_edp_number') }}</span>
                                @endif
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="computer_date">Tanggal Fix Asset</label>
                                <input type="date" class="form-control" id="computer_date" placeholder="Tanggal Fix Asset" name="computer_date" required="" value="{{ $dataComputer->get_computer->fix_asset->fixed_asset_date ?? '' }}">
                            </div>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel">
                            <div class="col-md-6 mb-3">
                                <label for="nsi">NSI</label>
                                <select class="custom-select" name="nsi">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataEnumYN(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataEnumYN(), $dataComputer->get_computer->nsi);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="boss">BOSS</label>
                                <select class="custom-select" name="boss">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataEnumYN(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataEnumYN(), $dataComputer->get_computer->boss);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="ms_office">Microsoft Office</label>
                                <select class="custom-select" name="ms_office">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataMicrosoftOffice(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataMicrosoftOffice(), $dataComputer->get_computer->ms_office);
                                        }
                                    @endphp
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="antivirus">Antivirus</label>
                                <select class="custom-select" name="antivirus">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataEnumYN(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataEnumYN(), $dataComputer->get_computer->antivirus);
                                        }
                                    @endphp
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="wsus">WSUS</label>
                                <select class="custom-select" name="wsus">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataEnumYN(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataEnumYN(), $dataComputer->get_computer->wsus);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="click_one">Click One</label>
                                <select class="custom-select" name="click_one">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataEnumYN(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataEnumYN(), $dataComputer->get_computer->click_one);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="ax">AX</label>
                                <select class="custom-select" name="ax">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataEnumYN(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataEnumYN(), $dataComputer->get_computer->ax);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="schedule_ppc">Schedule PPC</label>
                                <select class="custom-select" name="schedule_ppc">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataEnumYN(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataEnumYN(), $dataComputer->get_computer->schedule_ppc);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="ups">UPS</label>
                                <select class="custom-select" name="ups">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataEnumYN(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataEnumYN(), $dataComputer->get_computer->ups);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="location">Location</label>
                                <select class="custom-select" name="location">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataLocation(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataLocation(), $dataComputer->get_computer->location);
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        <div id="step-4" class="tab-pane" role="tabpanel">
                            <div class="col-md-6 mb-3">
                                <label for="monitor_brand">Monitor Brand</label>
                                <select class="custom-select" name="monitor_brand">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataBrandMonitor(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataBrandMonitor(), $dataComputer->get_monitor->monitor_brand);
                                        }
                                    @endphp
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="screen_plugs">Port Dislay</label>
                                <select class="custom-select" name="screen_plugs">
                                    <option value="">-- Choose --</option>
                                    @php
                                        if ($kosong) {
                                            loopSelectData(getDataScreenPlugs(), '');
                                            # code...
                                        } else {
                                            loopSelectData(getDataScreenPlugs(), $dataComputer->get_monitor->screen_plugs);
                                        }
                                    @endphp
                                </select>
                            </div>

                            <h2>Fix Asset Komputer</h2>
                            <div class="col-lg-6 mb-3">
                                <label for="fa_monitor">Nomor Fix Monitor</label>
                                <input type="text" class="form-control" id="fa_monitor" placeholder="Nomor Fix Asset Komputer" name="fa_monitor" required="" value="{{ $dataComputer->get_monitor->fix_asset->fixed_asset_number ?? '' }}">
                                @if ($errors->has('fa_monitor'))
                                    <span class="text-danger">{{ $errors->first('fa_monitor') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="edp_monitor_number">EDP No</label>
                                <input type="text" class="form-control" id="edp_monitor_number" placeholder="EDP No" name="edp_monitor_number" required="" value="{{ $dataComputer->get_monitor->fix_asset->edp_fixed_asset_number ?? '' }}">
                                @if ($errors->has('edp_monitor_number'))
                                    <span class="text-danger">{{ $errors->first('edp_monitor_number') }}</span>
                                @endif
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="monitor_date">Tanggal Fix Asset</label>
                                <input type="date" class="form-control" id="monitor_date" placeholder="Tanggal Fix Asset" name="monitor_date" required="" value="{{ $dataComputer->get_monitor->fix_asset->fixed_asset_date ?? '' }}">
                            </div>

                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
