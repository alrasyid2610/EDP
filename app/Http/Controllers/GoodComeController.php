<?php

namespace App\Http\Controllers;

use App\Models\GoodCome;
use App\Models\TechnicalDocument;
use App\Models\ShippingDocument;
use App\Models\FixAsset;
use App\Models\Computer;
use App\Models\IncomingGood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


class GoodComeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('barang_masuk.index', ['page_action' => 'View', 'page_name' => 'Goods Come']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GoodCome  $goodCome
     * @return \Illuminate\Http\Response
     */
    public function show(IncomingGood $goodCome, Request $request)
    {
        $id_goods = $goodCome->find($request->goods_come);
        if ($id_goods == null) {
            return redirect()->route('goods_come.index');
        }
        $data = IncomingGood::getData($id_goods);
        // $data = $data[0];
        return view('barang_masuk.show', ['page_action' => 'View', 'page_name' => 'Goods Come', 'data' => $data, 'id_good_come' => $request->goods_come]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoodCome  $goodCome
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodCome $goodCome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GoodCome  $goodCome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoodCome $goodCome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoodCome  $goodCome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GoodCome $goodCome)
    {
        //
        $id = $request->id; // ID goods_come / incoming goods
        $data = IncomingGood::removeGoodCome($id);

        $data = DB::table('shipping_documents as S')
            ->select(
                'S.no_po',
                'T.no_document',
                'S.reciver',
                'T.user',
                'S.item',
                'T.departement',
                'S.destination',
                'FA.status',
                'IG.id'
            )
            ->join('incoming_goods as IG', 'IG.shipping_document_id', '=', 'S.id')
            ->join('fix_assets as FA', 'FA.id', '=', 'IG.fix_asset_id')
            ->join('technical_documents as T', 'T.shipping_document_id', '=', 'S.id')
            ->orderBy('IG.id', 'asc')
            ->get();

        $returnHTML = view('barang_masuk.viewTableData2')->with(['a' => true, 'data' => $data])->render();
        // dd($returnHTML);
        return response()->json(array('success' => 'Data Berhasil di Delete', 'html' => $returnHTML));

        // return redirect()->route('goods_come.index')->with('success', $data);
    }

    public function getData()
    {

        $data = DB::table('shipping_documents as S')
            ->select('S.status_all_data as sd', 'S.id as no_doc', 'S.no_po', 'IG.shipping_document_id', 'T.no_document', 'S.reciver', 'T.user', 'S.item', 'T.departement', 'S.destination', 'FA.status', 'IG.id')
            // ->distinct('IG.shipping_document_id')
            ->join('incoming_goods as IG', 'IG.shipping_document_id', '=', 'S.id')
            ->join('fix_assets as FA', 'FA.id', '=', 'IG.fix_asset_id')
            ->join('technical_documents as T', 'T.shipping_document_id', '=', 'S.id')
            ->orderBy('S.id', 'asc')
            ->get();
        // ->get();

        // $data = DB::table('incoming_goods')->select('shipping_document_id')->distinct()->get();

        // dd($data);


        $returnHTML = view('barang_masuk.viewTableData')->with(['data' => $data])->render();
        return response()->json(array('success' => 'Data Successfully Geted', 'html' => $returnHTML, 'count' => count($data)));
    }

    // untuk menghapus barang datang beserta menghapus surat jalan , bonteknik , dan fix assetnya

}
