<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $fillable = [ 'pengajuan_id','status','keterangan'];

	public function pengajuans()
	{
		return $this->belongsTo('App\Pengajuan', 'pengajuan_id');
	}

	public function penilaian()
    {
        return $this->hasOne('App\Penilaian');
    }    
}
