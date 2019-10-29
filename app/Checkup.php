<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $fillable = [
        'checkouted_at',
        'weight',
        'height',
        'blood_pressure',
        'glucose_level',
        'ldl',
        'hdl',
        'observation',
        'user_id',
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
}
