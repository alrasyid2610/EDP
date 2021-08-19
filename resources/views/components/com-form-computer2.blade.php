
@php
    

    $dataProcessor = [
        'Intel &reg; Core&trade; i5-6500 Processor',
        'Intel &reg; Core&trade; i5-4590 Processor',
        'Intel &reg; Core&trade; i5-3470 Processor',
        'Intel &reg; Core&trade; i3-8100 Processor',
        'Intel &reg; Core&trade; i3-7100 Processor',
        'Intel &reg; Core&trade; i3-6100 Processor',
        'Intel &reg; Core&trade; i3-6100T Processor',
        'Intel &reg; Core&trade; i3-4160 Processor',
        'Intel &reg; Core&trade; i3-4100M Processor',
        'Intel &reg; Core&trade; i3-3240 Processor',
        'Intel &reg; Core&trade;2 Duo Processor E7500',
        'Intel &reg; Pentium &reg; Processor E5700',
        'Intel &reg; Pentium &reg; Processor E5500',
        'Intel &reg; Pentium &reg; Processor E5400',
        'Intel &reg; Pentium &reg; Processor E5300',
        'Intel &reg; Pentium &reg; Processor E5200',
        'Intel &reg; Pentium &reg; Processor E2200',
        'Intel &reg; Pentium &reg; Processor E2180',
        'Intel &reg; Pentium &reg; Processor G2030',
        'Intel &reg; Pentium &reg; Processor G2020',
        'Intel &reg; Pentium &reg; Processor G2010',
        'Intel &reg; Pentium &reg; Processor G630',
        'Intel &reg; Pentium &reg; 4 Processor',
        'Intel &reg; Xeon &reg; Processor 3040',
    ];

    $dataBrandPc = [
        'HP',
        'DELL',
        'ASUS',
        'RAKITAN'
    ];

    $dataOs = [
        'Windows 7 Pro',
        'Windows 10 Pro'
    ];

    // Data untuk nilai enum (yes,NO)
    $dataEnumYN = [
        'YES',
        'NO'
    ];

    $dataMicrosoftOffice = [
        'Microsoft Office 2013',
        'Microsoft Office 2010',
        'Microsoft Office 2007'
    ];
    
    $dataLocation = [
        'PULOGADUNG',
        'KRAWANG'
    ];  

    $dataBrandMonitor = [
        'LG',
        'SAMSUNG',
        'DELL',
        'HP'
    ];

    $dataScreenPlugs = [
        'VGA',
        'HDMI',
        'DISPLAY PORT'
    ];

    $dataComputerOperation = [
      'One User',
      'Many User'
    ];

    // dd($dataComputer[0]->location);

    
    
    /**
     * @param $data -> data yang akan di tampilkan, ARRAY
     * @param $val -> values dari database
     * @param $key -> 
     * */
    if (isset($dataComputer[0])) {
        $GLOBALS['a'] = $dataComputer[0];
    }

    // dd($dataComputer[0]->nsi);

    
    if (!function_exists('loopSelectData')) {
        function loopSelectData ($data, $val) {
            foreach ($data as $item) {
                if (isset($GLOBALS['a'])) {
                    if ( $item == htmlentities($GLOBALS['a']->$val) ) {
                        echo "<option value='$item' selected>$item</option>";
                    } else {
                        echo "<option value='$item'>$item</option>";
                    }
                } else {
                    echo "<option value='$item'>$item</option>";
                }
            }
        }
    }
    

    // dd(loopSelectData("saf", "safsaf"));

    
@endphp




