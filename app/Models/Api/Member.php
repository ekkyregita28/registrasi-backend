<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = "member";
    protected $fillable = [
        'nomor_keanggotaan',
        'nama_member',
        'jenis_kelamin',
        'foto_profil',
        'ukuran_baju',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_nikah',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'kode_pos',
        'daerah_id',
        'provinsi_id',
        'no_telp',
        'email',
        'hobby',
        'sekolah',
        'no_ktp',
        'no_sim',
        'scan_sim',
        'scan_ktp',
        'scan_stnk',
        'scan_surat_pajak',
        'foto_kendaraan',
        'pekerjaan',
        'nama_perusahaan',
        'alamat_perusahaan',
        'kota_perusahaan',
        'kode_pos_perusahaan',
        'registration_id',
        'status',
        'tahap',
    ];

    public function registration(){
        return $this->hasOne('App\Models\Api\Registration');
    }

    public function daerah(){
        return $this->belongsTo('App\Models\Api\Daerah');
    }

    public function provinsi(){
        return $this->belongsTo('App\Models\Api\Provinsi');
    }
}
