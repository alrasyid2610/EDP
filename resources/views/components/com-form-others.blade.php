<div class="form-printer form-group col-12">
    <div class="row">
        <input type="hidden" name="dataGoods[conditionGoods][]" value="New">
        <div class="col-md-6 mb-3">
            <label for="">Item Name</label>
            <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][item_name]" id="" aria-describedby="helpId" placeholder="">
        </div>

        <div class="col-12 col-md-6 col-md-6">
            <label for="">Qty</label>
            <input qty="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][qty]" id="" aria-describedby="helpId" placeholder="">
        </div>

        <div class="col-12 col-md-12">
            <label for="">Description</label>
            <input type="text" class="form-control" name="dataGoods[goods][{{ $jumlahData }}][description][description]" id="" aria-describedby="helpId" placeholder="">
            <small id="emailHelp" class="form-text text-muted">Optional</small>
        </div>
    </div>
</div>