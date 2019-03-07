<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [ 'status_id','nilai','keterangan'];

    public function status()
	{
		return $this->belongsTo('App\Status', 'status_id');
	}

	public function pengaduans()
	{
		return $this->hasOne('App\Duplikat');
	}
}
