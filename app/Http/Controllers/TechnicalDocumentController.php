<?php

namespace App\Http\Controllers;

use App\Models\TechnicalDocument;
use App\Models\ShippingDocument;
use App\Models\Computer;
use App\Models\Printer;
use App\Models\Section;
use App\Models\FixAsset;
use App\Models\IncomingGood;
use App\Models\OtherDevice;
use App\Models\OperationSystem;
use App\Models\Projector;



use Illuminate\Http\Request;
use App\Http\Requests\RequestTechnicalDocument;
use App\Http\Requests\StoreTechnicalDocumentRequest;
use App\Models\Laptop;
use App\Models\Monitor;
use App\Models\MsOffice;
use App\Models\Scanner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Stmt\Echo_;

class TechnicalDocumentController extends Controller
{
  /**
   * @param item Item barang
   * @param tgl_surat_jalan Tanggal Surat Jalan
   * @param pc_name PC name
   * @param loc lokasi fix asset [pulogadung/krawang]
   * @param section_name_as section 
   */
  protected function inputFixAsset($item, $tgl_surat_jalan, $pc_name, $loc, $section_name_as)
  {
    global $edp_fixed_asset_number;

    // ============== FIX ASSET ===============================
    $fixed_asset_number  = FixAsset::getNewFa();
    // $fixed_asset_date = $request->tgl_surat_jalan;
    // $item_type = "Computer";
    if ($item == 'computer') {
      $edp_fixed_asset_number = $section_name_as . "/" . $pc_name . "/C"; // get pc name
    }

    if ($item == 'monitor') {
      $edp_fixed_asset_number = $section_name_as . "/" . $pc_name . "/M"; // get pc name
    }


    $d = FixAsset::create([
      'fixed_asset_number' => $fixed_asset_number,
      'fixed_asset_date' => $tgl_surat_jalan,
      'edp_fixed_asset_number' => strtoupper($edp_fixed_asset_number),
      'item_type' => ucfirst($item),
      'status' => 'ND', // Not Disposal
      'location' => $loc,
    ]);

    return $d;
    // ============== FIX ASSET ===============================
  }

