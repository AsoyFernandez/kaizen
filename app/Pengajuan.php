<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
	protected $fillable = [ 'penanganan_id','foto','deskripsi'];
    
    public function penanganans()
	{
		return $this->belongsTo('App\Penanganan', 'penanganan_id');
	}

	public function status()
	{
		return $this->hasOne('App\Status');
	}

	public static function semuaPengajuanTanpaStatus()
	{
		$return = [];
		$duplikats = Pengajuan::orderBy('created_at', 'desc')->get();
		foreach ($duplikats as $duplikat) {
			if (is_null($duplikat->status)) {
				array_push($return, $duplikat);
			}
		}
		return collect($return);
	}
}
