<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngo_data extends Model
{
    use HasFactory;
    public function authNgo(){
        return $this->belongsTo(Auth::class,'mobile','phone');
    }
}
