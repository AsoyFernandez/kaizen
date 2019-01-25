<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'hp', 'jabatan', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    
    public function tempats()
    {
        return $this->belongsToMany('App\Tempat');
    }

    public function duplikats()
    {
        $lokasis = [];
        foreach ($this->tempats as $tempat) {
            foreach ($tempat->child as $area) {
                foreach ($area->duplikats  as $dup) {
                    array_push($lokasis, $dup); 
                }
            }
        }
        return collect($lokasis);
    }

    public function formattedRoles($space = true)
    {
        $batas = $this->roles->count();
        $status = 0;
        $str = '';

        if ($space) {
            foreach ($this->roles as $role) {
                $status++;
                $str = $str . $role->nama;
                if ($batas != $status) {
                    $str = $str . ", ";
                }
            }
        } else {
            foreach ($this->roles as $role) {
                $status++;
                $str = $str . $role->nama;
                if ($batas != $status) {
                    $str = $str . ",";
                }
            }
        }
        return $str;
    }

    public function formattedTempats()
    {
        $batas = $this->tempats->count();
        $status = 0;
        $str = '';
        foreach ($this->tempats as $tempat) {
            $status++;
            $str = $str . $tempat->nama;
            if ($batas != $status) {
                $str = $str . ", ";
            }
        }

        if ($str == '') {
            return 'Bukan Penganggung Jawab';
        }
        return $str;
    }

    public function pengaduans()
    {
        return $this->hasMany('App\Pengaduan');
    }

    public function penanganans()
    {
        return $this->hasMany('App\Penanganan');
    }
}
