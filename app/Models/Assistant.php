<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{
    public $timestamps = false;

    use HasFactory;

    public function authAssistant(){
        return $this->belongsTo(Auth::class,'mobile','phone');
    }
}
