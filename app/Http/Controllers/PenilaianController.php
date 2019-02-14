<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Penilaian;
use App\Pengaduan;
use App\Duplikat;
use Session;
use App\User;
class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function peringkat()
    {
        $user = User::all();
        $status = Status::where('status', 1)->get();
        return view('penilaian.peringkat', compact('status', 'user'));
    }

    public function index()
    {
        $status = Status::where('status', 1)->get();
        return view('penilaian.index', compact('status'));
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
        $this->validate($request, [
            'status_id' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required',
        ]);

        $penilaian = Penilaian::create([
            'status_id' => $request->status_id,
            'nilai' => $request->nilai,
            'keterangan' => $request->keterangan
        ]);

        $pengaduan = Duplikat::find($request->duplikat);
        $pengaduan->update([
            'nilai_id' => $penilaian->id
        ]);

         Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan penilaian"
            ]);
                        
            return redirect()->route('penilaian.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = Status::find($id);
        return view('penilaian.show', compact('status'));
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
