<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class New_clinic_reg extends Model
{
    use HasFactory;

    public function authRepresentative(){
        return $this->belongsTo(Auth::class,'mobile_number','phone');
    }
}
