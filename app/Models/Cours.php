<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cours extends Model
{
    //use HasFactory;
    protected $fillable =['name','coef','timetable','categories_id'];
    protected $table = 'cours';

    use SoftDeletes;


    public function category(){

        return $this->belongsTo(Category::class, "categories_id","id");

    }

    public function enseignant(){
        return $this->belongsToMany(Enseignant::class);
    }
}
