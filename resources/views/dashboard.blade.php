
@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-12">
    <button class="btn btn-primary btn-sm" onclick="scan()">Start Scan</button>
    <button class="btn btn-primary btn-sm" onclick="stopScan()">Stop Scan</button>
  </div>
  <div class="col-12">
    <div id="reader" width="600px" height="600px"></div>
  </div>
</div>

  <div class="row">
    <div class="col-md-4 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2 v-on:click="">Data <small></small></h2>
                {{-- <button class="btn btn-sm btn-primary" v-on:click="pensiun">test kocak</button> --}}
                <ul class="nav navbar-right panel_toolbox">
                  <li>
                      <button class="btn btn-sm btn-success btn-light"><i class="fa fa-pencil text-white"></i></button>
                  </li>
                  <li>
                      <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                      class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

            </div>
        </div>
    </div>
  </div>


@endsection

@section('style')
<style>
  /* #preview {
    width: 100%;
    height: auto;
    background-color: red;
  } */
#preview{
   width:500px;
   height: 500px;
   margin:0px auto;
   background-color: red;
}


.row {
  margin-bottom: 8px;
  border-bottom: 1px solid rgb(206, 206, 206);
  padding-bottom: 8px;
}

.value {
  color: #0062cc;
  font-weight: bold;
}

.row span {
  font-weight: bold;
}
  
</style>    
@endsection


@section('script')
<script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
{{-- <script src="{{ asset('js/instascan.min.js') }}"></script> --}}

<script>


const formatsToSupport = [
  Html5QrcodeSupportedFormats.QR_CODE,
  Html5QrcodeSupportedFormats.UPC_A,
  Html5QrcodeSupportedFormats.UPC_E,
  Html5QrcodeSupportedFormats.UPC_EAN_EXTENSION,
];

const html5QrCode = new Html5Qrcode("reader");
const qrCodeSuccessCallback = (decodedText, decodedResult) => {
    /* handle success */
    // alert(decodedText);
    console.log(decodedText);

    getData(decodedText);
    
    
    
};

function getData(id) {
    axios.get("/get_data_cok/"+ id)
      .then(function (response) {
        $('.x_content').html('');

        // handle success
        console.log(response.data);
        let data = response.data;
        var el = `
                <div class="row">
                  <div class="col-12 col-md-4"><span>PC Name</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">${data.pc_name}</div>
                </div>
                
                <div class="row">
                  <div class="col-12 col-md-4"><span>Brand</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">${data.pc_brand}</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>IP</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">${data.ip}</div>
                </div>

                <div class="row mt-4">
                  <div class="col-12" style='font-size: 18px'><span>  Hardware Specifications </span></div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>Processor</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">${data.processor}</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>OS</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">${data.operating_system}</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>Ram</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">${data.ram} GB</div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4"><span>HDD</span></div>
                  <div class="col-md-8 col-12 mt-md-0 mt-2 value">${data.hdd} GB</div>
                </div>

        `;

        $('.x_content').append(el);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      })
      .then(function () {
        // always executed
      });  
}







// If you want to prefer back camera
function scan() {
  console.log('kocak');
    const config = { 
    fps: 30, 
    qrbox: 180 ,
    formatsToSupport: formatsToSupport 
  };
  html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
}

function stopScan() {
  html5QrCode.stop().then((ignore) => {
    console.log('dah stop');
    console.log(ignore);
    $('#reader').html('');
  }).catch((err) => {
    // Stop failed, handle it.
  });
}



  // ========================== INSTASCAN =======================










  // function onScanSuccess(decodedText, decodedResult) {
  //   // Handle on success condition with the decoded text or result.
  //   console.log(`Scan result: ${decodedText}`, decodedResult);

  //   axios
  // }

  // var html5QrcodeScanner = new Html5QrcodeScanner(
  //   "reader", { fps: 10, qrbox: 250 });
  // html5QrcodeScanner.render(onScanSuccess);
</script>
@endsection