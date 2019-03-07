<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penanganan;
use App\Pengajuan;
use App\Duplikat;
use Session;
use Storage;
use File;
use Cloudder;
class PenangananController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penanganan = Penanganan::with('users', 'duplikats')->paginate(3);
        return view('penanganan.index')->with(compact('penanganan'));
    }

    public function semua_penanganan()
    {
        $penanganan = Penanganan::with('users', 'duplikats')->paginate(3);
        return view('penanganan.index')->with(compact('penanganan'));
    }

    /*public function ajukan($penanganans)
    {
        $penanganan = Penanganan::findOrFail($penanganans);
        return view('penanganan.create')->with(compact('penanganan'));
    }*/


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function unduh($id)
    {
        $penanganan = Penanganan::findOrFail($id);
        $filename = $penanganan->lampiran;
        return response()->download(public_path("lampiran/{$filename}"));
    }

    public function post_id($id)
    {
        $penanganan = Penanganan::findOrFail($id);
        return view('penanganan.create', compact('penanganan'));
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
            'penanganan_id' => 'required',
            'foto' => 'image|max:2048',
            'deskripsi' => 'required',
        ]);

        $image_name = $request->file('foto')->getRealPath();
        $cloud = Cloudder::upload($image_name, null);
        $result = Cloudder::getResult();
        

        $pengajuan = Pengajuan::create(array_merge($request->except('foto'), [
            'penanganan_id' => $request->penanganan_id,
            'foto' => $result['url'],
            'deskripsi' => $request->deskripsi
        ]));

        // // isi field cover jika ada cover yang diupload
        //     if ($request->hasFile('foto')) {

        //     // Mengambil file yang diupload
        //         $uploaded_foto = $request->file('foto');

        //     // mengambil extension file
        //         $extension = $uploaded_foto->getClientOriginalExtension();

        //     // membuat nama file random berikut extension
        //         $filename = md5(time()) . '.' . $extension;

        //     // menyimpan cover ke folder public/img
        //         $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        //         $uploaded_foto->move($destinationPath, $filename);
        //     // mengisi field cover di book dengan filename yang baru dibuat
        //         $pengajuan->foto = $filename;
                

        //         $pengajuan->save();
        //     }
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan bukti penanganan"
            ]);

            return redirect()->route('penanganan.index');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Penanganan::findOrFail($id);
        return view('penanganan.tangani', compact('pengaduan'));
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
        $this->validate($request, [
            'lampiran' => 'required',
        ]);


        $penanganan = Penanganan::find($id);
        $penanganan->update($request->all());
        if ($request->hasFile('lampiran')) {

            // Mengambil file yang diupload
                $uploaded_file = $request->file('lampiran');

            // mengambil extension file
                $extension = $uploaded_file->getClientOriginalExtension();

            // membuat nama file random berikut extension
                $filename = md5(time()) . '.' . $extension;

            // menyimpan cover ke folder public/img

                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'lampiran';
                $uploaded_file->move($destinationPath, $filename);
            // mengisi field cover di book dengan filename yang baru dibuat
                $penanganan->lampiran = $filename;
                

                $penanganan->save();
            }
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil memperbarui lampiran"
        ]);
        return redirect()->route('penanganan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penanganan = Penanganan::find($id);
        $penanganan->delete();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"penanganan berhasil dihapus"
        ]);
        return redirect()->route('penanganan.index');
    }
}
