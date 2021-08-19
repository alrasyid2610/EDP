<div class="form-os form-group col-12">
    <div class="row">
        <input type="hidden" name="dataGoods[conditionGoods][]" value="New">
        
        <div class="col-md-4 mb-3">
            <label for="">Microsoft Office</label>
            {{-- <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][scanner_brand]" id="" aria-describedby="helpId" placeholder=""> --}}
            <select class="custom-select" name="dataGoods[goods][{{ $jumlahData }}][ms_office]">
                <option value="">-- Choose --</option>
                <option value="MS Office Home & Bussiness 2016">MS Office Home & Bussiness 2016</option>
                <option value="MS Office Home & Bussiness 2019">MS Office Home & Bussiness 2019</option>
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label for="">Qty</label>
            <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][qty]" id="" aria-describedby="helpId" placeholder="">
        </div>


    </div>
</div>