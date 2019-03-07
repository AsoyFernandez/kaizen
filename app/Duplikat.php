<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Duplikat extends Model
{
    protected $fillable = ['deskripsi', 'lokasi_id', 'nilai_id'];

    public function penilaian()
    {
    	return $this->belongsTo(Penilaian::class, 'nilai_id');
    }

    public function pengaduans()
	{
		return $this->hasMany('App\Pengaduan');
	}

	public function penanganans()
	{
		return $this->hasOne('App\Penanganan');
	}

	public static function duplikatTanpaPenanganan()
	{
		$return = [];
		$duplikats = Duplikat::orderBy('created_at', 'desc')->get();
		$lokasi = Auth::user()->tempats()->pluck('id')->all();
		foreach ($duplikats as $duplikat) {
			if (is_null($duplikat->penanganans)) {
				if (in_array($duplikat->lokasi_id, $lokasi)) {
					array_push($return, $duplikat);
				}
			}
		}
		return collect($return);
	}

	public static function duplikatTanpaPenilaian() {
		$return = [];
		$duplikats = Duplikat::orderBy('created_at', 'desc')->get();
		$lokasi = Auth::user()->tempats->pluck('id')->all();
		foreach ($duplikats as $duplikat) {
			if (in_array($duplikat->lokasi_id, $lokasi)) {
				if (!is_null($duplikat->penanganans) && is_null($duplikat->nilai_id)) {
					array_push($return, $duplikat);
				}
			}
		}
		return collect($return);	
	}

	public static function duplikatDenganPenilaian(){
		$return = [];
		$duplikats = Duplikat::orderBy('created_at', 'desc')->get();
		$lokasi = Auth::user()->areas()->pluck('id')->all();
		foreach ($duplikats as $duplikat) {
			if (in_array($duplikat->lokasi_id, $lokasi)) {
				if (!is_null($duplikat->nilai_id)) {
				array_push($return, $duplikat);
				}
			}
		}
		return collect($return);	
	}


	public static function semuaDuplikatTanpaPenanganan()
	{
		$return = [];
		$duplikats = Duplikat::orderBy('created_at', 'desc')->get();
		foreach ($duplikats as $duplikat) {
			if (is_null($duplikat->penanganans)) {
				array_push($return, $duplikat);
			}
		}
		return collect($return);
	}
	public function tempats()
	{
		return $this->belongsTo('App\Tempat', 'lokasi_id');
	}
}
