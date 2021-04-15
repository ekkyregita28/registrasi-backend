<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = "provinsi";
    protected $fillable = ['nama_provinsi'];

    public function daerah(){
        return $this->hasMany('App\Models\Api\Daerah');
    }

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    public function member(){
    	return $this->hasMany('App\Models\Api\Member');
    }
}
