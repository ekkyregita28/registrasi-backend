<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    use HasFactory;

    protected $table = "daerah";
    protected $fillable = [
        'nama_daerah',
        'provinsi_id',
    ];

    public function provinsi(){
        return $this->belongsTo('App\Models\Api\Provinsi');
    }

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    public function member(){
        return $this->hasMany('App\Models\Api\Member');
    }
}
