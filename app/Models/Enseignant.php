<?php

namespace App\Models;

use App\Models\Cours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = ['firstname','lastname','phone','address'];

    protected $table = 'enseignants';

    use SoftDeletes;

    public function cours(){
        return $this->belongsToMany(Cours::class);
    }
}
