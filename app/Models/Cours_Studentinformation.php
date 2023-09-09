<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours_Studentinformation extends Model
{
    use HasFactory;
    protected $fillable = ['cours_id', 'studentinformation_id'];
    protected $table = 'cours_studentinformation';



   // protected $with = ['student'];


    public function affect()
    {

        return $this->belongsTo(Cours::class, "cours_id", "id");
    }
}
