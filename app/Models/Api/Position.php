<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = "position";
    protected $fillable = ['nama_posisi'];

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    public function hakAkses(){
        return $this->belongsToMany('App\Models\Api\HakAkses');
    }
}
