<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [ 'user_id', 'lokasi_id', 'kategori_id', 'foto', 'keamanan', 'kerugian', 'deskripsi', 'duplikat_id'];

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

	public function status()
	{
		$status = 'Belum Ditinjau';
		
		if ($this->duplikats->count() != 0) {
			foreach ($this->duplikats as $element) {
				if (is_null($element->penanganans)) {
					$status = 'Belum Ditangani';
				}
				if (!is_null($element->penanganans)) {
					$status = 'Sedang Ditangani';
				}
			}
		}
		return $status;
	}	
}
