<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportSectionData;
use Maatwebsite\Excel\Facades\Excel;

class SectionController extends Controller
{
    public function import_excel(Request $request) 
    {
        // validasi
        $this->validate($request, [
        'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        // menangkap file excel
        $file = $request->file('file');
        
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
        
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_section',$nama_file);
        
        // import data
        Excel::import(new ImportSectionData, public_path('/file_section/'.$nama_file));
        
        // notifikasi dengan session
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');
        
        // alihkan halaman kembali
        return redirect('/import/section');
    }
}
