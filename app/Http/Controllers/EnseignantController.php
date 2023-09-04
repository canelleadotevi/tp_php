<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Cours_Enseignant;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    // code pour ajouter un enseignant dans la base de donnée
   

    public function addTeacher($id=Null){
        $enseignant= Enseignant::all();

        $data = Enseignant::find($id);

        return view('addTeacher',compact('id','data','enseignant'));
    }

    public function store(Request $request){
        
        $data=$request->all();

       

        $validateData = $request ->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=> array([
                'required',
                'regex:/^(?=.*[0-9])/',
                
            ]),
            'address'=>'required'
        ]);
        
            $save = Enseignant::create([
                'firstname'=>$data['firstname'],
                'lastname'=>$data['lastname'],
                'phone'=>$data['phone'],
                'address'=>$data['address'],
            ]);

            $teachers = Enseignant::all();

            return redirect()->route('viewTeacher',compact('teachers'))->with('addTeacher','Enseignant ajouté avec succès!');
       
    }


    public function teacherModifyForm($id){


        $data = Enseignant::find($id);

        $enseignant = Enseignant::all();

        return view('formTeacher', compact('id', 'data', 'enseignant'));

    }

    public function teacherUpdateStore (Request $request, $id)
    {

        $data = $request->all();
         
       

        Enseignant::where('id', $id)->update([

            

            "firstname" => $data['firstname'],

            "lastname" => $data['lastname'],

            "phone" => $data['phone'],

            "address" => $data['address'],




        ]);

        return redirect()->route('viewTeacher')->with('updateSuccess','les modifications ont été enregistrés avec succès!');
      
    }

    public function deleteTeacher($id)
    {

        $enseignants = Enseignant::where('id', $id)->delete();
        return redirect()->route('viewTeacher');
    }

    public function affectCourse($id){

        $data =Enseignant::find($id);

        //$courses = Cours_Enseignant::;
        //dd($courses);
        $courses = Cours_Enseignant::where('enseignants_id',$id)->get();
        //dd($courses);
        //$affect = Cours_Enseignant::with('cours','enseignant')->get();

        //dd( $courses[0]->cours_id);

        //$affectCourse = $affect->groupBy(['enseignants_id']);
       
        $courseName =[];
        foreach($courses as $course){

            $courseId = Cours::find($course->cours_id);

            array_push($courseName,$courseId);

        }
        //dd($courseName);


      //dd($affectCourse);

        $enseignant = Enseignant::all();

        $cours = Cours::all();

        return view('affectCourse',compact('id','enseignant','data','cours','courseName'));

    }

   
}