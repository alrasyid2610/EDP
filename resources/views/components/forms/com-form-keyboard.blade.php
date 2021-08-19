<div class="form-row form-keyboard">
        <input type="hidden" name="dataGoods[conditionGoods][]" value="New">
        {{-- <div class="col-md-4 mb-3">
            <label for="">Brand</label>
            <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][brand]" id="" aria-describedby="helpId" placeholder="">
        </div> --}}

        <div class="col-12 col-md-3 mb-3 form-group">
            <label for="">Brand and Type</label>
            {{-- <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][scanner_brand]" id="" aria-describedby="helpId" placeholder=""> --}}
            <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][item_name]">
                <option value="">-- Choose --</option>
                <optgroup label="Keyboard">
                    <option value="Logitech K120">Logitech K120</option>
                    <option value="Logitech K100">Logitech K100</option>
                </optgroup>

                <optgroup label="Mouse">
                    <option value="Logitech B120">Logitech B120</option>
                    <option value="Logitech B100">Logitech B100</option>
                </optgroup>

            </select>
        </div>
        

        <div class="col-md-3 mb-3 form-group">
            <label for="">Port Connection</label>
            {{-- <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][scanner_brand]" id="" aria-describedby="helpId" placeholder=""> --}}
            <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][description][]">
                <option value="">-- Choose --</option>
                <option value="USB">USB</option>
                <option value="PS2">PS2</option>
            </select>
        </div>

        <div class="col-12 col-md-3 form-group">
            <label for="">Qty</label>
            <input qty="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][qty]" id="" aria-describedby="helpId" placeholder="">
        </div>

        <div class="col-12 col-md-3 form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][description][description]" id="" aria-describedby="helpId" placeholder="">
            <small id="emailHelp" class="form-text text-muted">Optional</small>
        </div>
        
        {{-- <div class="col-12 col-md-4">
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

            
        </div> --}}
</div>