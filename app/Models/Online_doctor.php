<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_doctor extends Model
{
    use HasFactory;

    public $table = 'online_doctors';

    public $timestamps = false;
    protected $fillable = ['doctor_id','login_time','online'];
}
