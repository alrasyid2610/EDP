<?php

namespace App\Http\Controllers\Laptop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\LaptopImport;
use App\Models\Laptop;
use App\Models\LaptopDevice;
use App\Models\LaptopNote;
use App\Models\Section;
use Maatwebsite\Excel\Facades\Excel;

class LaptopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Laptop::all()->toJson();
        $krw = Section::where('section_location', '=', 'Krawang')->get();
        $plg = Section::where('section_location', '=', 'Pulogadung')->get();
        return view('laptop.index', ['page_action' => 'Index', 'page_name' => 'Laptop', 'data_section' => ['data_section_krw' => $krw, 'data_section_plg' => $plg]]);
    }

    public function index2()
    {
        # code...
        return Laptop::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laptop.create', ['page_action' => 'Create', 'page_name' => 'Laptop']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_temp = collect([]);
        $data = Laptop::find($id)->laptop_notes;
        $data_temp[] = Laptop::find($id);

        $data_temp[] = $data->map(function ($item, $key) {
            $d = $item;
            $d->description = json_decode($item->description);

            return $d;
        });

        return $data_temp->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function pensiun(Request $request)
    {

        // dd($request);
        $note_type = '';
        if ($request->keterangan == 'pensiun' or $request->keterangan == 'resign' or $request->keterangan == 'Lainnya') {
            $note_type = 'Pengembalian';

            $description = [
                'tanggal_terima' => $request->recived_date,
                'user_menyerahkan' => $request->menyerahkan,
                'edp_penerima' => $request->penerima
            ];
        } else if ($request->keterangan == 'Service' or ($request->keterangan == 'Penyerahan' and $request->sub_note_type == 'Service Completed')) {
            $note_type = 'Service';

            if (isset($request->sub_note_type)) {
                if ($request->sub_note_type == 'Pending Service') {
                    $data = LaptopNote::select()->where('no_laptop', '=', $request->no_laptop)->orderBy('created_at', 'desc')->first();

                    $description = json_decode($data->description, 1);
                    $description['penyerahan_ke_vendor'] = [
                        'tgl_penyerahan' => $request->tgl_penyerahan,
                        'vendor' => $request->vendor,
                        'edp_menyerahkan' => $request->menyerahkan,
                        'vendor_menerima' => $request->penerima
                    ];

                    // dd($description);
                } else if ($request->sub_note_type == 'On Service') {
                    $data = LaptopNote::select()->where('no_laptop', '=', $request->no_laptop)->orderBy('created_at', 'desc')->first();

                    $description = json_decode($data->description, 1);
                    $description['penyerahan_ke_dnp'] = [
                        'tgl_penyerahan' => $request->tgl_penyerahan,
                        'vendor' => $request->vendor,
                        'vendor_menyerahkan' => $request->menyerahkan,
                        'edp_penerima' => $request->penerima
                    ];
                } else if ($request->sub_note_type == 'Service Completed') {
                    $data = LaptopNote::select()->where('no_laptop', '=', $request->no_laptop)->orderBy('created_at', 'desc')->first();

                    $description = json_decode($data->description, 1);
                    $description['penyerahan_ke_user'] = [
                        'tgl_penyerahan' => $request->tgl_penyerahan,
                        'edp_menyerahkan' => $request->menyerahkan,
                        'user_penerima' => $request->penerima
                    ];
                }
            } else {
                $description['pengembalian_ke_edp'] = [
                    'tanggal_terima' => $request->recived_date,
                    'user_menyerahkan' => $request->menyerahkan,
                    'edp_penerima' => $request->penerima,
                    'kerusakan' => $request->kerusakan,
                    'pengecekan' => $request->pengecekan,
                ];
            }
        } else if ($request->keterangan == 'Penyerahan') {
            $note_type = 'Penyerahan';

            $departement = explode('|', $request->departement);

            $description = [
                'tgl_penyerahan' => $request->tgl_penyerahan,
                'edp_menyerahkan' => $request->menyerahkan,
                'user_penerima' => $request->penerima,
                'departement' => trim($departement[1]),
                'location' => trim($departement[2]) == 'Krawang' ? 'KRW' : 'PLG'
            ];
        }



        if ($note_type == 'Pengembalian' or ($note_type == 'Penyerahan' and $request->sub_note_type == 'EDP')) {
            $keterangan = ($request->keterangan == 'Lainnya' and isset($request->lainnya)) ? $request->lainnya : $request->keterangan;
            LaptopNote::create([
                'id_laptop' => $request->id_laptop,
                'no_laptop' => $request->no_laptop,
                'note_type' => $note_type,
                'sub_note_type' => ucfirst($keterangan),
                'description' => json_encode($description),
            ]);

            if ($note_type == 'Penyerahan') {
                # code...
                Laptop::where('id', '=', $request->id_laptop)
                    ->update([
                        'status' => 'User',
                        'departement' => trim($departement[1]),
                        'location' => trim($departement[2]) == 'Krawang' ? 'KRW' : 'PLG',
                        'current_user' => $request->penerima
                    ]);
            } else if ($note_type == 'Pengembalian') {
                Laptop::where('id', '=', $request->id_laptop)
                    ->update([
                        'status' => 'EDP',
                        'current_user' => 'Tidak Ada'
                    ]);
            }
        } else if ($note_type == 'Service' or ($note_type == 'Penyerahan' and $request->sub_note_type == 'Service Completed')) {

            if (isset($request->sub_note_type)) {
                if ($request->sub_note_type == 'Pending Service') {
                    $data = LaptopNote::select()->where('no_laptop', '=', $request->no_laptop)->orderBy('created_at', 'desc')->first()->update([
                        'description' => $description
                    ]);


                    Laptop::where('id', '=', $request->id_laptop)
                        ->update([
                            'status' => 'On Service',
                        ]);
                } else if ($request->sub_note_type == 'On Service') {
                    $data = LaptopNote::select()->where('no_laptop', '=', $request->no_laptop)->orderBy('created_at', 'desc')->first()->update([
                        'description' => $description
                    ]);


                    Laptop::where('id', '=', $request->id_laptop)
                        ->update([
                            'status' => 'Service Completed',
                        ]);
                } else if ($request->sub_note_type == 'Service Completed') {
                    $data = LaptopNote::select()->where('no_laptop', '=', $request->no_laptop)->orderBy('created_at', 'desc')->first()->update([
                        'description' => $description
                    ]);


                    Laptop::where('id', '=', $request->id_laptop)
                        ->update([
                            'status' => 'User',
                        ]);
                }
            } else {
                LaptopNote::create([
                    'id_laptop' => $request->id_laptop,
                    'no_laptop' => $request->no_laptop,
                    'note_type' => $note_type,
                    'sub_note_type' => ucfirst($request->keterangan),
                    'description' => json_encode($description),
                ]);


                Laptop::where('id', '=', $request->id_laptop)
                    ->update([
                        'status' => 'Pending Service',
                    ]);
            }
        }




        return redirect('/laptop');
    }





    // get laptop device
    public function get_laptop_device()
    {
        return LaptopDevice::all()->toJson();
    }





    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_section', $nama_file);

        // import data
        $d = Excel::import(new LaptopImport, public_path('/file_section/' . $nama_file));
        // $d = Excel::toArray(new LaptopImport, public_path('/file_section/' . $nama_file));
        // dd($d);
        // notifikasi dengan session
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect()->back();
    }
}
