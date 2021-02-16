<?php

namespace App\Http\Controllers;

use App\Models\ShippingDocument;
use Illuminate\Http\Request;
use App\Http\Requests\RequestShippingDocument;
use Illuminate\Support\Facades\Validator;

class ShippingDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShippingDocument::all();
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
    public function store(RequestShippingDocument $request)
    {

        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator, 'login')
                        ->withInput();
        }
        ShippingDocument::create([
            'no_po' => $request->no_po,
            'reciver' => $request->reciver,
            'recived_date' => $request->recived_date,
            'supplier' => $request->supplier,
            'destination' => $request->destination
        ]);

        return redirect()->back()->with('success', 'Data added successfully');
        

        // if($validator->fails()) {
        //     return redirect()->back();
        // } else {
        //     return redirect()->back()->withErrors($validator, 'login')->withInput();
        // }

    }


    // public function store2(Request $request)
    // {

    //     $request->validate([
    //         'no_po' => 'required|min:7',
    //         'penerima' => 'required|min:5',
    //     ]);
        
    //     ShippingDocument::create([
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
     * @param  \App\Models\ShippingDocument  $shippingDocument
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingDocument $shippingDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingDocument  $shippingDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingDocument $shippingDocument)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingDocument  $shippingDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingDocument $shippingDocument)
    {
        $shippingDocument->delete();
        $data = $shippingDocument->all();
        $returnHTML = view('barang_masuk.surat_jalan.viewData')->with('data', $data)->render();
        return response()->json(array('success' => 'Data Successfully Deleted', 'html'=>$returnHTML));
    }
}
