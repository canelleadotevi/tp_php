<?php

namespace App\Http\Controllers;


use App\Models\Cours;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Models\Cours_Enseignant;































































































































































































































































class Cours_EnseignantController extends Controller
{
    //

    
    public function createAffectation(Request $request){

        $cours = $request->cours_id;
        //dd($cours);

        $data = $request->validate([
            'cours_id' => 'required',
        ]);
        
        foreach($cours as $cour){

            Cours_Enseignant::updateOrCreate([
                "cours_id" => $cour,
                "enseignants_id" => $request->enseignants_id,
            ]);
            
        }
        //return view('affectCourse',compact('affect'));
        
        return redirect()->back()->with('affectCourse','Affectation effectuée avec succès!');

    }

    public function deleteCourseAffect($cours_id,$enseignants_id){

       // $coursId = Cours_Enseignant::find($cours_id);
        
       // dd($coursId);

        //$enseignantId = Cours_Enseignant::find($enseignants_id);

        $delete = Cours_Enseignant::where('cours_id',$cours_id)
                                    ->where('enseignants_id',$enseignants_id)
                                    ->delete();
     
        
    }
}
