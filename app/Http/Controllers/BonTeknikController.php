<?php

namespace App\Http\Controllers;

use App\Models\BonTeknik;
use Illuminate\Http\Request;

class BonTeknikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BonTeknik::all();
        return view('barang_masuk.bon_teknik.index', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang_masuk.bon_teknik.create', ['page_action' => 'Input', 'page_name' => 'Bon Teknik']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BonTeknik::create([
            'no_bon' => $request->no_bon,
            'tgl_buat' => $request->tgl_buat,
            'user' => $request->user,
            'dept' => $request->dept,
            'keterangan' => $request->keterangan,
            'tgl_buat' => $request->tgl_terima_bon,
            'penerima_bon' => $request->penerima_bon,
            'pelaksana' => $request->pelaksana,
            'tgl_terima_bon' => $request->tgl_terima
        ]);

        return redirect()->back()->with('succsess', 'Data Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BonTeknik  $bonTeknik
     * @return \Illuminate\Http\Response
     */
    public function show(BonTeknik $bonTeknik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BonTeknik  $bonTeknik
     * @return \Illuminate\Http\Response
     */
    public function edit(BonTeknik $bonTeknik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BonTeknik  $bonTeknik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BonTeknik $bonTeknik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BonTeknik  $bonTeknik
     * @return \Illuminate\Http\Response
     */
    public function destroy(BonTeknik $bonTeknik)
    {
        $bonTeknik->delete();

        return redirect()->back();
    }
}
