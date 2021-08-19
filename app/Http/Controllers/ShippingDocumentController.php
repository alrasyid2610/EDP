<?php

namespace App\Http\Controllers;

use App\Models\ShippingDocument;
use App\Models\TechnicalDocument;
use App\Models\FixAsset;
use App\Models\IncomingGood;
use App\Models\Computer;
use App\Models\Monitor;
use App\Models\Scanner;
use App\Models\Printer;

use Illuminate\Http\Request;
use App\Http\Requests\RequestShippingDocument;
use App\Http\Requests\StoreShippingDocumentRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShippingDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = ShippingDocument::where('status', 'complete')->get();
        return view('barang_masuk.surat_jalan.index', ['page_action' => 'Data', 'page_name' => 'Shipping Documents', 'data' => $data]);
    }

    public function create_hanging_document_technical(Request $request)
    {
        // dd($request);
        $id_bon_teknik = $request->id_technical_document;

        $data_bon_teknik = TechnicalDocument::find($id_bon_teknik);
        $data_section = explode('|', $data_bon_teknik->departement);
        $data_bon_teknik->departement = $data_section[0];
        $data_bon_teknik->departement_as = $data_section[1];
        // dd($data_bon_teknik);

        return view('barang_masuk.surat_jalan.create2', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data_bon_teknik' => $data_bon_teknik]);
    }

    public function create_hanging_documents()
    {
        // $arrTemp = collect([]);
        $data = ShippingDocument::where('status', 'incomplete')->get();
        // foreach ($data as $key => $value) {
        //     if ($data[$key]['shipping_document_id'] == null) {
        //         $arrTemp->push($data[$key]);
        //     }
        // }
        return view('barang_masuk.surat_jalan.create_view', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('barang_masuk.surat_jalan.create', ['page_action' => 'Input', 'page_name' => 'Shipping Documents']);

        // dd($request);

        // if (isset($request->id_technical_document)) {
        //     $data = TechnicalDocument::where('id', '=', $request->id_technical_document)->get();
        //     // $surat_jalan = ShippingDocument::where('id', $request->id_surat_jalan)->first();
        //     // return view('barang_masuk.bon_teknik.create', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data_surat_jalan' => $surat_jalan]);
        //     return view('barang_masuk.surat_jalan.create', ['page_action' => 'Input', 'page_name' => 'Shipping Documents', 'data' => $data]);
        // }

        // if (isset($_GET['d'])) {
        //     if ($_GET['d'] == md5('condition1')) {
        //         return view('barang_masuk.surat_jalan.create', ['page_action' => 'Input', 'page_name' => 'Shipping Documents']);
        //     } else if ($_GET['d'] == md5('condition2')) {
        //         $data = ShippingDocument::getDataTechDoc();
        //         return view('barang_masuk.surat_jalan.create_view', ['page_action' => 'Input', 'page_name' => 'Shipping Documents', 'data' => $data]);
        //         // return "oke 2";
        //         // return view('barang_masuk.bon_teknik.create2', ['page_action' => 'Input', 'page_name' => 'Bon Teknik']);
        //     } else {
        //         return redirect('/dashboard');
        //     }
        // }

        // return redirect()->route('shipping_documents.create', ['d' => '4c1a69dd6d993dbe6ce16bc2408311f5']);

        // $request->session()->flush();
        // $request->session()->put('harun','safsafsaf');
        // return view('barang_masuk.surat_jalan.create', ['page_action' => 'Input', 'page_name' => 'Shipping Documents']);
    }

    public function create2(Request $request)
    {
        // $request->session()->flush();
        // $request->session()->put('harun','safsafsaf');
        return view('barang_masuk.surat_jalan.create', ['page_action' => 'darr', 'page_name' => 'Shipping Documents']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestShippingDocument $request)
    {
        // dd($request);
        $data_item = '';
        foreach ($request->item as $key => $value) {
            if ((count($request->item) - 1) == $key) {
                $data_item .= $value;
                # code...
            } else {
                $data_item .= $value . ' | ';
            }
        }

        $data_qty = '';
        foreach ($request->qty as $key => $value) {
            if ((count($request->item) - 1) == $key) {
                $data_qty .= $value;
                # code...
            } else {
                $data_qty .= $value . ' | ';
            }
        }
        // dd($data_item);
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator, 'login')
                ->withInput();
        }


        $d = ShippingDocument::create([
            'no_po' => $request->no_po,
            'item' => $data_item,
            'qty' => $data_qty,
            'reciver' => ucwords($request->reciver),
            'recived_shipping_date' => $request->recived_date,
            'supplier' => $request->supplier,
            'destination' => $request->destination,
            'status' => 'incomplete'
        ]);

        return redirect()
            ->back()
            ->with(['success' => 'Data added successfully. No Doc : ' . $d->id]);


        // if($validator->fails()) {
        //     return redirect()->back();
        // } else {
        //     return redirect()->back()->withErrors($validator, 'login')->withInput();
        // }

    }


    // Melengkapi BON TEKNIK-> UNTUK INPUT BON TEKNIK
    public function store2(StoreShippingDocumentRequest $request)
    {
        $validated = $request->validated();

        // Ambil data 
        $id_bon_teknik = $request->id_bon_teknik;
        $no_po = $request->no_po;
        // $item = $request->item;
        $data_item = '';
        foreach ($request->item as $key => $value) {
            if ((count($request->item) - 1) == $key) {
                $data_item .= $value;
                # code...
            } else {
                $data_item .= $value . ' | ';
            }
        }
        $reciver = $request->reciver;
        $supplier = $request->supplier;
        $recived_date = $request->recived_date;
        $destination = $request->destination;
        if ($destination == 'DNPI Pulogadung') {
            $loc = 'P';
        } else {
            $loc = 'K';
        }
        $data_goods = $request->dataGoods;

        $fixed_asset_number  = FixAsset::getNewFa();
        $edp_fixed_asset_number = $request->section_as . "/";


        $s = ShippingDocument::create([
            'no_po' => $no_po,
            'reciver' => $reciver,
            'recived_shipping_date' => $recived_date,
            'supplier' => $supplier,
            'destination' => $destination,
            'item' => $data_item,
            'status' => 'complete'
        ]);

        $id_surat_jalan = $s->id;

        foreach ($data_goods['conditionGoods'] as $key => $value) {
            // print_r($value);
            if ($value == 'New') {
                // ============== COMPUTER ===============================
                if ($data_goods['typeGoods'][$key] == 'computer') {
                    $fixed_asset_number  = FixAsset::getNewFa();
                    $data = $data_goods['goods']['goods' . $key + 1];

                    // ============== FIX ASSET ===============================
                    $edp_fixed_asset_number .= $data['pc_name'] . "/C";
                    $fixed_asset_date = $recived_date;
                    $item_type = "Computer";
                    // $fixed_asset_number
                    // ============== FIX ASSET ===============================

                    // dd($loc);
                    $d = FixAsset::create([
                        'fixed_asset_number' => $fixed_asset_number,
                        'fixed_asset_date' => $fixed_asset_date,
                        'edp_fixed_asset_number' => strtoupper($edp_fixed_asset_number),
                        'item_type' => $item_type,
                        'status' => 'ND', // Not Disposal
                        'location' => $loc,
                    ]);
                    // dd($d);
                    $computer = Computer::create([
                        'pc_brand' => $data['pc_brand'],
                        'pc_name' => $data['pc_name'],
                        'processor' => $data['processor'],
                        'operating_system' => $data['operating_system'],
                        'ram' => $data['ram'],
                        'hdd' => $data['hdd'],
                        'fix_asset_id' => $d->id,
                        'computer_description' => $data['computer_description'],
                    ]);

                    IncomingGood::create([
                        'shipping_document_id' => $id_surat_jalan,
                        'fix_asset_id' => $d->id,
                        'type_item' => 'computer'
                    ]);

                    // echo $value . " " . $data_goods['typeGoods'][$key] . "<br>";
                }

                if ($data_goods['typeGoods'][$key] == 'monitor') {
                    // ============== FIX ASSET ===============================
                    $fixed_asset_number  = FixAsset::getNewFa();
                    $edp_fixed_asset_number .= $request['pc_name'] . "/M";
                    $fixed_asset_date = $recived_date;
                    $item_type = "Monitor";
                    // $fixed_asset_number

                    // dd($request['pc_name']);
                    $d = FixAsset::create([
                        'fixed_asset_number' => $fixed_asset_number,
                        'fixed_asset_date' => $fixed_asset_date,
                        'edp_fixed_asset_number' => strtoupper($edp_fixed_asset_number),
                        'item_type' => $item_type,
                        'status' => 'ND', // Not Disposal
                        'location' => $loc,
                    ]);
                    $monitor_brand = $data_goods['goods']['goods' . $key + 1]['monitor_brand'];
                    $screen_plugs = $data_goods['goods']['goods' . $key + 1]['screen_plugs'];
                    $screen_size = $data_goods['goods']['goods' . $key + 1]['screen_size'];
                    Monitor::create([
                        'monitor_brand' => $monitor_brand,
                        'fix_asset_id' => $d->id,
                        'screen_plugs' => $screen_plugs,
                        'screen_size' => $screen_size,
                    ]);

                    IncomingGood::create([
                        'shipping_document_id' => $id_surat_jalan,
                        'fix_asset_id' => $d->id,
                        'type_item' => 'monitor'
                    ]);
                }

                if ($data_goods['typeGoods'][$key] == 'scanner') {
                    $scanner_brand = $data_goods['goods']['goods' . $key + 1]['scanner_brand'];
                    $network = isset($data_goods['goods']['goods' . $key + 1]['network']) ? $data_goods['goods']['goods' . $key + 1]['network'] : '';
                    $usb = isset($data_goods['goods']['goods' . $key + 1]['usb']) ? $data_goods['goods']['goods' . $key + 1]['usb'] : '';
                    $port_connection = $network . ' | ' . $usb;

                    // ============== FIX ASSET ===============================
                    $index_perangkat = FixAsset::getLastIndexItem('scanner', 'mpl')->count() + 1;
                    $fixed_asset_number  = FixAsset::getNewFa();
                    $edp_fixed_asset_number .= 'SCANNER-' . $index_perangkat . "/S";
                    $fixed_asset_date = $recived_date;
                    $item_type = "Scanner";
                    // $fixed_asset_number

                    // dd($request['pc_name']);
                    $d = FixAsset::create([
                        'fixed_asset_number' => $fixed_asset_number,
                        'fixed_asset_date' => $fixed_asset_date,
                        'edp_fixed_asset_number' => strtoupper($edp_fixed_asset_number),
                        'item_type' => $item_type,
                        'status' => 'ND', // Not Disposal
                        'location' => $loc,
                    ]);

                    // dd($d->id);
                    // ============== FIX ASSET ===============================

                    Scanner::create([
                        'scanner_brand' => $scanner_brand,
                        'port_connection' => $port_connection,
                        'fix_asset_id' => $d->id
                    ]);

                    IncomingGood::create([
                        'shipping_document_id' => $id_surat_jalan,
                        'fix_asset_id' => $d->id,
                        'type_item' => 'monitor'
                    ]);
                }

                if ($data_goods['typeGoods'][$key] == 'printer') {

                    // $printer_brand = $data_goods['goods']['goods' . $key + 1]['printer_brand'];
                    // $network = $data_goods['goods']['goods' . $key + 1]['network'];
                    // $usb = $data_goods['goods']['goods' . $key + 1]['usb'];
                    // echo $value . " " . $data_goods['typeGoods'][$key] . "<br>";

                    // ========================================== DATA PRINTER =====================================================================================================
                    $printer_brand = $data_goods['goods']['goods' . $key + 1]['printer_brand'];
                    $type = $data_goods['goods']['goods' . $key + 1]['type'];
                    $ip = $data_goods['goods']['goods' . $key + 1]['ip'];
                    $network = isset($data_goods['goods']['goods' . $key + 1]['network']) ? $data_goods['goods']['goods' . $key + 1]['network'] : '';
                    $usb = isset($data_goods['goods']['goods' . $key + 1]['usb']) ? $data_goods['goods']['goods' . $key + 1]['usb'] : '';
                    $lpt = isset($data_goods['goods']['goods' . $key + 1]['lpt']) ? $data_goods['goods']['goods' . $key + 1]['lpt'] : '';
                    $port_connection = $network . ' | ' . $usb . ' | ' . $lpt;
                    // ========================================== DATA PRINTER =====================================================================================================

                    // ============== FIX ASSET ===============================
                    $index_perangkat = FixAsset::getLastIndexItem('Printer', 'mpl')->count() + 1;
                    $fixed_asset_number  = FixAsset::getNewFa();
                    $edp_fixed_asset_number .= 'PRINTER-' . $index_perangkat . "/P";
                    $fixed_asset_date = $recived_date;
                    $item_type = "Printer";

                    $d = FixAsset::create([
                        'fixed_asset_number' => $fixed_asset_number,
                        'fixed_asset_date' => $fixed_asset_date,
                        'edp_fixed_asset_number' => strtoupper($edp_fixed_asset_number),
                        'item_type' => $item_type,
                        'status' => 'ND', // Not Disposal
                        'location' => $loc,
                    ]);

                    // dd($d->id);
                    // ============== FIX ASSET ===============================

                    Printer::create([
                        'printer_brand' => $printer_brand,
                        'fix_asset_id' => $d->id,
                        'type' => $type,
                        'ip' => $ip,
                        'port_connection' => $port_connection
                    ]);

                    IncomingGood::create([
                        'shipping_document_id' => $id_surat_jalan,
                        'fix_asset_id' => $d->id,
                        'type_item' => 'printer'
                    ]);
                }
            }
        }

        // TechnicalDocument::update()
        TechnicalDocument::find($id_bon_teknik)->update(['shipping_document_id' => $s->id, 'status' => 'complete']);

        return redirect()->route('goods_come.index')->with('success', 'Data Berhasil ditambahkan');

        // $no_document = $request->no_document;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingDocument  $shippingDocument
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingDocument $shippingDocument)
    {
        // dd($shippingDocument);
        //
        // dd('safsafsaf');
        // dd($shippingDocument);
        return view('barang_masuk.surat_jalan.show', ['page_action' => 'View', 'page_name' => 'Shipping Documents', 'data' => $shippingDocument]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingDocument  $shippingDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingDocument $shippingDocument)
    {
        $data = $shippingDocument;
        return view('barang_masuk.surat_jalan.edit', ['page_action' => 'Edit', 'page_name' => 'Shipping Documents', 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingDocument  $shippingDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingDocument $shippingDocument)
    {
        // $request->except('_token');
        // dd($request);
        $data_item = '';
        foreach ($request->item as $key => $value) {
            if ((count($request->item) - 1) == $key) {
                $data_item .= $value;
                # code...
            } else {
                $data_item .= $value . ' | ';
            }
        }

        $data_qty = '';

        foreach ($request->qty as $key => $value) {
            if ((count($request->item) - 1) == $key) {
                $data_qty .= $value;
                # code...
            } else {
                $data_qty .= $value . ' | ';
            }
        }

        // $request = $request->replace('qty' => $data_qty);

        $data = collect($request->except(['_token', '_method', 'submit', 'route']))->replace(['qty' => $data_qty]);
        $data = $data->replace(['item' => $data_item]);
        $shippingDocument->where('id', $request->id)
            ->update($data->toArray());

        return redirect($request->route)
            ->with(['message' => 'Data Berhasil di Edit', 'id' => $request->id]);
        // return view('barang_masuk.surat_jalan.index', ['page_action' => 'Data', 'page_name' => 'Shipping Documents', 'data' => ShippingDocument::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingDocument  $shippingDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingDocument $shippingDocument)
    {
        // dd($request);
        $shippingDocument->delete();
        // $data = $shippingDocument->all();
        $data = ShippingDocument::where('status', 'incomplete')->get();
        // dd($data);
        $returnHTML = view('barang_masuk.surat_jalan.viewData')->with('data', $data)->render();
        return response()
            ->json(array('success' => 'Data Successfully Deleted', 'html' => $returnHTML));
    }

    public function getData()
    {
        $array = collect([]);
        $data = ShippingDocument::where('status', 'complete')->get();
        foreach ($data as $key => $value) {
            $array[] = [
                $value->no_po,
                $value->item,
                $value->reciver,
                $value->recived_shipping_date,
                $value->supplier,
                $value->destination
            ];
        }

        $returnHTML = view('barang_masuk.surat_jalan.tableData')->with('data', $data)->render();
        // return response()->json($array);
        return response()->json(array('success' => 'Data Successfully', 'html' => $returnHTML));
    }

    /**
     * @param
     * 
     */
    public function mark(Request $request)
    {
        if ($request->status_all_data == 'G') {
            ShippingDocument::where('id', '=', $request->id)->update(['status_all_data' => 'NG']);
        } else {
            ShippingDocument::where('id', '=', $request->id)->update(['status_all_data' => 'G']);
        }

        return redirect()->back();
    }
}
