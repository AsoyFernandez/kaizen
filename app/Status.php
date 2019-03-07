<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $fillable = [ 'pengajuan_id','user_id','status','keterangan'];

	public function pengajuans()
	{
		return $this->belongsTo('App\Pengajuan', 'pengajuan_id');
	}

	public function penilaian()
    {
        return $this->hasOne('App\Penilaian');
    }    

    public function users()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public static function semuaStatusTanpaPenilaian()
	{
		$return = [];
		$penilaians = Status::orderBy('created_at', 'desc')->get();
		foreach ($penilaians as $nilai) {
			if ($nilai->first()->status == 1 && is_null($nilai->first()->penilaian)) {
				array_push($return, $penilaians);
			}
		}
		return collect($return);
	}
}
