<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [ 'user_id', 'lokasi_id', 'kategori_id', 'foto', 'keamanan', 'kerugian', 'deskripsi'];

    public function users()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function tempats()
	{
		return $this->belongsTo('App\Tempat', 'lokasi_id');
	}

	public function kategoris()
	{
		return $this->belongsTo('App\Kategori', 'kategori_id');
	}

	public function duplikats()
	{
		return $this->belongsToMany('App\Duplikat');
	}

	
}
