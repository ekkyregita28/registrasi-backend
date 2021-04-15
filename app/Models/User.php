<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'jenis_kelamin',
        'foto_profil',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'kode_pos',
        'no_telp',
        'position_id',
        'daerah_id',
        'provinsi_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function daerah(){
        return $this->belongsTo('App\Models\Api\Daerah');
    }

    public function provinsi(){
        return $this->belongsTo('App\Models\Api\Provinsi');
    }

    public function position(){
        return $this->belongsTo('App\Models\Api\Position');
    }
}
