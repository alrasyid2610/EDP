<?php

namespace App\Http\Controllers;

use App\Models\SuratJalan;
use Illuminate\Http\Request;
use App\Http\Requests\SuratJalanStoreRequest;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuratJalan::all();
        return view('barang_masuk.surat_jalan.index', ['page_action' => 'Data', 'page_name' => 'Surat Jalan', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        // $request->session()->flush();
        // $request->session()->put('harun','safsafsaf');
        return view('barang_masuk.surat_jalan.create', ['page_action' => 'Input', 'page_name' => 'Surat Jalan']);
    }

    public function create2(Request $request)
    {   
        // $request->session()->flush();
        // $request->session()->put('harun','safsafsaf');
        return view('barang_masuk.surat_jalan.create', ['page_action' => 'darr', 'page_name' => 'Surat Jalan']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuratJalanStoreRequest $request)
    {
        // $validator = $request->validated();
        SuratJalan::create([
            'no_po' => $request->no_po,
            'penerima' => $request->penerima,
            'tgl_terima' => $request->tgl_terima,
            'supplier' => $request->supplier,
            'tujuan' => $request->tujuan
        ]);

        return redirect()->back()->withErrors($request, 'login')->withInput();
    }


    // public function store2(Request $request)
    // {

    //     $request->validate([
    //         'no_po' => 'required|min:7',
    //         'penerima' => 'required|min:5',
    //     ]);
        
    //     SuratJalan::create([
    //         'no_po' => request('no_po'),
    //         'penerima' => request('penerima'),
    //         'tgl_terima' => request('tgl_terima'),
    //         'supplier' => request('supplier'),
    //         'tujuan' => request('tujuan')
    //     ]);

    //     return redirect()->back()->with('success', 'Data created successfully.');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratJalan  $suratJalan
     * @return \Illuminate\Http\Response
     */
    public function show(SuratJalan $suratJalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratJalan  $suratJalan
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratJalan $suratJalan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratJalan  $suratJalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratJalan $suratJalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratJalan  $suratJalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratJalan $suratJalan)
    {
        $suratJalan->delete();

        return redirect()->back();
    }
}
