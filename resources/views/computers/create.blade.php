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

  <div class="row">
    <div class="col-md-8 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Input <small>different form elements</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
          {{-- <form id="form"   data-parsley-validate class="form-horizontal form-label-left">
            <h5>Data User</h5>
            <div class="col-lg-6 mb-3">
              <label for="nik">NIK User</label>
              <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" required=""
                value="{{ old('nik') ?? '' }}"> 
                @if ($errors->has('nik')) 
                  <span class="text-danger">{{ $errors->first('nik') }}</span> 
                @endif 
            </div>

            <div class="col-lg-6 mb-3">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required=""
                value="{{ old('nama') ?? '' }}">  
                @if ($errors->has('nama')) 
                  <span class="text-danger">{{ $errors->first('nama') }}</span> 
                @endif
            </div>

            <div class="col-lg-12 mb-3">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" placeholder="Email" name="email" required=""
                value="{{ old('email') ?? '' }}">  
                @if ($errors->has('email')) 
                  <span class="text-danger">{{ $errors->first('email') }}</span> 
                @endif
            </div>

            <div class="col-lg-6 mb-3">
              <label for="user_logon">User Logon</label>
              <input type="text" class="form-control" id="user_logon" placeholder="User Logon" name="user_logon" required=""
                value="{{ old('user_logon') ?? '' }}">  
                @if ($errors->has('user_logon')) 
                  <span class="text-danger">{{ $errors->first('user_logon') }}</span> 
                @endif
            </div>

            <div class="col-lg-6 mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                value="{{ old('password') ?? '' }}">  
                @if ($errors->has('password')) 
                  <span class="text-danger">{{ $errors->first('password') }}</span> 
                @endif
            </div>

            <div class="col-lg-6 mb-3">
              <label for="section">Section</label>
              <input type="section" class="form-control" id="section" placeholder="Section" name="section"
                value="{{ old('section') ?? '' }}">  
                @if ($errors->has('section')) 
                  <span class="text-danger">{{ $errors->first('section') }}</span> 
                @endif
            </div>

            <div class="col-lg-6 mb-3">
              <label for="position">Position</label>
              <input type="position" class="form-control" id="position" placeholder="Position" name="position"
                value="{{ old('position') ?? '' }}">  
                @if ($errors->has('position')) 
                  <span class="text-danger">{{ $errors->first('position') }}</span> 
                @endif
            </div>
          </form> --}}

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
              <div id="step-1" class="tab-pane" role="tabpanel">
                <form class="form-horizontal form-label-left">
                  <div class="col-lg-6 mb-3">
                    <label for="nik">NIK User</label>
                    <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" required=""
                      value="{{ old('nik') ?? '' }}"> 
                      @if ($errors->has('nik')) 
                        <span class="text-danger">{{ $errors->first('nik') }}</span> 
                      @endif 
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required=""
                      value="{{ old('nama') ?? '' }}">  
                      @if ($errors->has('nama')) 
                        <span class="text-danger">{{ $errors->first('nama') }}</span> 
                      @endif
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" required=""
                      value="{{ old('email') ?? '' }}">  
                      @if ($errors->has('email')) 
                        <span class="text-danger">{{ $errors->first('email') }}</span> 
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="user_logon">User Logon</label>
                    <input type="text" class="form-control" id="user_logon" placeholder="User Logon" name="user_logon" required=""
                      value="{{ old('user_logon') ?? '' }}">  
                      @if ($errors->has('user_logon')) 
                        <span class="text-danger">{{ $errors->first('user_logon') }}</span> 
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                      value="{{ old('password') ?? '' }}">  
                      @if ($errors->has('password')) 
                        <span class="text-danger">{{ $errors->first('password') }}</span> 
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="section">Section</label>
                    <input type="section" class="form-control" id="section" placeholder="Section" name="section"
                      value="{{ old('section') ?? '' }}">  
                      @if ($errors->has('section')) 
                        <span class="text-danger">{{ $errors->first('section') }}</span> 
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="position">Position</label>
                    <input type="position" class="form-control" id="position" placeholder="Position" name="position"
                      value="{{ old('position') ?? '' }}">  
                      @if ($errors->has('position')) 
                        <span class="text-danger">{{ $errors->first('position') }}</span> 
                      @endif
                  </div>
                </form>
              </div>
              <div id="step-2" class="tab-pane" role="tabpanel">
                <form class="form-horizontal form-label-left">
                  <div class="col-lg-12 mb-3">
                    <label for="pc_name">PC Name</label>
                    <input type="text" class="form-control" id="pc_name" placeholder="PC Name" name="pc_name" required=""
                      value="{{ old('pc_name') ?? '' }}"> 
                      @if ($errors->has('pc_name')) 
                        <span class="text-danger">{{ $errors->first('pc_name') }}</span> 
                      @endif 
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="brand">Brand PC</label>
                    <select class="custom-select" name="brand">
                      <option value="">-- Choose --</option>
                      <option value="HP">HP</option>
                      <option value="DELL">DELL</option>
                      <option value="RAKITAN">RAKITAN</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="processor">Processor</label>
                    <select class="custom-select" id="processor" name="processor">
                      <option value="">-- Choose --</option>
                      <option value="Intel &reg; Core™ i5-6500 Processor">Intel &reg; Core™ i5-6500 Processor</option>
                      <option value="Intel &reg; Core™ i5-4590 Processor">Intel &reg; Core™ i5-4590 Processor</option>
                      <option value="Intel &reg; Core™ i5-3470 Processor">Intel &reg; Core™ i5-3470 Processor</option>
                      <option value="Intel &reg; Core™ i3-8100 Processor">Intel &reg; Core™ i3-8100 Processor</option>
                      <option value="Intel &reg; Core™ i3-7100 Processor">Intel &reg; Core™ i3-7100 Processor</option>
                      <option value="Intel &reg; Core™ i3-6100 Processor">Intel &reg; Core™ i3-6100 Processor</option>
                      <option value="Intel &reg; Core™ i3-6100T Processor">Intel &reg; Core™ i3-6100T Processor</option>
                      <option value="Intel &reg; Core™ i3-4160 Processor">Intel &reg; Core™ i3-4160 Processor</option>
                      <option value="Intel &reg; Core™ i3-4100M Processor">Intel &reg; Core™ i3-4100M Processor</option>
                      <option value="Intel &reg; Core™ i3-3240 Processor">Intel &reg; Core™ i3-3240 Processor</option>
                      <option value="Intel &reg; Core™2 Duo Processor E7500">Intel &reg; Core™2 Duo Processor E7500</option>
                      <option value="Intel &reg; Pentium &reg; Processor E5700">Intel &reg; Pentium &reg; Processor E5700</option>
                      <option value="Intel &reg; Pentium &reg; Processor E5500">Intel &reg; Pentium &reg; Processor E5500</option>
                      <option value="Intel &reg; Pentium &reg; Processor E5400">Intel &reg; Pentium &reg; Processor E5400</option>
                      <option value="Intel &reg; Pentium &reg; Processor E5300">Intel &reg; Pentium &reg; Processor E5300</option>
                      <option value="Intel &reg; Pentium &reg; Processor E5200">Intel &reg; Pentium &reg; Processor E5200</option>
                      <option value="Intel &reg; Pentium &reg; Processor E2200">Intel &reg; Pentium &reg; Processor E2200</option>
                      <option value="Intel &reg; Pentium &reg; Processor E2180">Intel &reg; Pentium &reg; Processor E2180</option>
                      <option value="Intel &reg; Pentium &reg; Processor G2030">Intel &reg; Pentium &reg; Processor G2030</option>
                      <option value="Intel &reg; Pentium &reg; Processor G2010">Intel &reg; Pentium &reg; Processor G2010</option>
                      <option value="Intel &reg; Pentium &reg; Processor G630">Intel &reg; Pentium &reg; Processor G630</option>
                      <option value="Intel &reg; Pentium &reg; 4 Processor">Intel &reg; Pentium &reg; 4 Processor</option>
                      <option value="Intel &reg; Xeon &reg; Processor 3040">Intel &reg; Xeon &reg; Processor 3040</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="OS">OS</label>
                    <select class="custom-select" name="OS">
                      <option value="">-- Choose --</option>
                      <option value="Windows 7 Pro">Windows 7 Pro</option>
                      <option value="Windows 10 Pro">Windows 10 Pro</option>
                    </select>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="ram">Ram</label>
                    <input type="text" class="form-control" id="ram" placeholder="Ram" name="ram" required=""
                      value="{{ old('ram') ?? '' }}">  
                      @if ($errors->has('ram')) 
                        <span class="text-danger">{{ $errors->first('ram') }}</span> 
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="hdd">HDD</label>
                    <input type="text" class="form-control" id="hdd" placeholder="HDD" name="hdd" required=""
                      value="{{ old('hdd') ?? '' }}">  
                      @if ($errors->has('hdd')) 
                        <span class="text-danger">{{ $errors->first('hdd') }}</span> 
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="ip">IP Komputer</label>
                    <input type="text" class="form-control" id="ip" placeholder="IP Komputer" name="ip" required=""
                      value="{{ old('ip') ?? '' }}">  
                      @if ($errors->has('ip')) 
                        <span class="text-danger">{{ $errors->first('ip') }}</span> 
                      @endif
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="Internet">Internet</label>
                    <select class="custom-select" name="Internet">
                      <option value="">-- Choose --</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>

                  <h2>Fix Asset Komputer</h2>
                  <div class="col-lg-6 mb-3">
                    <label for="kom_fix_no">Nomor Fix Asset</label>
                    <input type="text" class="form-control" id="kom_fix_no" placeholder="Nomor Fix Asset Komputer" name="kom_fix_no" required=""
                      value="{{ old('kom_fix_no') ?? '' }}">  
                      @if ($errors->has('kom_fix_no')) 
                        <span class="text-danger">{{ $errors->first('kom_fix_no') }}</span> 
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="kom_edp_no">EDP No</label>
                    <input type="text" class="form-control" id="kom_edp_no" placeholder="EDP No" name="kom_edp_no" required=""
                      value="{{ old('kom_edp_no') ?? '' }}">  
                      @if ($errors->has('kom_edp_no')) 
                        <span class="text-danger">{{ $errors->first('kom_edp_no') }}</span> 
                      @endif
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="kom_date">Tanggal Fix Asset</label>
                    <input type="date" class="form-control" id="kom_date" placeholder="Tanggal Fix Asset" name="kom_date"
                      required="">
                  </div>
                </form>
              </div>
              <div id="step-3" class="tab-pane" role="tabpanel">
                <form action="">

                  <div class="col-md-6 mb-3">
                    <label for="nsi">NSI</label>
                    <select class="custom-select" name="nsi">
                      <option value="">-- Choose --</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="boss">BOSS</label>
                    <select class="custom-select" name="boss">
                      <option value="">-- Choose --</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>
                  
                  <div class="col-md-6 mb-3">
                    <label for="Microsoft Office">Microsoft Office</label>
                    <select class="custom-select" name="Microsoft Office">
                      <option value="">-- Choose --</option>
                      <option value="Microsoft Office 2013">Microsoft Office 2013</option>
                      <option value="Microsoft Office 2010">Microsoft Office 2010</option>
                      <option value="Microsoft Office 2007">Microsoft Office 2007</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="Antivirus">Antivirus</label>
                    <select class="custom-select" name="Antivirus">
                      <option value="">-- Choose --</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="wsus">WSUS</label>
                    <select class="custom-select" name="wsus">
                      <option value="">-- Choose --</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="click_one">Click One</label>
                    <select class="custom-select" name="click_one">
                      <option value="">-- Choose --</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="ax">AX</label>
                    <select class="custom-select" name="ax">
                      <option value="">-- Choose --</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="schedule_ppc">Schedule PPC</label>
                    <select class="custom-select" name="schedule_ppc">
                      <option value="">-- Choose --</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="ups">UPS</label>
                    <select class="custom-select" name="ups">
                      <option value="">-- Choose --</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="location">Location</label>
                    <select class="custom-select" name="location">
                      <option value="">-- Choose --</option>
                      <option value="PULOGADUNG">PULOGADUNG</option>
                      <option value="KRAWANG">KRAWANG</option>
                    </select>
                  </div>
                </form>
              </div>
              <div id="step-4" class="tab-pane" role="tabpanel">
                <form action="">
                  <div class="col-md-6 mb-3">
                    <label for="brand_monitor">Brand Monitor</label>
                    <select class="custom-select" name="brand_monitor">
                      <option value="">-- Choose --</option>
                      <option value="LG">LG</option>
                      <option value="SAMSUNG">SAMSUNG</option>
                      <option value="DELL">DELL</option>
                      <option value="HP">HP</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="port_display">Port Dislay</label>
                    <select class="custom-select" name="port_display">
                      <option value="">-- Choose --</option>
                      <option value="VGA">VGA</option>
                      <option value="HDMI">HDMI</option>
                      <option value="DISPLAY PORT">DISPLAY PORT</option>
                    </select>
                  </div>

                  <h2>Fix Asset Komputer</h2>
                  <div class="col-lg-6 mb-3">
                    <label for="monitor_fix_no">Nomor Fix Monitor</label>
                    <input type="text" class="form-control" id="monitor_fix_no" placeholder="Nomor Fix Asset Komputer" name="monitor_fix_no" required=""
                      value="{{ old('monitor_fix_no') ?? '' }}">  
                      @if ($errors->has('monitor_fix_no')) 
                        <span class="text-danger">{{ $errors->first('monitor_fix_no') }}</span> 
                      @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="edp_monitor_no">EDP No</label>
                    <input type="text" class="form-control" id="edp_monitor_no" placeholder="EDP No" name="edp_monitor_no" required=""
                      value="{{ old('edp_monitor_no') ?? '' }}">  
                      @if ($errors->has('edp_monitor_no')) 
                        <span class="text-danger">{{ $errors->first('edp_monitor_no') }}</span> 
                      @endif
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="monitor_date">Tanggal Fix Asset</label>
                    <input type="date" class="form-control" id="monitor_date" placeholder="Tanggal Fix Asset" name="monitor_date"
                      required="">
                  </div>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
