<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'auth_type',
        'to_auth_id',
        'notification_type',
        'notification',
        'from_auth_id',
        'from_auth_id_assistant',
        'from_auth_id_patient',
        'status',
        'doctor_id'
    ];

    public function notiPatient(){
        return $this->belongsTo(Patient::class,'from_auth_id_patient','patient_id' );
    }
}
