<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'auths'; // Specify the correct table name for your model

    protected $fillable = ['status','name','email','password'];
}
