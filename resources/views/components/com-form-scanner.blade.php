<div class="form-scanner form-group col-12">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="">Scanner Brand</label>
            {{-- <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][scanner_brand]" id="" aria-describedby="helpId" placeholder=""> --}}
            <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][scanner_brand]">
                <option value="">-- Choose --</option>
                <option value="FUJITSU">FUJITSU</option>
                <option value="EPSON">EPSON</option>
                <option value="HP">HP</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="">Scanner Type</label>
            <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][type_scanner]" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="col-12 col-md-4">
            <label for="">Connection</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="dataGoods[goods][{{ $jumlahData }}][network]" id="" value="network" >
                    Ethernet
                </label>
            </div>
            
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="dataGoods[goods][{{ $jumlahData }}][usb]" id="" value="usb">
                    USB
                </label>
            </div>

            
        </div>
    </div>
</div>