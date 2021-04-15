<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";
    protected $fillable = [
        'nama_admin',
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
        'email',
        'position_id',
        'daerah_id',
        'provinsi_id'
    ];

    public function position(){
        return $this->hasOne('App\Models\Api\Position');
    }

    public function daerah(){
        return $this->hasOne('App\Models\Api\Daerah');
    }

    public function provinsi(){
        return $this->hasOne('App\Models\Api\Provinsi');
    }
}
