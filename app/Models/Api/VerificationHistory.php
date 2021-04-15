<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationHistory extends Model
{
    use HasFactory;

    protected $table = "verification_history";
    protected $fillable = [
        'status',
        'description',
        'registration_id',
    ];

    public function registration(){
        return $this->belongsTo('App\Models\Api\Registration');
    }
}
