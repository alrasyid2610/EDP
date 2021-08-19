@php
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
@endphp
 

<div class="form-monitor col-12">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
              <label for="">PC Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][pc_name][]" id="" aria-describedby="helpId" placeholder="PC Name" required>
              {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <label for="monitor_brand">Monitor Brand <span class="text-danger">*</span></label>
            <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][monitor_brand]" required>
            <option value="">-- Choose --</option>
            @php
                loopSelectData($dataBrandMonitor, 'monitor_brand');
            @endphp
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="screen_plugs">Port Dislay <span class="text-danger">*</span></label>
            <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][screen_plugs]" required>
            <option value="">-- Choose --</option>
            @php
                loopSelectData($dataScreenPlugs, 'screen_plugs');
            @endphp
            </select>
        </div>

        

        <div class="col-md-4 mb-3">
            <label for="screen_plugs">Screen Size <sub>Optional</sub></label>
            <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][screen_size]">
                <option value="">-- Choose --</option>
                <option value="15">15"</option>
                <option value="18">18"</option>
                <option value="20">20"</option>
                <option value="22">22"</option>
                <option value="24">24"</option>
                {{-- <option value="">-- Choose --</option> @php loopSelectData($dataScreenPlugs, 'screen_plugs'); @endphp --}}
            </select>
        </div>
    </div>
</div>