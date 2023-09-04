<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours_Enseignant extends Model
{
    
   // use HasFactory;

   protected  $fillable =['cours_id','enseignants_id'];

   protected  $table = 'cours_enseignant';

   public function cours(){

      return $this->belongsTo(Cours::class, "cours_id","id");

  }

  public function enseignant(){

   return $this->belongsTo(Enseignant::class, "enseignants_id","id");
   
}

}
