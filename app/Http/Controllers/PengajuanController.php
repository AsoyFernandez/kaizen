<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajuan;
use App\Penanganan;
use App\Status;
use Session;
use Auth;
class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = Pengajuan::all();
        $penanganan = Penanganan::all();
        $status = Status::all();
        return view('pengajuan.index', compact('pengajuan', 'status', 'penanganan'));
    }

    public function semua_pengajuan()
    {
        $pengajuan = Pengajuan::all();
        $penanganan = Penanganan::all();
        $status = Status::all();
        return view('pengajuan.semua_pengajuan', compact('pengajuan', 'status', 'penanganan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pengajuan.create');
    }

    public function tolak(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        Status::create([
            'pengajuan_id'=> $pengajuan->id,
            'status' => 0,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::user()->id,
        ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menolak pengajuan"
            ]);
            return redirect()->route('pengajuan.semua');
    }

    public function terima(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        Status::create([
            'pengajuan_id'=> $pengajuan->id,
            'status' => 1,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::user()->id,
        ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Pengajuan diterima"
            ]);
            return redirect()->route('pengajuan.semua');
    }    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penanganan = Penanganan::findOrFail($id);
        return view('pengajuan.show', compact('penanganan'));
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
}