<div class="form-computer">
    <div class="row mb-3 item">
        <div class="col-4">
            <h6>Data Item </h6>
        </div>
        <div class="col-8 text-right">
            Use Prefix Name <input type="checkbox" class="prefix" onchange="use_prefix(this)" name="dataGoods[prefix][]">
        </div>
    </div>

    

    


    <div class="row">
        <div class="col-12">
            <h6>Data Hardware</h6>
        </div>
    </div>
    

    
    
    <div class="col-lg-6 mb-3">
        <label for="computer_operation">Computer Operation</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][computer_operation]">
        <option value="">-- Choose --</option>  
        @php
            loopSelectData(getDataComputerOperation(), 'computer_operation');
        @endphp
        </select>
    </div>

    {{-- <div class="col-2 col-md-2 mb-3">
        <label for="">License</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" id="license">
                OS
            </label>

        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" id="license">
                MICROSOFT OFFICE
            </label>

        </div>
    </div> --}}

    <div class="col-md-12 mb-3">
        <label for="pc_brand">Brand PC</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][pc_brand]">
        <option value="">-- Choose --</option>  
        @php
            loopSelectData(getDataBrandPc(), 'pc_brand');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="processor">Processor</label>
        <select class="custom-select" id="processor" name="dataGoods[goods][{{ $jumlahData }}][processor]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataProcessor(), 'processor');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="operating_system">OS</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][operating_system]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataOs(), 'operating_system');
        @endphp
        </select>
    </div>

    <div class="col-lg-6 mb-3">
        <label for="ram">Ram</label>
        <input type="text" class="form-control" id="ram" placeholder="Ram" name="dataGoods[goods][{{ $jumlahData }}][ram]" required=""
        value="{{ $dataComputer[0]->ram ?? '' }}">  
        @if ($errors->has('ram')) 
            <span class="text-danger">{{ $errors->first('ram') }}</span> 
        @endif
    </div>

    <div class="col-lg-6 mb-3">
        <label for="hdd">HDD</label>
        <input type="text" class="form-control" id="hdd" placeholder="HDD" name="dataGoods[goods][{{ $jumlahData }}][hdd]" required=""
        value="{{ $dataComputer[0]->hdd ?? '' }}">  
        @if ($errors->has('hdd')) 
            <span class="text-danger">{{ $errors->first('hdd') }}</span> 
        @endif
    </div>

    <div class="col-lg-6 mb-3">
        <label for="ip">IP Komputer</label>
        <input type="text" class="form-control" id="ip" placeholder="IP Komputer" name="dataGoods[goods][{{ $jumlahData }}][ip]" required=""
        value="{{ $dataComputer[0]->ip ?? '' }}">  
        @if ($errors->has('ip')) 
            <span class="text-danger">{{ $errors->first('ip') }}</span> 
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label for="internet">Internet</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][internet]">
        <option value="">-- Choose --</option>
            @php
            loopSelectData(getDataEnumYN(), 'internet');
        @endphp
        </select>
    </div>

    <div class="col-lg-12 mb-3">
        <label for="computer_description">Computer Description</label>
        <textarea name="dataGoods[goods][{{ $jumlahData }}][computer_description]"  class="form-control" id="" cols="30" rows="3">{{ $dataComputer[0]->computer_description ?? '' }}</textarea>
        @if ($errors->has('computer_description')) 
            <span class="text-danger">{{ $errors->first('computer_description') }}</span> 
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label for="nsi">NSI</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][nsi]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataEnumYN(), 'nsi');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="boss">BOSS</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][boss]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataEnumYN(), 'boss');
        @endphp
        </select>
    </div>
    
    <div class="col-md-6 mb-3">
        <label for="ms_office">Microsoft Office</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][ms_office]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataMicrosoftOffice(), 'ms_office');
        @endphp
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="antivirus">Antivirus</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][antivirus]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataEnumYN(), 'antivirus');
        @endphp
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="wsus">WSUS</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][wsus]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataEnumYN(), 'wsus');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="click_one">Click One</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][click_one]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataEnumYN(), 'click_one');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="ax">AX</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][ax]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataEnumYN(), 'ax');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="schedule_ppc">Schedule PPC</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][schedule_ppc]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataEnumYN(), 'schedule_ppc');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="ups">UPS</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][ups]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataEnumYN(), 'ups');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="location">Location</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][location]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData(getDataLocation(), 'location');
        @endphp
        </select>
    </div>
    {{-- <div class="col-md-6 col-12 mb-3">
        <label for="pc_name">PC Name</label>
        <input type="text" class="form-control" id="pc_name" placeholder="PC Name" name="dataGoods[goods][{{ $jumlahData }}][pc_name]" required=""
        value="{{ $dataComputer[0]->pc_name ?? '' }}">  
        @if ($errors->has('pc_name')) 
            <span class="text-danger">{{ $errors->first('pc_name') }}</span> 
        @endif
    </div>
    
    <div class="col-md-6 col-12 mb-3">
        <label for="pc_brand">Brand PC</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][pc_brand]">
        <option value="">-- Choose --</option>  
        @php
            loopSelectData($dataBrandPc, 'pc_brand');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="processor">Processor</label>
        <select class="custom-select" id="processor" name="dataGoods[goods][{{ $jumlahData }}][processor]">
        <option value="">-- Choose --</option>
        @php
            loopSelectData($dataProcessor, 'processor');
        @endphp
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="operating_system">OS</label>
        <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][operating_system]">
        <option value="">-- Choose --</option>\
        @php
            loopSelectData($dataOs, 'operating_system');
        @endphp
        </select>
    </div>

    <div class="col-lg-6 mb-3">
        <label for="ram">Ram</label>
        <input type="text" class="form-control" id="ram" placeholder="Ram" name="dataGoods[goods][{{ $jumlahData }}][ram]" required=""
        value="{{ $dataComputer[0]->ram ?? '' }}">  
        @if ($errors->has('ram')) 
            <span class="text-danger">{{ $errors->first('ram') }}</span> 
        @endif
    </div>

    <div class="col-lg-6 mb-3">
        <label for="hdd">HDD</label>
        <input type="text" class="form-control" id="hdd" placeholder="HDD" name="dataGoods[goods][{{ $jumlahData }}][hdd]" required=""
        value="{{ $dataComputer[0]->hdd ?? '' }}">  
        @if ($errors->has('hdd')) 
            <span class="text-danger">{{ $errors->first('hdd') }}</span> 
        @endif
    </div>

    <div class="col-lg-12 mb-3">
        <label for="computer_description">Computer Description</label>
        <textarea name="dataGoods[goods][{{ $jumlahData }}][computer_description]"  class="form-control" id="" cols="30" rows="3">{{ $dataComputer[0]->computer_description ?? '' }}</textarea>
        @if ($errors->has('computer_description')) 
            <span class="text-danger">{{ $errors->first('computer_description') }}</span> 
        @endif
    </div> --}}

    

    <div id="data_qty" class="d-none" data-val="{{ $qty }}"></div>

</div>

