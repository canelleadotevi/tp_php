<?php

namespace App\Http\Controllers;


use App\Models\Cours_Enseignant;
use Illuminate\Http\Request;

class Cours_EnseignantController extends Controller
{
    //

    
    public function createAffectation(Request $request,$id){

        $cours = $request->cours_id;
        //dd($cours);

        $data = $request->validate([
            'cours_id' => 'required',
        ]);
        
        foreach($cours as $cour){
            Cours_Enseignant::create([
                "cours_id" => $cour,
                "enseignants_id" => $request->enseignants_id,
            ]);
        }
        return redirect()->back()->with('affectCourse','Affectation effectuée avec succès!');

    }
}
