<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Description extends Model
{

    //use HasFactory;
    protected $fillable =['lastname','firstname','birthday','hobbies','speciality','bio','profil'];
    protected $table ='studentinformation';
    use SoftDeletes;

}
