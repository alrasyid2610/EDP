<?php

namespace App\Http\Controllers;

use App\Models\TFinalInspection0;
use App\Models\TFinalInspection1;
use App\Models\TFinalInspection2;
use App\Models\TFinalInspection3;
use App\Models\TFinalInspection4;
use App\Models\TFinalInspection5;
use App\Models\TCOIA0;
use App\Models\TCOIA1;
use App\Models\TCOIA2;
use Illuminate\Http\Request;

class CoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $TFinalInspection0 = TFinalInspection0::select()->where([
        //     ['COFCode', '=', '210601445'],
        //     // ['DUpdDate', '=', $DUpdDate],
        // ])->get();

        // dd($TFinalInspection0);
        // $message = $message ? '' : '';
        return view('coi.index', [
            'page_action' => 'index',
            'page_name' => 'COI',
            // 'TFinalInspection0' => $TFinalInspection0
        ]);
        // $a = 

        // dd($a);


        // $a = DB::connection('sqlsrv')->table('TFinalInspection2')->select()->where([
        //     ['COFCode', '=', '210601445'],
        //     ['DUpdDate', '=', $DUpdDate],
        // ])->get();

        // dd($a);
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
     * @param  \App\Models\Coi  $coi
     * @return \Illuminate\Http\Response
     */
    public function show(Coi $coi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coi  $coi
     * @return \Illuminate\Http\Response
     */
    public function edit(Coi $coi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coi  $coi
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request)
    {
        $CFINo = $request->CFINo;
        $COFCode = $request->COFCode;

        $TFinalInspection0 = TFinalInspection0::where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012'],
            ['DUpdDate', '>=', '2011']
        ])
            ->update(
                [
                    'COFCode' => $COFCode . 'X'
                ]
            );

        $TFinalInspection1 = TFinalInspection1::where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012'],
            ['DUpdDate', '>=', '2011']
        ])
            ->update(
                [
                    'COFCode' => $COFCode . 'X'
                ]
            );

        $TFinalInspection2 = TFinalInspection2::where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012'],
            ['DUpdDate', '>=', '2011']
        ])
            ->update(
                [
                    'COFCode' => $COFCode . 'X'
                ]
            );

        $TFinalInspection3 = TFinalInspection3::where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012'],
            ['DUpdDate', '>=', '2011']
        ])
            ->update(
                [
                    'COFCode' => $COFCode . 'X'
                ]
            );

        $TFinalInspection4 = TFinalInspection4::where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012'],
            ['DUpdDate', '>=', '2011']
        ])
            ->update(
                [
                    'COFCode' => $COFCode . 'X'
                ]
            );

        $TFinalInspection5 = TFinalInspection5::where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012'],
            ['DUpdDate', '>=', '2011']
        ])
            ->update(
                [
                    'COFCode' => $COFCode . 'X'
                ]
            );

        $TCOIA0 = TCOIA0::where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012'],
            ['DUpdDate', '>=', '2011']
        ])
            ->update(
                [
                    'COFCode' => $COFCode . 'X'
                ]
            );

        $TCOIA1 = TCOIA1::where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012'],
            ['DUpdDate', '>=', '2011']
        ])
            ->update(
                [
                    'COFCode' => $COFCode . 'X'
                ]
            );

        $TCOIA2 = TCOIA2::where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012'],
            ['DUpdDate', '>=', '2011']
        ])
            ->update(
                [
                    'COFCode' => $COFCode . 'X'
                ]
            );



        // return redirect()->back()->withErrors($validator)->withInput();

        return  redirect()->back()->with([
            'page_action' => 'index',
            'page_name' => 'COI',
            'message' => "
                Action Success,TFinalInspection0 <span style='color: black;'><b> $TFinalInspection0 </b></span> of affected rows SQL Server <br>
                Action Success,TFinalInspection1 <span style='color: black;'><b> $TFinalInspection1 </b></span> of affected rows SQL Server <br>
                Action Success,TFinalInspection2 <span style='color: black;'><b> $TFinalInspection2 </b></span> of affected rows SQL Server <br>
                Action Success,TFinalInspection3 <span style='color: black;'><b> $TFinalInspection3 </b></span> of affected rows SQL Server <br>
                Action Success,TFinalInspection4 <span style='color: black;'><b> $TFinalInspection4 </b></span> of affected rows SQL Server <br>
                Action Success,TFinalInspection5 <span style='color: black;'><b> $TFinalInspection5 </b></span> of affected rows SQL Server <br>
                Action Success,TCOIA0 <span style='color: black;'><b> $TCOIA0  </b></span> of affected rows SQL Server <br>
                Action Success,TCOIA1 <span style='color: black;'><b> $TCOIA1  </b></span> of affected rows SQL Server <br>
                Action Success,TCOIA2 <span style='color: black;'><b> $TCOIA2  </b></span> of affected rows SQL Server <br>
            "
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coi  $coi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coi $coi)
    {
        //
    }


    public function coiCheck(Request $request)
    {

        $CFINo = $request->CFINo;
        $COFCode = $request->COFCode;

        $TFinalInspection0 = TFinalInspection0::select('COFCode', 'CFINo', 'DUpdDate')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])
            ->orderBy('DUpdDate', 'ASC')
            ->get()->toJson(JSON_PRETTY_PRINT);

        $TFinalInspection1 = TFinalInspection1::select('COFCode', 'CFINo', 'DUpdDate')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])->get()->toJson();

        $TFinalInspection2 = TFinalInspection2::select('COFCode', 'CFINo', 'DUpdDate')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])
            ->orderBy('DUpdDate', 'ASC')
            ->get()->toJson();

        $TFinalInspection3 = TFinalInspection3::select('COFCode', 'CFINo', 'DUpdDate')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])
            ->orderBy('DUpdDate', 'ASC')
            ->get()->toJson();

        $TFinalInspection4 = TFinalInspection4::select('COFCode', 'CFINo', 'DUpdDate', 'NPage', 'NNo')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])
            ->orderBy('DUpdDate', 'ASC')
            ->get()->toJson();

        $TFinalInspection5 = TFinalInspection5::select('COFCode', 'CFINo', 'DUpdDate')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])
            ->orderBy('DUpdDate', 'ASC')
            ->get()->toJson();

        $TFinalInspection5 = TFinalInspection5::select('COFCode', 'CFINo', 'DUpdDate')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])
            ->orderBy('DUpdDate', 'ASC')
            ->get()->toJson();

        $TCOIA0 = TCOIA0::select('COFCode', 'CFINo', 'DUpdDate')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])
            ->orderBy('DUpdDate', 'ASC')
            ->get()->toJson();

        $TCOIA1 = TCOIA1::select('COFCode', 'CFINo', 'DUpdDate')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])
            ->orderBy('DUpdDate', 'ASC')
            ->get()->toJson(JSON_PRETTY_PRINT);

        $TCOIA2 = TCOIA2::select('COFCode', 'CFINo', 'DUpdDate')->where([
            ['COFCode', '=', $COFCode],
            ['CFINo', '=', $CFINo],
            ['DUpdDate', '<', '2012']
        ])
            ->orderBy('DUpdDate', 'ASC')
            ->get()->toJson(JSON_PRETTY_PRINT);
        // var_dump(json_encode($TFinalInspection0));

        // var_dump($TCOIA2);
        // dd($TCOIA2);
        // dd(json_last_error_msg());
        // return "asfsakfoaskfoaksf";


        return json_encode([
            'TFinalInspection' => [
                $TFinalInspection0,
                $TFinalInspection1,
                $TFinalInspection2,
                $TFinalInspection3,
                $TFinalInspection4,
                $TFinalInspection5,
            ],
            'TCOI' => [
                $TCOIA0,
                $TCOIA1,
                $TCOIA2,
            ]
        ]);
        // return "safasfsaf";
    }
}
