<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'consultation_id',
        'name',
        'medicines',
        'food',
        'quantity',
        'days',
        'morning',
        'afternoon',
        'evening',
        'night',
        'created_by',
        'status',
        'remark',
        'from_doctor',
        'to_doctor',
        'hospital_name',
        'referral_reason',
        'test_name',
        'test_description',
        'test_created',
        'timing'
    ];
    public function medicines()
    {
        return $this->hasMany(Medicine::class,'id','medicines');
    }
}
