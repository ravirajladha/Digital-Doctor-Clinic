<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'fname','lname','age','blood_group','gender','email','address','city','state','country','zipcode',  'alt_mobile'];
}
