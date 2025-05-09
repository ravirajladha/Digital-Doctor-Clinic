<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    
    protected $fillable = ['password'];

    public function authDoc()
    {
        return $this->belongsTo(Auth::class, 'phone', 'phone');
    }
}
