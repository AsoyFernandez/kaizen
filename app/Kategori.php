<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama'];

    public function pengaduans()
	{
		return $this->hasMany('App\Pengaduan');
	}
}
