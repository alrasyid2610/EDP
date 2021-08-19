@extends('layouts.main')

@section('style')
    <style>
      /* @media print {
        @page {
          size: 250mm 353mm;
        }

        body {
          background-color: red;
        }
        

        
      }

      
      @page:right{ 
        @bottom-left {
          margin: 10pt 0 30pt 0;
          border-top: .25pt solid #666;
          content: "My book";
          font-size: 9pt;
          color: #333;
        }
      } */

    </style>
@endsection

@section('content')


{{-- {{ $data) }} --}}
<x-com-modaldelete></x-com-modaldelete>
<x-com-modalpesan></x-com-modalpesan>

<div class="row d-block">
  <x-breadcrumb></x-breadcrumb>
  </div>
  
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Shipping Documents Data <small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><button class="btn btn-primary btn-sm" onclick="printPartOfPage('table')">Print</button></li>
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
      <div class="x_content" id="table">

        {{-- {{ dd($shippingDocument) }} --}}

            <div class="row">
              <div class="col-8 offset-2 container-surat-jalan py-3">
                <h2 class="" style="margin-bottom: 2rem">Surat Jalan</h2>
                <div class="title">
                  <div class="row justify-content-md-between">
                    <div class="col-md-6 col-12">
                      <div class="row mb-2">
                        <div class="col-4 col-md-6 col-lg-4">No Surat Jalan</div>
                        <div class="col-4 col-md-4 col-lg-5">: {{ $data->no_po }}</div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-4 col-md-6 col-lg-4">Supplier</div>
                        <div class="col-4 col-md-4 col-lg-5">: {{ $data->supplier }}</div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-4 col-md-6 col-lg-4">Destinatio</div>
                        <div class="col-4 col-md-4 col-lg-5">: {{ $data->destination }}</div>
                      </div>
                    </div>
                    <div class="col-md-4 col-12">
                      <div class="row mb-2">
                        <div class="col-4 col-md-6 col-lg-4">Recived Date</div>
                        <div class="col-4 col-md-4 col-lg-5">: {{ $data->recived_shipping_date }}</div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-4 col-md-6 col-lg-4">Reciver</div>
                        <div class="col-4 col-md-4 col-lg-5">: {{ $data->reciver }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
        

      </div>
    </div>
  </div>

  
  
  <div class="clearfix"></div>
</div>

@endsection

@section('script')
    <script>
      function printPartOfPage(elementId)
      {
        var printContent = document.getElementById(elementId);
        var windowUrl = 'about:blank';
        var uniqueName = new Date();
        var windowName = 'Print' + uniqueName.getTime();

        var printWindow = window.open(windowUrl, windowName);

        printWindow.document.write(printContent.innerHTML);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
      }
    </script>
@endsection