  protected function inputItem($data_goods)
  {
    // dd($data_goods);
    global $tgl_surat_jalan, $id_surat_jalan, $edp_fixed_asset_number, $tgl_surat_jalan, $loc, $section_name_as;
    // dd($data_goods);

    // dd($data_goods);

    foreach ($data_goods['conditionGoods'] as $key => $value) {
      $item = $data_goods['typeGoods'][$key];


      if ($value == 'New') {
        // ====================================== COMPUTER ==================================
        $data = $data_goods['goods'][$key + 1];
        // dd($data);

        if ($item == 'computer') {
          // FOREACH

          if (isset($data['pc_name']['prefix'])) {
            $qty_prefix = $data['pc_name']['prefix']['qty'];
            $index_prefix = $data['pc_name']['prefix']['index_prefix'] > 1 ? $data['pc_name']['prefix']['index_prefix'] : 1; // For pc name index prefix
            $pc_name_prefix = $data['pc_name']['prefix']['pc_name'];
            $ip_prefix = $data['pc_name']['prefix']['ip_prefix'];
            $ip_index = $data['pc_name']['prefix']['ip_index'] ?? '1';

            // dd($ip_index);

            $ip = $data['pc_name']['prefix']['ip_prefix'] ?? 'IP Manual';

            $ip_no = 1;

            // dd($ip);


            // dd($pc_name_prefix);
            for ($i = $index_prefix; $i < $index_prefix + $qty_prefix; $i++) {

              # code...
              $pc_name = $pc_name_prefix . ($i);
              $d = $this->inputFixAsset('computer', $tgl_surat_jalan, $pc_name, $loc, $section_name_as);
              // echo $ip . "<br>";
              // echo $i . "<br>";


              // ============== Insert Computer ===============================
              $computer = Computer::create([
                'pc_brand' => $data['pc_brand'],
                'pc_name' => $pc_name,
                'processor' => $data['processor'],
                'operating_system' => $data['operating_system'],
                'ram' => $data['ram'],
                'hdd' => $data['hdd'],
                'fix_asset_id' => $d->id,
                'computer_description' => $data['computer_description'],
                'computer_operation' => $data['computer_operation'],
                'ip' => $ip == 'IP Manual' ? $data['ip'] : $data['pc_name']['prefix']['ip_prefix'] . '.' . $ip_index + ($ip_no - 1),
                'Internet' => $data['internet'],
                'nsi' => $data['nsi'],
                'boss' => $data['boss'],
                'ms_office' => $data['ms_office'],
                'antivirus' => $data['antivirus'],
                'ups' => $data['ups'],
                'wsus' => $data['wsus'],
                'click_one' => $data['click_one'],
                'ax' => $data['ax'],
                'schedule_ppc' => $data['schedule_ppc'],
                'location' => $data['location'],
              ]);

              // // ============================= Insert Incoming Goods / barang masuk ====================================

              IncomingGood::create([
                'shipping_document_id' => $id_surat_jalan,
                'fix_asset_id' => $d->id,
                'type_item' => 'computer'
              ]);

              $ip_no++;
            }

            // dd('oke');
          } else {
            foreach ($data['pc_name'] as $key2 => $value2) {
              $pc_name = $value2;
              $d = $this->inputFixAsset('computer', $tgl_surat_jalan, $pc_name, $loc, $section_name_as);

              // ============== Insert Computer ===============================
              $computer = Computer::create([
                'pc_brand' => $data['pc_brand'],
                'pc_name' => $value2,
                'processor' => $data['processor'],
                'operating_system' => $data['operating_system'],
                'ram' => $data['ram'],
                'hdd' => $data['hdd'],
                'fix_asset_id' => $d->id,
                'computer_description' => $data['computer_description'],
                'computer_operation' => $data['computer_operation'],
                'ip' => $data['ip'],
                'Internet' => $data['internet'],
                'nsi' => $data['nsi'],
                'boss' => $data['boss'],
                'ms_office' => $data['ms_office'],
                'antivirus' => $data['antivirus'],
                'ups' => $data['ups'],
                'wsus' => $data['wsus'],
                'click_one' => $data['click_one'],
                'ax' => $data['ax'],
                'schedule_ppc' => $data['schedule_ppc'],
                'location' => $data['location'],
              ]);

              // ============================= Insert Incoming Goods / barang masuk ====================================

              IncomingGood::create([
                'shipping_document_id' => $id_surat_jalan,
                'fix_asset_id' => $d->id,
                'type_item' => 'computer'
              ]);
            }
          }
          // END FOREACH
          // ============================== Ubah status dokumen menjadi complete ====================================
          ShippingDocument::find($id_surat_jalan)->update(['status' => 'complete']);
        }
        // ====================================== MONITOR ==================================
        if ($item == 'monitor') {
          if (isset($data['pc_name']['prefix'])) {
            $qty_prefix = $data['pc_name']['prefix']['qty'];
            $pc_name_prefix = $data['pc_name']['prefix']['pc_name'];
            $index_prefix = $data['pc_name']['prefix']['index_prefix'] > 1 ? $data['pc_name']['prefix']['index_prefix'] : 1; // For pc name index prefix


            for ($i = $index_prefix; $i < $index_prefix + $qty_prefix; $i++) {
              $pc_name = $pc_name_prefix . $i;
              $d = $this->inputFixAsset('monitor', $tgl_surat_jalan, $pc_name, $loc, $section_name_as);

              // ============== Insert monitor ===============================
              Monitor::create([
                'monitor_brand' => $data_goods['goods'][$key + 1]['monitor_brand'],
                'fix_asset_id' => $d->id,
                'edp_fixed_asset_number' => $d->edp_fixed_asset_number,
                'screen_plugs' => $data_goods['goods'][$key + 1]['screen_plugs'],
                'screen_size' => $data_goods['goods'][$key + 1]['screen_size'],
              ]);

              // ============================= Insert Incoming Goods / barang masuk ====================================

              IncomingGood::create([
                'shipping_document_id' => $id_surat_jalan,
                'fix_asset_id' => $d->id,
                'type_item' => 'monitor'
              ]);
            }
          } else {
            foreach ($data['pc_name'] as $key2 => $value2) {
              $pc_name = $value2;
              $d = $this->inputFixAsset('monitor', $tgl_surat_jalan, $pc_name, $loc, $section_name_as);

              // ============== Insert Computer ===============================
              Monitor::create([
                'monitor_brand' => $data_goods['goods'][$key + 1]['monitor_brand'],
                'fix_asset_id' => $d->id,
                'screen_plugs' => $data_goods['goods'][$key + 1]['screen_plugs'],
                'screen_size' => $data_goods['goods'][$key + 1]['screen_size'],
              ]);

              // ============================= Insert Incoming Goods / barang masuk ====================================

              IncomingGood::create([
                'shipping_document_id' => $id_surat_jalan,
                'fix_asset_id' => $d->id,
                'type_item' => 'monitor'
              ]);
            }
          }
          ShippingDocument::find($id_surat_jalan)->update(['status' => 'complete']);
        }
        // ====================================== SCANNER ==================================

        if ($item == 'scanner') {
          // $d = $this->inputFixAsset('scanner', $tgl_surat_jalan, $pc_name, $loc, $section_name_as);


          // // dd($request);

          $index_perangkat = FixAsset::getLastIndexItem('scanner', $section_name_as)->count() + 1;

          // dd($index_perangkat);


          $scanner_brand = $data_goods['goods'][$key + 1]['scanner_brand'];
          $type_scanner = $data_goods['goods'][$key + 1]['type_scanner'];
          // $usb = $data_goods['goods'][$key + 1]['usb'];
          // $network = $data_goods['goods'][$key + 1]['network'];
          $network = isset($data_goods['goods'][$key + 1]['network']) ? $data_goods['goods'][$key + 1]['network'] : '';
          $usb = isset($data_goods['goods'][$key + 1]['usb']) ? $data_goods['goods'][$key + 1]['usb'] : '';
          // // $lpt = $data_goods['goods'][$key + 1]['lpt'];

          $port_connection = $network . ' | ' . $usb;

          // // ============== FIX ASSET ===============================
          $fixed_asset_number  = FixAsset::getNewFa();
          $edp_fixed_asset_number .= 'SCANNER-' . $index_perangkat . "/S";
          $fixed_asset_date = $tgl_surat_jalan;
          $item_type = "Scanner";
          // $fixed_asset_number
          // dd($edp_fixed_asset_number);

          // dd($request['pc_name']);
          $d = FixAsset::create([
            'fixed_asset_number' => $fixed_asset_number,
            'fixed_asset_date' => $fixed_asset_date,
            'edp_fixed_asset_number' => strtoupper($edp_fixed_asset_number),
            'item_type' => $item_type,
            'status' => 'ND', // Not Disposal
            'location' => $loc,
          ]);
          // // ============== FIX ASSET ===============================

          Scanner::create([
            'scanner_brand' => $scanner_brand,
            'port_connection' => $port_connection,
            'type_scanner' => $type_scanner,
            'fix_asset_id' => $d->id
          ]);

          IncomingGood::create([
            'shipping_document_id' => $id_surat_jalan,
            'fix_asset_id' => $d->id,
            'type_item' => 'scanner'
          ]);

          ShippingDocument::find($id_surat_jalan)->update(['status' => 'complete']);

          // dd($lpt);
          // dd($value . " " . $item . "<br>");
        }
        // ====================================== PRINTER ==================================

        if ($item == 'printer') {
          $printer_brand = $data_goods['goods'][$key + 1]['printer_brand'];
          $type = $data_goods['goods'][$key + 1]['type'];
          $ip = $data_goods['goods'][$key + 1]['ip'];
          $network = isset($data_goods['goods'][$key + 1]['network']) ? $data_goods['goods'][$key + 1]['network'] : '';
          $usb = isset($data_goods['goods'][$key + 1]['usb']) ? $data_goods['goods'][$key + 1]['usb'] : '';
          $lpt = isset($data_goods['goods'][$key + 1]['lpt']) ? $data_goods['goods'][$key + 1]['lpt'] : '';
          // $port_connection = $network . ' | ' . $usb . ' | ' . $lpt;
          // // $network = $data_goods['goods'][$key + 1]['network'];
          // // $usb = $data_goods['goods'][$key + 1]['usb'];
          // // echo $value . " " . $item . "<br>";


          $index_perangkat = FixAsset::getLastIndexItem('scanner', $section_name_as)->count() + 1;

          $port_connection = $network . ' | ' . $usb . ' | ' . $lpt;

          // // ============== FIX ASSET ===============================
          $fixed_asset_number  = FixAsset::getNewFa();
          $edp_fixed_asset_number .= 'PRINTER-' . $index_perangkat . "/P";
          $fixed_asset_date = $tgl_surat_jalan;
          $item_type = "Printer";
          // $fixed_asset_number
          // dd($edp_fixed_asset_number);

          // dd($request['pc_name']);
          $d = FixAsset::create([
            'fixed_asset_number' => $fixed_asset_number,
            'fixed_asset_date' => $fixed_asset_date,
            'edp_fixed_asset_number' => strtoupper($edp_fixed_asset_number),
            'item_type' => $item_type,
            'status' => 'ND', // Not Disposal
            'location' => $loc,
          ]);
          // // ============== FIX ASSET ===============================
          Printer::create([
            'printer_brand' => $printer_brand,
            'type' => $type,
            'ip' => $ip,
            'port_connection' => $port_connection,
            'fix_asset_id' => $d->id
          ]);


          IncomingGood::create([
            'shipping_document_id' => $id_surat_jalan,
            'fix_asset_id' => $d->id,
            'type_item' => 'printer'
          ]);

          ShippingDocument::find($id_surat_jalan)->update(['status' => 'complete']);
        }

        // ====================================== LAPTOP ==================================
        if ($item == 'laptop') {
          if ($data['fix_asset_input'] == 'input_manual') {
            $fix_asset_awal = $data['fix_asset_awal'];
            $fix_asset_akhir = $data['fix_asset_akhir'];
            $qty = $data['qty'];
            $prefix = $data['prefix'];
            $laptop_device_id = $data['laptop_device_id'];
            $fix_asset_edp = $section_name_as;
            $fix_asset_date = $data['fix_asset_date'];
            // dd($laptop_device_id);

            $no = $data['no_akhir_laptop'];

            for ($i = $fix_asset_awal; $i <= $fix_asset_akhir; $i++) {
              $no++;
              $fix_asset_edp .= '/' . $prefix . $no . '/N';
              $d = FixAsset::create([
                'fixed_asset_number' => $i,
                'fixed_asset_date' => $fix_asset_date,
                'edp_fixed_asset_number' => strtoupper($fix_asset_edp),
                'item_type' => ucfirst($item),
                'status' => 'ND', // Not Disposal
                'location' => $loc,
              ]);

              Laptop::create([
                'laptop_device_id' => $laptop_device_id,
                'fix_asset_id' => $d->id,
                'no_laptop' => 'NB-DNPI-' . $no,
                'batch' => $fix_asset_date,
                'status' => 'EDP'
              ]);

              IncomingGood::create([
                'shipping_document_id' => $id_surat_jalan,
                'fix_asset_id' => $d->id,
                'type_item' => 'laptop'
              ]);


              $fix_asset_edp = $section_name_as;
            }
          }
        }

        if ($item == 'mousekeyboard') {
          $description = json_encode($data_goods['goods'][$key + 1]['description']);
          OtherDevice::create([
            'item_name' => $data_goods['goods'][$key + 1]['item_name'],
            'description' => $description,
            'qty' => $data_goods['goods'][$key + 1]['qty'],
            'shipping_document_id' => $id_surat_jalan
          ]);
        }

        if ($item == 'Operation System') {
          $os = $data_goods['goods'][$key + 1]['os'];
          $qty = $data_goods['goods'][$key + 1]['qty'];
          // $data = json_encode(['port_connection' => $port_connection]);
          // dd($data);
          OperationSystem::create([
            'os' => $os,
            'qty' => $qty,
            'status' => 'Belum di Pakai',
            'shipping_document_id' => $id_surat_jalan
          ]);
        }

        if ($item == 'Microsoft Office') {
          # code...
          $ms_office = $data_goods['goods'][$key + 1]['ms_office'];
          $qty = $data_goods['goods'][$key + 1]['qty'];
          // $data = json_encode(['port_connection' => $port_connection]);
          // dd($data);
          MsOffice::create([
            'ms_office' => $ms_office,
            'qty' => $qty,
            'status' => 'Belum di Pakai',
            'shipping_document_id' => $id_surat_jalan
          ]);
        }

        if ($item == 'projector') {
          $projector_brand = $data_goods['goods'][$key + 1]['projector_brand'];
          $type = $data_goods['goods'][$key + 1]['type'];
          // $port_connection = $network . ' | ' . $usb . ' | ' . $lpt;
          // // $network = $data_goods['goods'][$key + 1]['network'];
          // // $usb = $data_goods['goods'][$key + 1]['usb'];
          // // echo $value . " " . $item . "<br>";


          $index_perangkat = FixAsset::getLastIndexItem('projector', $section_name_as)->count() + 1;

          // // ============== FIX ASSET ===============================
          $fixed_asset_number  = FixAsset::getNewFa();
          $edp_fixed_asset_number .= 'PROJECTOR-' . $index_perangkat . "/PJ";
          $fixed_asset_date = $tgl_surat_jalan;
          $item_type = "Projector";
          // $fixed_asset_number
          // dd($edp_fixed_asset_number);

          // dd($request['pc_name']);
          $d = FixAsset::create([
            'fixed_asset_number' => $fixed_asset_number,
            'fixed_asset_date' => $fixed_asset_date,
            'edp_fixed_asset_number' => strtoupper($edp_fixed_asset_number),
            'item_type' => $item_type,
            'status' => 'ND', // Not Disposal
            'location' => $loc,
          ]);
          // // ============== FIX ASSET ===============================
          Projector::create([
            'projector_brand' => $projector_brand,
            'type' => $type,
            'shipping_documents_id' => $id_surat_jalan,
            'fix_asset_id' => $d->id
          ]);


          IncomingGood::create([
            'shipping_document_id' => $id_surat_jalan,
            'fix_asset_id' => $d->id,
            'type_item' => 'projector'
          ]);

          ShippingDocument::find($id_surat_jalan)->update(['status' => 'complete']);
        }

        if ($item == 'Other') {
          $description = json_encode($data_goods['goods'][$key + 1]['description']);


          OtherDevice::create([
            'item_name' => $data_goods['goods'][$key + 1]['item_name'],
            'description' => $description,
            'qty' => $data_goods['goods'][$key + 1]['qty'],
            'shipping_document_id' => $id_surat_jalan
          ]);
        }
      }
    }
    // ShippingDocument::find($id_surat_jalan)->update(['status' => 'complete']);
  }

