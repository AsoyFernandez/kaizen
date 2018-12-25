<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Penanganan extends Model
{
    protected $fillable = ['user_id', 'duplikat_id'];
 
    public function users()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function duplikats()
	{
		return $this->belongsTo('App\Duplikat', 'duplikat_id');
	}

	public function pengajuans()
	{
		return $this->hasMany('App\Pengajuan');
	}

}
