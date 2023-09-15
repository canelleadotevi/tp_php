<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Cours;
use App\Models\Enseignant;
use App\Models\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cours_Studentinformation;

class Cours_StudentinformationController extends Controller
{
    //
    public function courseToStudent (Request $request){

        $courses = $request->cours_id;

        $data =$request->all();
         
        $validateData =$request->validate([

            'studentinformation_id'=>'required',

            'cours_id'=>'required'
        ]);

        foreach($courses as $cour){


            $save = Cours_Studentinformation::updateOrCreate([


                'cours_id'=>$cour,

                'studentinformation_id'=>$data['studentinformation_id'],

            ]);
            return redirect()->back()->with('affectSuccess','Affectation réussie!!!');

        }


    }

    public function studentMarkStore($studentinformation_id, $cours_id){
        
                   
        $aff = Cours::find($cours_id);
        

        $student = Description::find($studentinformation_id);

        
        $notesetu =Mark::where('studentinformation_id',$studentinformation_id)
                        ->where('cours_id',$cours_id)->get();

     
        //dd($notesetu);
/* 
       $allNote = Description::join('marks','marks.studentinformation_id','studentinformation.id')
        ->join('cours','cours.id','marks.cours_id')
        ->where('studentinformation.id',$studentinformation_id)
        ->where('marks.type','Devoir')
        ->select(DB::raw ('avg (marks.note) as moyenne '),'cours.name')
        ->groupBy('cours.name')->get()->toArray();
         */
        
         
        return view('mark_student',compact('student','aff','notesetu','allNote'));
    }

   
}