  protected function inputGoods($request)
  {
    // dd($request);
    global $tgl_surat_jalan, $id_surat_jalan, $edp_fixed_asset_number, $tgl_surat_jalan, $loc, $section_name_as;

    // $validated = $request->validated();
    $id_surat_jalan = $request->id_surat_jalan;
    $tgl_surat_jalan = $request->tgl_surat_jalan;

    // dd($GLOBALS);
    //=================== Data Bon Teknik =====================
    $no_bon = $request->no_bon;



    $tgl_buat = $request->tgl_buat;
    // $tgl_surat_jalan = date_format(date_create($request->tgl_surat_jalan), 'Y-m-d');
    $user = $request->user; // Yang Buat Bon
    // $section = $request->section;
    $destination = $request->destination;
    $section = $request->section;
    $section = explode('|', $section);
    $section_name = trim($section[0]);
    $section_name_as = trim($section[1]);
    $keterangan = $request->keterangan;
    $tgl_terima_bon = $request->tgl_terima_bon;
    $penerima_bon = $request->penerima_bon;
    $pelaksana = $request->pelaksana;
    $loc = ($destination == 'KRAWANG') ? 'K' : 'P';
    $data_goods = $request->dataGoods;

    // dd($loc);
    $edp_fixed_asset_number = $section_name_as . "/";

    // dd($id_surat_jalan);

    $this->inputItem($data_goods);

    TechnicalDocument::create([
      'shipping_document_id' => $id_surat_jalan,
      'no_document' => $no_bon,
      'location' => $loc,
      'user' => $user,
      'create_date' => $tgl_buat,
      'departement' => $section_name,
      'description' => $keterangan,
      'document_recipient' => $penerima_bon,
      'executor' => $pelaksana,
      'status' => 'complete',
      'recived_date' => $tgl_terima_bon
    ]);
  }


