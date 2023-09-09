<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $table = 'marks';
    protected $fillable = ['note','type','cours_id','studentinformation_id'];

    //protected $with =['notes'];
    


    public function etudiant(){

    return $this->belongsTo(Description::class,'studentinformation_id','id');
  }

  
 

 

 
}
