<?php

namespace App\Http\Controllers;

use App\Models\TechnicalDocument;
use Illuminate\Http\Request;
use App\Http\Requests\RequestTechnicalDocument;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Crypt;

class TechnicalDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return print_r($request->request);
        if (count($request->request) < 1) {
            $data = TechnicalDocument::all();
            return view('barang_masuk.bon_teknik.index', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data' => $data]);
        } else {
            if ( $request->has('data')) {
                if ( $request->data == 'noComplete' ) {
                    $arrTemp = collect([]);

                    // dd($arrTemp);
                    
                    $data = DB::table('tbl_surat_jalan_barang')
                    ->leftJoin('tbl_bon_teknik_barang', 'tbl_surat_jalan_barang.no_po', '=', 'tbl_bon_teknik_barang.id_surat_jalan')
                    ->select('tbl_surat_jalan_barang.id_surat_jalan', 'tbl_bon_teknik_barang.id_bon_teknik', 'tbl_surat_jalan_barang.*')
                    ->get();
                    $data = collect($data->whereIn('id_bon_teknik', [null])->all());

                    // $data->mapSpread(function($a, $b, $c, $d, $e, $f, $g, $h, $i) {

                    // });
                    
                    // dd($data);
                    // dd(Crypt::encryptString($data[260]));
                    
                    // dd($data[7]->id);
                    return view('barang_masuk.bon_teknik.index', ['page_action' => 'Input', 'page_name' => 'Bon Teknik', 'data' => $data, 'action' => 'editSJ']);
                } 
            }
        }
        
        return redirect()->route('bon_teknik.index');
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
    public function store(RequestTechnicalDocument $request)
    {
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator, 'login')
                        ->withInput();
        }
        TechnicalDocument::create([
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
        //
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
        //
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
        // return response()->json(array('success' => 'Data Berhasil di Delete'));
        // $technicalDocument->delete();
        // $data = TechnicalDocument::all();
        // $returnHTML = view('barang_masuk.bon_teknik.viewData')->with('data', $data)->render();
        // return response()->json(array('success' => 'Data Berhasil di Delete', 'html'=>$returnHTML));
    }
}
