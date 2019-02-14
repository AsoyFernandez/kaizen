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
}
