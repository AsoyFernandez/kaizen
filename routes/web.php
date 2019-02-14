<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('perusahaan', 'PerusahaanController');
	Route::resource('area', 'AreaController');
	Route::resource('lokasi', 'LokasiController');
	Route::get('/pengaduan/pengaduanku',[
	    'as' => 'pengaduan.pengaduanku',
		'uses' => 'PengaduanController@pengaduanku'
	]);

	Route::get('/pengaduan/unduh/{id}',[
	    'as' => 'pengaduan.unduh',
		'uses' => 'PengaduanController@unduh'
	]);
	Route::get('/pengaduan/pengaduan/full',[
	    'as' => 'pengaduan.semua_pengaduan',
		'uses' => 'PengaduanController@semuapengaduan'
	]);

	Route::resource('pengaduan', 'PengaduanController');
	Route::delete('/pengaduans/gabungkan/hapus/{id}',[
			'as' => 'pengaduan.gabungkan.hapus',
			'uses' => 'PengaduanController@hapusgabungan'
		]);
	
	Route::get('/lokasi/{id}/qrcode',[
			'as' => 'lokasi.qrcode',
			'uses' => 'QRCodeController@lokasi'
		]);
	Route::resource('member', 'MembersController');
	Route::resource('pengaduan', 'PengaduanController');
	Route::get('/pengaduans/{pengaduans}/tangani',[
			'as' => 'pengaduan.tanganin',
			'uses' => 'PengaduanController@tanganin'
		]);
	Route::post('/pengaduans/gabungkan',[
			'as' => 'pengaduan.gabungkan',
			'uses' => 'PengaduanController@merge'
		]);

	Route::post('/pengaduans/merges',[
			'as' => 'pengaduan.merges',
			'uses' => 'PengaduanController@merges'
		]);
	Route::get('/pengaduans/{id}/duplikat',[
			'as' => 'duplikat.index',
			'uses' => 'PengaduanController@duplikasi'
		]);

	Route::get('/pengaduans/{id}/deskripsi',[
			'as' => 'pengaduan.deskripsi',
			'uses' => 'PengaduanController@deskripsi'
		]);

	Route::post('/pengaduans/{pengaduans}/tangani',[
			'as' => 'pengaduan.tangani',
			'uses' => 'PengaduanController@tangani'
		]);

	Route::post('/pengaduan/{id}/nilai',[
			'as' => 'pengaduan.nilai',
			'uses' => 'PengaduanController@nilai'
		]);
	
	Route::get('/penanganan/semua_penanganan',[
			'as' => 'semua.penanganan',
			'uses' => 'PenangananController@semua_penanganan'
		]);
	
	Route::resource('penanganan', 'PenangananController');

	

	Route::get('/lampiran/{id}/unduh',[
			'as' => 'lampiran.unduh',
			'uses' => 'PenangananController@unduh'
		]);

	Route::get('/penanganan/{id}/post_id',[
			'as' => 'penanganan.post_id',
			'uses' => 'PenangananController@post_id'
		]);

	Route::get('/pengajuan/semua_pengajuan',[
			'as' => 'pengajuan.semua',
			'uses' => 'PengajuanController@semua_pengajuan'
		]);
	Route::resource('pengajuan', 'PengajuanController');
	Route::resource('status', 'StatusController');

	Route::post('/pengajuan/{id}/tolak',[
			'as' => 'pengajuan.tolak',
			'uses' => 'PengajuanController@tolak'
		]);
	Route::post('/pengajuan/{id}/terima',[
			'as' => 'pengajuan.terima',
			'uses' => 'PengajuanController@terima'
		]);
	
	Route::get('/penilaian/peringkat',[
			'as' => 'penilaian.peringkat',
			'uses' => 'PenilaianController@peringkat'
		]);
	
	Route::resource('penilaian', 'PenilaianController');

});
