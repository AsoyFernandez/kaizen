<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tempat;
use App\Duplikat;
use App\Penanganan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use File;
use DB;
use Disk;
use App\User;
use App\Status;
class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function pengaduanku(){
        $user = Auth::user()->id;
        $pengaduan = Pengaduan::where('user_id', $user)->get();
        return view('pengaduan.pengaduanku', compact('pengaduan'));
    }

    public function semuapengaduan(){
        $pengaduan = Pengaduan::all();
        $duplikat = Duplikat::all();
        return view('pengaduan.semua_pengaduan', compact('pengaduan', 'duplikat'));
    }

    public function index()
    {
        $user = User::find(Auth::id())->roles()->get();
    
        foreach ($user as $key) {
            if ($key->nama == 'Admin') {
            $duplikats = Duplikat::all();        
            $pengaduan = Pengaduan::all();
            return view('pengaduan.index_gabungkan')->with(compact('pengaduan', 'duplikats'));
            }elseif ($key->nama == 'Petugas 5R') {
                $duplikats = Duplikat::all();
                return view('pengaduan.index_petugas')->with(compact('pengaduan', 'duplikats'));    
            }elseif ($key->nama == 'Pengawas 5R') {
                $status = Status::all();
                $duplikats = Duplikat::all();
                $pengaduan = Pengaduan::all();
                return view('pengaduan.index_gabungkan')->with(compact('status', 'duplikats', 'pengaduan'));
            }
        };
        //$duplikatts = Duplikat::with('pengaduans')->first()->pengaduans->first();
        $duplikats = Duplikat::all();
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index_petugas')->with(compact('duplikats', 'pengaduan'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (isset($request->lokasi)) {
            $lokasi = Tempat::find($request->lokasi);            
            return view('pengaduan.create', compact('lokasi'));
       }
        return view('pengaduan.create');
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
            'lokasi_id' => 'required',
            'kategori_id' => 'required',
            'foto' => 'image|max:2048',
            'deskripsi' => 'required',
        ]);

        $pengaduan = Pengaduan::create(array_merge($request->except('foto'), [
            'user_id' => Auth::id(),
            'lokasi_id' => $request->lokasi_id,
            'kategori_id' => $request->kategori_id,
            'foto' => $request->foto,
            'deskripsi' => $request->deskripsi
        ])) ;

           /* $str = (string)$request->deskripsi;
            $low = strtolower($str);
            $exp = explode(" ", $low);
            for ($i=0; $i < count($exp) ; $i++) { 
                // jika ada keyword yang dimasukan attach pengaduan
                // jiak tidak ada, simpan keyword lalu atach pengaduan
                if (Keyword::where('kunci', $exp[$i])->first() == null) {  
                    $keyword = Keyword::create([
                        'kunci'=>$exp[$i]
                    ]);
                    $keyword->pengaduans()->attach($pengaduan);
                }else{
                Keyword::where('kunci', $exp[$i])->first()->pengaduans()->attach($pengaduan);
                
                }
            }
    */
            // isi field cover jika ada cover yang diupload
            if ($request->hasFile('foto')) {

            // Mengambil file yang diupload
                $uploaded_foto = $request->file('foto');

            // mengambil extension file
                $extension = $uploaded_foto->getClientOriginalExtension();

            // membuat nama file random berikut extension
                $filename = md5(time()) . '.' . $extension;

            // menyimpan cover ke folder public/img
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                $uploaded_foto->move($destinationPath, $filename);
            // mengisi field cover di book dengan filename yang baru dibuat
                $pengaduan->foto = $filename;
                

                $pengaduan->save();
            }

            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan pengaduan"
            ]);
                        
            return redirect()->route('pengaduan.index');
        }

        public function merge(Request $request)
        {
            $this->validate($request,['duplikat'=>'required']);
            
            if (isset($request->duplikat)) {
                $pengaduan = Pengaduan::find($request->duplikat);        
                if (isset($request->sudah_ada)) {
                    $sudah_ada = true;
                    return view('pengaduan.merge', compact('pengaduan', 'sudah_ada'));
                }
                return view('pengaduan.merge', compact('pengaduan'));
            }

            return view('pengaduan.merge');
        }
       

        public function merges(Request $request)
        {
            /*if (isset($request->duplicate_id)) {
                for ($i=0; $i < count($request->duplikat); $i++) { 
                    $duplikat = Duplikat::find($request->duplicate_id);
                    $pengaduan = Pengaduan::find($request->duplikat[$i]);
                    $pengaduan->update([
                        'duplikat_id'=> $duplikat->id
                    ]);
                };

                Session::flash("flash_notification", [
                    "level"=>"success",
                    "message"=>"Berhasil menggabungkan pengaduan"
                ]);                
            } else {

                $duplikate = Duplikat::create([
                    'deskripsi' => $request->deskripsi,
                ]) ;

                for ($i=0; $i < count($request->duplikat); $i++) { 
                    $pengaduan = Pengaduan::find($request->duplikat[$i]);
                    $pengaduan->update([
                        'duplikat_id'=> $duplikate->id
                    ]);
                };
            Session::flash("flash_notification", [
                    "level"=>"success",
                    "message"=>"Berhasil menggabungkan pengaduan"
                ]);
            }*/

            
            if (isset($request->duplicate_id)) {
                for ($i=0; $i < count($request->duplikat); $i++) { 
                    $duplikat = Duplikat::find($request->duplicate_id);
                    $duplikat->pengaduans()->attach(Pengaduan::find($request->duplikat[$i]));
                };

                Session::flash("flash_notification", [
                    "level"=>"success",
                    "message"=>"Berhasil menggabungkan pengaduan"
                ]);                
            } else {

                $lokasi = Pengaduan::find($request->duplikat[0])->lokasi_id;

                $duplikat = Duplikat::create([
                    'deskripsi' => $request->deskripsi,
                    'lokasi_id' => $lokasi
                ]) ;

                for ($i=0; $i < count($request->duplikat); $i++) { 
                    $duplikat->pengaduans()->attach(Pengaduan::find($request->duplikat[$i]));
                };

                Session::flash("flash_notification", [
                    "level"=>"success",
                    "message"=>"Berhasil menggabungkan pengaduan"
                ]);

            }


            return redirect()->route('pengaduan.index');
        }

       public function duplikasi($id)
       {
        $duplikat = Duplikat::find($id);
        //dd($duplikat);
        return view('pengaduan.duplikats', compact('duplikat'));
       }

       public function nilai(Request $request, $id)
       {
           dd($request->all());
       }

       public function tanganin($id){
        $pengaduan = Duplikat::findOrFail($id);
            return view('pengaduan.tangani', compact('pengaduan'));
       }

        public function tangani(Request $request, $pengaduans)
        {
            $pengaduan = Duplikat::findOrFail($pengaduans);
            $penanganan = Penanganan::create(array_merge($request->except('lampiran'),[
                'user_id' => Auth::id(),
                'duplikat_id' => $pengaduans,
                'lampiran' =>$request->lampiran
            ]));
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
        $pengaduan = Pengaduan::find($id);
        /*$pengadu = $pengaduan->penanganans->pengajuans->find($id);
        $penga = $pengadu->penyelesaians->find($id);
        */return view('pengaduan.show', compact('pengaduan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('pengaduan.edit')->with(compact('pengaduan'));
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
            'lokasi_id' => 'required',
            'kategori_id' => 'required',  
            'foto' => 'image|max:2048',
            'deskripsi' => 'required',
        ]);

        $pengaduan = Pengaduan::find($id);
        
        if ($request->keamanan == null) {
            $request->merge(['keamanan' => 0]);
        }

        if ($request->kerugian == null) {
            $request->merge(['kerugian' => 0]);
        }        

        $pengaduan->update($request->all());

        if ($request->hasFile('foto')) {
        // menambil cover yang diupload berikut ekstensinya
        $filename = null;
        $uploaded_foto = $request->file('foto');
        $extension = $uploaded_foto->getClientOriginalExtension();
        // membuat nama file random dengan extension
        $filename = md5(time()) . '.' . $extension;
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        // memindahkan file ke folder public/img
        $uploaded_foto->move($destinationPath, $filename);
        // hapus cover lama, jika ada
        if ($pengaduan->foto) {
        $old_foto = $pengaduan->foto;

        $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
        . DIRECTORY_SEPARATOR . $pengaduan->foto;
        try {
        File::delete($filepath);
        } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
        }
        }
        // ganti field cover dengan cover yang baru

        $pengaduan->foto = $filename;
        $pengaduan->save();
        }

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan pengaduan"
        ]);
        return redirect()->route('pengaduan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Pengaduan berhasil dihapus"
        ]);
        return redirect()->route('pengaduan.index');

    }

    public function hapusgabungan($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->duplikats()->detach(Duplikat::find($id));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Pengaduan berhasil dihapus"
        ]);
        return redirect()->route('pengaduan.index');

    }
}
