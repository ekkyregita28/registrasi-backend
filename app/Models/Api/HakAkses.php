<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    use HasFactory;

    protected $table = "hak_akses";
    protected $fillable = [
        'nama_hak_akses',
    ];

    public function position(){
        return $this->belongsToMany('App\Mmodels\Api\Position');
    }
}
