<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Monitor;
use App\Models\Section;
use App\Models\ComputerUser;
use App\Models\ComputerOperation;
use App\Models\FixAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class ComputersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Debugbar::info($object);
        // Debugbar::error('Error!');
        // Debugbar::warning('Watch out…');
        // Debugbar::addMessage('Another message', 'mylabel');
        return view('computers.index', ['page_action' => 'Data', 'page_name' => 'Computer']);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataSection = Section::all('section_name');
        $data_section = SectionController::get_data_section();
        return view('computers.create', ['page_action' => 'Input', 'page_name' => 'Computer', 'data_section' => $data_section]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $location = $request->location == 'PULOGADUNG' ? 'P' : 'K';

        // dd($location);

        $arrComputerUser = [];
        $arrComputer = [];
        $arrMonitor = [];
        array_push(
            $arrComputerUser,
            [
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'user_login' => $request->user_login,
                'password' => $request->password,
                'section' => $request->section,
                'position' => $request->position
            ]
        );

        array_push(
            $arrComputer,
            [
                'pc_name' => $request->pc_name,
                'pc_brand' => $request->pc_brand,
                'processor' => $request->processor,
                'operating_system' => $request->operating_system,
                'ram' => $request->ram,
                'hdd' => $request->hdd,
                'ip' => $request->ip,
                'internet' => $request->internet,
                'nsi' => $request->nsi,
                'boss' => $request->boss,
                'ms_office' => $request->ms_office,
                'antivirus' => $request->antivirus,
                'ups' => $request->ups,
                'wsus' => $request->wsus,
                'click_one' => $request->click_one,
                'ax' => $request->ax,
                'schedule_ppc' => $request->schedule_ppc,
                'location' => $request->location,
                'computer_operation' => $request->computer_operation,
                'computer_description' => $request->computer_description == '' ? '-' : $request->computer_description,
                'fa_computer' => $request->fa_computer,
                'computer_date' => $request->computer_date,
                'com_edp_number' => $request->com_edp_number,
            ]
        );

        array_push(
            $arrMonitor,
            [
                'edp_fixed_asset_number' => $request->edp_monitor_number,
                'monitor_brand' => $request->monitor_brand,
                'screen_plugs' => $request->screen_plugs,
                // 'monitor_date' => $request->monitor_date
            ]
        );

        // INPUT FIX ASSET MONITOR and input monitor data
        $fix_asset_monitor = FixAsset::create([
            'fixed_asset_number' => $request->fa_monitor,
            'edp_fixed_asset_number' => $request->edp_monitor_number,
            'fixed_asset_date' => $request->monitor_date,
            'item_type' => 'Monitor',
            'status' => 'ND',
            'location' => $location
        ]);

        $arrMonitor[0]['fix_asset_id'] = $fix_asset_monitor->id;

        $monitor_id = Monitor::create($arrMonitor[0])->id;
        //END INPUT FIX ASSET MONITOR and input monitor data




        $fix_asset_computer = FixAsset::create([
            'fixed_asset_number' => $request->fa_computer,
            'edp_fixed_asset_number' => $request->edp_monitor_number,
            'fixed_asset_date' => $request->computer_date,
            'item_type' => 'Computer',
            'status' => 'ND',
            'location' => $location
        ]);


        $arrComputer[0]['fix_asset_id'] = $fix_asset_computer->id;

        $computer_id = Computer::create($arrComputer[0])->id;


        $computer_user_id = ComputerUser::create($arrComputerUser[0])->id;

        // dd($arrMonitor);

        $arrComputerOperation = [
            'computer_id' => $computer_id,
            'monitor_id' => $monitor_id,
            'computer_user_id' => $computer_user_id
        ];
        ComputerOperation::create($arrComputerOperation);

        return redirect()->back()->with(['message' => 'Data berhasil di tambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        // $id = ComputerOperation::find($request->id);
        $computer = Computer::find($id);
        $id = $computer->id ?? $id;

        $flag = $request->flag;

        if (isset($flag)) {
            if ($flag == 'computer_incomplete') {
            $computer = $computer;
                return view('computers.show_incomplete', ['page_action' => 'Show', 'page_name' => 'Computer', 'data' => $computer]);
            } else if ($flag != "computer_incomplete") {
                return redirect()->route('computers.index');
            } 
        } else {
            $data = ComputerOperation::find($id);
            // $data = DB::table('computer_operations as CO')
            //     ->select('CU.*', 'C.*', 'M.*', 'CO.id as co_id')
            //     ->join('computers as C', 'CO.computer_id', '=', 'C.id')
            //     ->join('computer_users as CU', 'CO.computer_user_id', '=', 'CU.id')
            //     ->join('monitors as M', 'CO.monitor_id', '=', 'M.id')
            //     ->where('CO.id', '=', $id)
            //     ->get();

            return view('computers.show', ['page_action' => 'Show', 'page_name' => 'Computer'])->with(['data' => $data, 'dataSection' => Section::all()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        // dd($id);

        if ($request->flag == 'computer_incomplete') {
            $computer_incomplete = Computer::find($id);
            $dataSection = SectionController::get_data_section();

            return view('computers.create_incomplete', ['page_action' => 'Edit', 'page_name' => 'Computer', 'data_section' => $dataSection]);


        } else if ($request->flag != 'computer_incomplete') {
            return redirect()->route('computers.index');
        } else {
            
            $computer = ComputerOperation::find($id);

            $monitor_id = $computer->monitor_id;
            $computer_user_id = $computer->computer_user_id;
            $computer_id = $computer->computer_id;
            $dataSection = SectionController::get_data_section();

            
            // dd($data);
            // dd($computer->monitor_id);

            

            return view('computers.edit', ['page_action' => 'Edit', 'page_name' => 'Computer', 'data' => $computer, 'dataSection' => $dataSection]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComputerOperation $computer)
    {
        dd($computer);

        Computer::where('id', $computer->computer_id)
            ->update([
                'pc_name' => $request->pc_name,
                'pc_brand' => $request->pc_brand,
                'computer_operation' => $request->computer_operation,
                'processor' => $request->processor,
                'operating_system' => $request->operating_system,
                'ram' => $request->ram,
                'hdd' => $request->hdd,
                'ip' => $request->ip,
                'internet' => $request->internet,
                'nsi' => $request->nsi,
                'boss' => $request->boss,
                'ms_office' => $request->ms_office,
                'antivirus' => $request->antivirus,
                'ups' => $request->ups,
                'wsus' => $request->wsus,
                'click_one' => $request->click_one,
                'ax' => $request->ax,
                'schedule_ppc' => $request->schedule_ppc,
                'location' => $request->location,
                'computer_description' => $request->computer_description,
                'fa_computer' => $request->fa_computer,
                'computer_date' => $request->computer_date,
                'com_edp_number' => $request->com_edp_number,
            ]);
        Monitor::where('id', $computer->monitor_id)
            ->update([
                'monitor_brand' => $request->monitor_brand,
                'screen_plugs' => $request->screen_plugs,
                'fa_monitor' => $request->fa_monitor,
                'edp_monitor_number' => $request->edp_monitor_number,
                'monitor_date' => $request->monitor_date
            ]);
        ComputerUser::where('id', $computer->computer_user_id)
            ->update([
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'user_login' => $request->user_login,
                'password' => $request->password,
                'section' => $request->section,
                'position' => $request->position
            ]);
        return redirect()->route('computers.index');
        // $arrComputer->push();
        // $arrMonitor->push();
    }

    public function getData()
    {
        $data = DB::table('computer_operations as CO')
            ->select('CU.name', 'C.pc_name', 'C.ip', 'C.operating_system', 'CU.section', 'C.location', 'C.computer_operation', 'CO.id', 'C.created_at')
            ->join('computers as C', 'CO.computer_id', '=', 'C.id')
            ->join('computer_users as CU', 'CO.computer_user_id', '=', 'CU.id')
            ->orderBy('C.created_at', 'ASC')->get();

        $data2 = $data;

        $jumlahField = 27;
        $arr = [];
        foreach ($data2 as $key => $value) {
            $jumlahNull = collect($value)->whereNull()->count();
            $persen = round((float)number_format($jumlahNull / $jumlahField * 100, 2));
            // $persen = $jumlahNull / $jumlahField * 100;
            $datalengkappersen = 100 - $persen;

            array_push($arr, $datalengkappersen);
        }
        // dd($data);

        $returnHTML = view('computers.tableData')->with(['data' => $data2, 'data_persen' => $arr])->render();

        return response()->json(array('success' => 'Data Successfully Deleted', 'html' => $returnHTML));
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $data = ComputerOperation::find($id);
        
        if (!is_null($data)) {
            $computer = Computer::find($data->computer_id);
            $computer_fix_asset = Computer::find($data->computer_id)->fix_asset;

            $monitor = Monitor::find($data->monitor_id);
            $monitor_fix_asset = Monitor::find($data->monitor_id)->fix_asset;

            $user = ComputerUser::find($data->computer_user_id);

            $data->delete();
            $computer->delete();
            $computer_fix_asset->delete();
            $monitor->delete();
            $monitor_fix_asset->delete();
            $user->delete();

            // $returnHTML = view('barang_masuk.surat_jalan.tableData')->with('data', $data)->render();
            $data = DB::table('computer_operations as CO')
            ->select('CU.name', 'C.pc_name', 'C.ip', 'C.operating_system', 'CU.section', 'C.location', 'C.computer_operation', 'CO.id', 'C.created_at')
            ->join('computers as C', 'CO.computer_id', '=', 'C.id')
            ->join('computer_users as CU', 'CO.computer_user_id', '=', 'CU.id')
            ->orderBy('C.created_at', 'ASC')->get();

            $data2 = $data;

            $jumlahField = 27;
            $arr = [];
            foreach ($data2 as $key => $value) {
                $jumlahNull = collect($value)->whereNull()->count();
                $persen = round((float)number_format($jumlahNull / $jumlahField * 100, 2));
                // $persen = $jumlahNull / $jumlahField * 100;
                $datalengkappersen = 100 - $persen;

                array_push($arr, $datalengkappersen);
            }

            $returnHTML = view('computers.tableData')->with(['data' => $data2, 'data_persen' => $arr])->render();

            return response()->json(array('success' => 'Data Successfully Deleted', 'html' => $returnHTML, 'tableData' => 'computer'));

        }
    }



    

    // DATA COMPUTER YANG BELUM LENGKAP (BELUM ADA DATA USER)
    public function getDataComputerIncomplete()
    {
        $data = DB::table('computer_operations as CO')
            ->select('C.*')
            ->rightJoin('computers as C', 'C.id', '=', 'CO.computer_id')
            ->where('CO.computer_id', null)
            // ->join('computer as CU', 'CO.computer_user_id', '=', 'CU.id')
            ->get();


        $data2 = $data;
        $jumlahField = 27;
        $arr = [];
        foreach ($data2 as $key => $value) {
            $jumlahNull = collect($value)->whereNull()->count();
            $persen = round((float)number_format($jumlahNull / $jumlahField * 100, 2));
            // $persen = $jumlahNull / $jumlahField * 100;
            $datalengkappersen = 100 - $persen;

            array_push($arr, $datalengkappersen);
        }

        $returnHTML = view('computers.tableData2')->with(['data' => $data, 'data_persen' => $arr])->render();
        return response()->json(array('success' => 'Data Successfully Deleted', 'html' => $returnHTML));
        # code...
    }



    public function editUser($id, Request $request)
    {
        $data = request()->except(['_token', '_method']);
        ComputerUser::find($id)->update($data);

        return redirect()->back()->with(['message' => 'Data User Berhasil di Edit']);
    }

    public function editProgram($id, Request $request)
    {
        $data = request()->except(['_token', '_method']);
        Computer::find($id)->update($data);

        return redirect()->back()->with(['message' => 'Data Program Berhasil di Edit']);
    }

    public function editComputer($id, Request $request)
    {
        // $dd = collect($request->only(['fa_computer', 'com_edp_number', 'computer_date']))->values();
        Computer::find($id)->fix_asset->update([
            'fixed_asset_number' => $request->fa_computer,
            'edp_fixed_asset_number' => $request->com_edp_number,
            'fixed_asset_date' => $request->computer_date
        ]);
        // $data_fix_asset = collect($dd)->merge(['item_type' => 'Computer']);


        $data = request()->except(['_token', '_method']);
        Computer::find($id)->update($data);
        return redirect()->back()->with(['message' => 'Data Computer Berhasil di Edit']);
    }

    public function editMonitor($id, Request $request)
    {
        Monitor::find($id)->fix_asset->update([
            'fixed_asset_number' => $request->fa_monitor,
            'edp_fixed_asset_number' => $request->edp_monitor_number,
            'fixed_asset_date' => $request->monitor_date
        ]);
        Monitor::find($id)->update([
            'edp_fixed_asset_number' => $request->edp_monitor_number,
            'screen_plugs' => $request->screen_plugs,
            'monitor_brand' => $request->monitor_brand
        ]);
        return redirect()->back()->with(['message' => 'Data Monitor Berhasil di Edit']);
    }
}