  public function print()
  {
    $data = TechnicalDocument::all();
    return view('barang_masuk.bon_teknik.viewPrint', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data' => $data]);
  }


  public function test2(Request $request)
  {
    dd($request);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {

    $data = TechnicalDocument::all();
    return view('barang_masuk.bon_teknik.index', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data' => $data]);

    // return print_r($request->request);
    // if (count($request->request) < 1) {
    //   $data = TechnicalDocument::all();
    //   return view('barang_masuk.bon_teknik.index', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data' => $data]);
    // } else {
    //   if ($request->has('data')) {
    //     if ($request->data == 'noComplete') {
    //       $arrTemp = collect([]);
    //       $data = TechnicalDocument::getDataShipping();
    //       // $data->pluck('shipping_document_id, id');
    //       foreach ($data as $key => $value) {
    //         if ($data[$key]['shipping_document_id'] == null) {
    //           $arrTemp->push($data[$key]);
    //         }
    //       }
    //       // dd($arrTemp);
    //       return view('barang_masuk.bon_teknik.index', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data' => $arrTemp, 'action' => 'ada']);
    //     } else {
    //       return redirect()->route('technical_documents.index');
    //     }
    //   } else {
    //     return redirect()->route('technical_documents.index');
    //   }
    // }

    // return redirect()->route('technical_documents.index');
  }


  public function create_hanging_document_shipping(Request $request)
  {
    // Agar nilai inputan pada firn bon teknik tidak hilang
    if ($request->session()->get('errors')) {
      $errors = $request->session();
      // dd($errors);

      $id_surat_jalan = $request->old('id_surat_jalan');
      $surat_jalan = ShippingDocument::where('id', $id_surat_jalan)->first();

      return view('barang_masuk.bon_teknik.create2', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data_surat_jalan' => $surat_jalan]);
    }

    $surat_jalan = ShippingDocument::where('id', $request->id_surat_jalan)->where('status', 'incomplete')->first();
    if ($surat_jalan) {
      $data_section = Section::all();
      return view('barang_masuk.bon_teknik.create2', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data_surat_jalan' => $surat_jalan, 'data_section' => $data_section]);
    } else {
      // Jika id tidak ada
      return redirect('goods_come/technical_documents/create')->with(['message' => 'An error has occurred, ID cannot be found']);
      // return redirect('')->route('technical_documents.create')->withErrors(['massage', 'An error has occurred, ID cannot be found']);
    }
  }


  public function create_hanging_documents()
  {
    $data = ShippingDocument::getDataTechDoc();
    return view('barang_masuk.bon_teknik.create_view', ['page_action' => 'Input', 'page_name' => 'Shipping Documents', 'data' => $data]);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $krw = Section::where('section_location', '=', 'Krawang')->get();
    $plg = Section::where('section_location', '=', 'Pulogadung')->get();
    return view('barang_masuk.bon_teknik.create', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data_section' => ['data_section_krw' => $krw, 'data_section_plg' => $plg]]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   * @description untuk input lengkapi surat jalan 
   */
  public function store(StoreTechnicalDocumentRequest $request)
  {
    // dd($request['dataGoods']);
    // dd($request->no_bon);
    $this->inputGoods($request);
    return redirect()->route('goods_come.index')->with('success', 'Data Berhasil ditambahkan');
    // return redirect()->route('named_route', ['parameterKey' => 'value']);
    // return redirect()->route('technical_documents.create', ['id_surat_jalan' => '4c1a69dd6d993dbe6ce16bc2408311f5'])->withErrors($validator, 'login');
  }

  // input bon teknik
  public function store2(RequestTechnicalDocument $request)
  {
    // dd($request);

    // dd($request);

    $validator = Validator::make($request->all(), $request->rules());
    if ($validator->fails()) {
      return redirect()
        ->back()
        ->withErrors($validator, 'login')
        ->withInput();
    }
    TechnicalDocument::create([
      'no_document' => $request->no_document,
      'create_date' => $request->create_date,
      'user' => ucwords($request->user),
      'departement' => $request->departement,
      'description' => $request->description,
      'status' => 'incomplete',
      'recived_date' => $request->recived_date,
      'document_recipient' => $request->document_recipient
      // 'pelaksana' => $request->pelaksana,
      // 'tgl_terima_bon' => $request->tgl_terima
    ]);

    return redirect()->back()->with('success', 'Data Berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\TechnicalDocument  $technicalDocument
   * @return \Illuminate\Http\Response
   */
  public function show(TechnicalDocument $technicalDocument)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\TechnicalDocument  $technicalDocument
   * @return \Illuminate\Http\Response
   */
  public function edit(TechnicalDocument $technicalDocument)
  {
    $data_section = Section::all();
    // dd($technicalDocument);
    $data = $technicalDocument;
    return view('barang_masuk.bon_teknik.edit', ['page_action' => 'Edit', 'page_name' => 'Bon Teknik', 'data' => $data, 'data_section' => $data_section]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\TechnicalDocument  $technicalDocument
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, TechnicalDocument $technicalDocument)
  {
    // dd($request);

    $technicalDocument->where('id', $request->id)
      ->update($request->except(['_method', '_token', 'route']));

    return redirect($request->route)
      ->with(['message' => 'Data Berhasil di Edit']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\TechnicalDocument  $technicalDocument
   * @return \Illuminate\Http\Response
   */
  public function destroy(TechnicalDocument $technicalDocument)
  {
    $technicalDocument->delete();

    $data = TechnicalDocument::where('status', 'incomplete')->get();
    // return response()->json(array('success' => 'Data Berhasil di Delete'));
    // $technicalDocument->delete();
    // $data = TechnicalDocument::all();
    $returnHTML = view('barang_masuk.bon_teknik.viewData')->with('data', $data)->render();
    return response()->json(array('success' => 'Data Berhasil di Delete', 'html' => $returnHTML));
  }


  public function getData()
  {
    $array = collect([]);
    $data = TechnicalDocument::where('status', 'complete')->get();
    foreach ($data as $key => $value) {
      $array[] = [
        $value->no_document,
        $value->user,
        $value->item,
        $value->departement,
        $value->description,
        $value->document_recipient,
        $value->recived_date
      ];
    }

    $returnHTML = view('barang_masuk.bon_teknik.tableData')->with('data', $data)->render();
    // return response()->json($array);
    return response()->json(array('success' => 'Data Successfully', 'html' => $returnHTML));
  }
}
