<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = "registration";

    public function member(){
        return $this->belongsTo('App\Models\Api\Member');
    }

    public function verifHistory(){
        return $this->hasMany('App\Models\Api\VerificationHistory');
    }
}
