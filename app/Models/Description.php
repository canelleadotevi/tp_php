<?php

namespace App\Models;

use App\Http\Controllers\Cours_StudentinformationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Description extends Model
{

    //use HasFactory;
    protected $fillable =['lastname','firstname','birthday','hobbies','speciality','bio','profil'];
    protected $table ='studentinformation';
    use SoftDeletes;

    protected $with =['notes'];

    public function cours(){
        return $this->belongsToMany(Cours::class);
    }


    public function etudiant(){

        return $this->hasMany(Cours_Studentinformation::class, "studentinformation_id","id");

    }

    public function affectation(){

        return $this->hasManyThrough(Cours::class,Cours_Studentinformation::class,"studentinformation_id",'id','id','cours_id');

    }



    public function notes(){

        return $this->hasMany(Mark::class,'studentinformation_id','id');

    }


    public function noteEtudiants(){

        return $this->hasManyThrough(Mark::class,Cours::class,'studentinformation_id','id','id','cours_id');

    }


    public function getmoyenneDevoirAttribute($cours_id){
        $moy = 0;
        $sum = 0;
        if($this->notes){
            $devoirs = $this->notes()->where('type','Devoir')
                                    ->where('cours_id',$cours_id)
                                    ->get();
            if(count($devoirs) == 2){
               foreach($devoirs as $element){
                $sum = $sum + $element->note;
                return $sum;
               }
               $moy =$sum /count($devoirs);
            }
        }
        return $moy;
    }


}











































