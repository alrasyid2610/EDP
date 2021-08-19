<?php

namespace App\Http\Controllers;

use App\Models\Tanya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $data_pertanyaan = Tanya::get()->SortByDesc('tgl_pertanyaan');
        return view('curhat.index', ['page_action' => '', 'page_name' => 'Halaman Utama', 'name' => $user->name, 'id_user' => $user->id, 'data_pertanyaan' => $data_pertanyaan]);
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
        // dd($request->user());
        Tanya::create([
            'kategori' => $request->kategori,
            'username' => $request->user,
            'user_id' => $request->user()->id,
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect('tanya')->with('message', 'Pertanyaan berhasil di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanya  $tanya
     * @return \Illuminate\Http\Response
     */
    public function show(Tanya $tanya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanya  $tanya
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanya $tanya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanya  $tanya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanya $tanya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanya  $tanya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanya $tanya)
    {
        //
    }
}
