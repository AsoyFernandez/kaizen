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
		return $this->belongsToMany('App\Pengaduan');
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

	public function tempats()
	{
		return $this->belongsTo('App\Tempat', 'lokasi_id');
	}
}
