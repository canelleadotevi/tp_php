<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAuthentificate extends Model
{
    //use HasFactory;
   protected $fillable=['firstname','lastname','birthday','password','email','avatar','emailverified','verify_at'];
   protected $table='user';

}
