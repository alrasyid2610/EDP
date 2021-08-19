<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="{{ route('test2') }}" method="POST">
    @csrf

    <div class="form-row container-input">
      <div class="form-group col-3">
        <label for="no_bon">Types of Goods</label>
        <select class="form-control select-item" id="select-item1" onchange="selectItem(this)" name="dataBarang[barang1][typeBarang]">
          <option value="">-- Choese --</option>
          <optgroup label="Computer Components and Peripherals">
            <option value="computer">Computer</option>
            <option value="monitor">Monitor</option>
            <option value="printer">Printer</option>
            <option value="scanner">Scanner</option>
            <option value="mouse">Mouse</option>
            <option value="keyboard">Keyboard</option>
            <option value="HDD">HDD</option>
            <option value="Microsoft Office">Microsoft Office</option>
            <option value="Operation System">Operation System</option>
          </optgroup>
          <optgroup label="Network Equipments">
            <option value="HUB">HUB</option>
            <option value="network_cable">Network Cable</option>
            <option value="rj45_connector">RJ45 connector</option>
          </optgroup>
        </select>
      </div>
      <div class="form-group col-5 select-condition">
        <label for="no_bon">Select Conditions</label>
        <select class="form-control" onchange="selectCondition(this)" name="dataBarang[barang1][conditionGoods]">
          <option value="">-- Choese --</option>
          <option value="New">New Goods for User / Section</option>
          <option value="Replacement">Replacement</option>
        </select>
      </div>
      <div class="form-computer">
        <div class="col-md-12 mb-3">
          <label for="pc_brand">Brand PC</label>
          <select class="custom-select" name="pc_brand">
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
            <option value="Intel ® Core™ i5-6500 Processor">Intel ® Core™ i5-6500 Processor</option>
            <option value="Intel ® Core™ i5-4590 Processor">Intel ® Core™ i5-4590 Processor</option>
            <option value="Intel ® Core™ i5-3470 Processor">Intel ® Core™ i5-3470 Processor</option>
            <option value="Intel ® Core™ i3-8100 Processor">Intel ® Core™ i3-8100 Processor</option>
            <option value="Intel ® Core™ i3-7100 Processor">Intel ® Core™ i3-7100 Processor</option>
            <option value="Intel ® Core™ i3-6100 Processor">Intel ® Core™ i3-6100 Processor</option>
            <option value="Intel ® Core™ i3-6100T Processor">Intel ® Core™ i3-6100T Processor</option>
            <option value="Intel ® Core™ i3-4160 Processor">Intel ® Core™ i3-4160 Processor</option>
            <option value="Intel ® Core™ i3-4100M Processor">Intel ® Core™ i3-4100M Processor</option>
            <option value="Intel ® Core™ i3-3240 Processor">Intel ® Core™ i3-3240 Processor</option>
            <option value="Intel ® Core™2 Duo Processor E7500">Intel ® Core™2 Duo Processor E7500</option>
            <option value="Intel ® Pentium ® Processor E5700">Intel ® Pentium ® Processor E5700</option>
            <option value="Intel ® Pentium ® Processor E5500">Intel ® Pentium ® Processor E5500</option>
            <option value="Intel ® Pentium ® Processor E5400">Intel ® Pentium ® Processor E5400</option>
            <option value="Intel ® Pentium ® Processor E5300">Intel ® Pentium ® Processor E5300</option>
            <option value="Intel ® Pentium ® Processor E5200">Intel ® Pentium ® Processor E5200</option>
            <option value="Intel ® Pentium ® Processor E2200">Intel ® Pentium ® Processor E2200</option>
            <option value="Intel ® Pentium ® Processor E2180">Intel ® Pentium ® Processor E2180</option>
            <option value="Intel ® Pentium ® Processor G2030">Intel ® Pentium ® Processor G2030</option>
            <option value="Intel ® Pentium ® Processor G2020">Intel ® Pentium ® Processor G2020</option>
            <option value="Intel ® Pentium ® Processor G2010">Intel ® Pentium ® Processor G2010</option>
            <option value="Intel ® Pentium ® Processor G630">Intel ® Pentium ® Processor G630</option>
            <option value="Intel ® Pentium ® 4 Processor">Intel ® Pentium ® 4 Processor</option>
            <option value="Intel ® Xeon ® Processor 3040">Intel ® Xeon ® Processor 3040</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="operating_system">OS</label>
          <select class="custom-select" name="operating_system">
            <option value="">-- Choose --</option>
            <option value="Windows 7 Pro">Windows 7 Pro</option>
            <option value="Windows 10 Pro">Windows 10 Pro</option>
          </select>
        </div>
        <div class="col-lg-6 mb-3">
          <label for="ram">Ram</label>
          <input type="text" class="form-control" id="ram" placeholder="Ram" name="ram" required="" value="">
        </div>
        <div class="col-lg-6 mb-3">
          <label for="hdd">HDD</label>
          <input type="text" class="form-control" id="hdd" placeholder="HDD" name="hdd" required="" value="">
        </div>
        <div class="col-lg-12 mb-3">
          <label for="computer_description">Computer Description</label>
          <textarea name="computer_description" class="form-control" id="" cols="30" rows="3"></textarea>
        </div>
      </div>
    </div>

    <br><br><br>

    <div class="form-row container-input">
      <div class="form-group col-3">
        <label for="no_bon">Types of Goods</label>
        <select class="form-control select-item" id="select-item2" onchange="selectItem(this)" name="dataBarang[][typeBarang]">
          <option value="">-- Choese --</option>
          <optgroup label="Computer Components and Peripherals">
            <option value="computer">Computer</option>
            <option value="monitor">Monitor</option>
            <option value="printer">Printer</option>
            <option value="scanner">Scanner</option>
            <option value="mouse">Mouse</option>
            <option value="keyboard">Keyboard</option>
            <option value="HDD">HDD</option>
            <option value="Microsoft Office">Microsoft Office</option>
            <option value="Operation System">Operation System</option>
          </optgroup>
          <optgroup label="Network Equipments">
            <option value="HUB">HUB</option>
            <option value="network_cable">Network Cable</option>
            <option value="rj45_connector">RJ45 connector</option>
          </optgroup>
        </select>
      </div>
      <div class="form-group col-5 select-condition">
        <label for="no_bon">Select Conditions</label>
        <select class="form-control" onchange="selectCondition(this)" name="dataBarang[][conditionGoods]">
          <option value="">-- Choese --</option>
          <option value="New">New Goods for User / Section</option>
          <option value="Replacement">Replacement</option>
        </select>
      </div>
      <div class="form-scanner form-group col-12">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="">Scanner Brand</label>
            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
          </div>
          <div class="col-12 col-md-6 col-md-6">
            <label for="">Connection</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="network" id="" value="network"> Ethernet </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="usb" id="" value="usb"> USB </label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br><br><br>


    <button type="submit">Submit</button>
  </form>
</body>
</html>