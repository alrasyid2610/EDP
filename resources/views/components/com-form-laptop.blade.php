<div class="mb-4 form-laptop col-12">
    <input type="hidden" name="dataGoods[conditionGoods][]" value="New">


        <div class="row">
            <div class="col-md-8 mb-3">
                <input type="hidden" name="dataGoods[goods][{{ $jumlahData }}][laptop_device_id]" value="" class="laptop_device_id">
                <label for="brand">Laptop Device</label>
                <select 
                    class="custom-select" 
                    name="dataGoods[goods][{{ $jumlahData }}][laptop_brand]" 
                    {{-- v-model="laptopDevice" --}}
                    onchange="selected(this)"
                    required>
                    <option selected value="">-- Choose --</option>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data_laptop as $item )
                        <option 
                            id="{{ $item['label_laptop'] }}"
                            value="{{ $item['brand'] . $no}}" {{ old('brand', '')=='LENOVO' ? 'selected' : ''  }}>{{ $item['label_laptop'] }}</option>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </select> 
                @if ($errors->has('brand')) 
                    <span class="text-danger">{{ $errors->first('brand') }}</span> 
                @endif
                 @php
                    $no = 1;
                @endphp

                <div class="row">
                    <div class="col-md-12 mb-3 mt-3">
                        <label for="Qty">Qty</label>
                        <input type="text" class="form-control" id="type" placeholder="Enter Qty Laptop" name="dataGoods[goods][{{ $jumlahData }}][qty]" required=""
                        value="{{ old('Qty') ?? '' }}"> 
                        @if ($errors->has('Qty')) 
                        <span class="text-danger">{{ $errors->first('Qty') }}</span> 
                        @endif 
                    </div>
                </div>

                 @foreach ($data_laptop as $item )
                    <div class="col-8 d-none laptop-detail {{ $item['brand'] . $no }}" data-device='{{ $item['id'] }}'>
                        <div class="label-row">
                            <p class="mb-0"> <span class="label">Brand</span>: {{ $item['brand'] }}</p>
                        </div>
                        <div class="label-row">
                            <p class="mb-0"> <span class="label">Type</span>: {{ $item['type'] }}</p>
                        </div>
                        <div class="label-row">
                            <p class="mb-0"> <span class="label">Series</span>: {{ $item['series'] }}</p>
                        </div>
                        <div class="label-row">
                            <p class="mb-0"> <span class="label">Processor</span>: {{ $item['processor'] }}</p>
                        </div>
                        <div class="label-row">
                            <p class="mb-0"> <span class="label">Operation System</span>: {{ $item['os'] }}</p>
                        </div>
                        <div class="label-row">
                            <p class="mb-0"> <span class="label">RAM</span>: {{ $item['ram'] }} GB</p>
                        </div>
                        <div class="label-row">
                            <p class="mb-0"> <span class="label">Storage</span>:  {{ $item['type_storage'] }} {{ $item['storage'] }} GB</p>
                        </div>
                    </div>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </div>
        </div>
    
        
    
    {{-- <div class="form-group">
        <div class="col-6">
            <div class="col-6 mb-4 pc_name">
                <label for="pc_name">Fix Asset Awal ${index + 1} </label>
                <input type="text" class="form-control" id="pc_name${index + 1}" placeholder="PC Name" name="dataGoods[goods][${jumlahGoods}][pc_name][]" required="">  
            </div>
        </div>
    </div> --}}
    
</div>