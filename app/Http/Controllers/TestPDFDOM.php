<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class TestPDFDOM extends Controller
{
    public function test()
    {
        // $customPaper = array(0,0,595.276,419.5);
        // $pdf = PDF::loadView('barang_masuk.surat_jalan.test')->setPaper($customPaper, 'landscape');
        // return $pdf->download('test.pdf');

        // $pdf = PDF::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');

        return view('barang_masuk.surat_jalan.test');
        // echo "saf";
    }
}
