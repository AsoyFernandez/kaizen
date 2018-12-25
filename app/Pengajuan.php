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
		return $this->hasMany('App\Status');
	}
}
