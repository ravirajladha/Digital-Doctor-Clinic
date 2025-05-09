<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id','assistant_id','doctor_id','status'];

    public function patient()
    {
        return $this->belongsTo(Auth::class, 'patient_id');
    }

    public function assistant()
    {
        return $this->belongsTo(Auth::class, 'assistant_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Auth::class, 'doctor_id');
    }
}
