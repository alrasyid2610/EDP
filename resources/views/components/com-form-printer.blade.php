<div class="form-printer form-group col-12">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Printer Brand</label>
            <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][printer_brand]" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="col-12 col-md-6 col-md-6 mb-3">
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
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="dataGoods[goods][{{ $jumlahData }}][lpt]" id="" value="lpt">
                    LPT
                </label>
            </div>
        </div>

        <div class="col-12 col-md-6 col-md-6">
            <label for="">Type</label>
            <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][type]" id="" aria-describedby="helpId" placeholder="">
        </div>

        <div class="col-12 col-md-6 col-md-6">
            <label for="">IP</label>
            <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][ip]" id="" aria-describedby="helpId" placeholder="">
        </div>
    </div>
</div>