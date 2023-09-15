<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function addCategory(){
       
        return view('addCategory'); 

    }

    

    public function categoryStore(Request $request){

        $data = $request->all();

        $user = Auth::user();


        $validateData = $request->validate([
            'name'=>'required|unique:categories',
        ]);
       
        $categories = Category::all();
        
      
       if($validateData){

        $save = Category::where('id',$user->id)->create([
            'name'=>$data['name'],
        ]);

        return redirect()->route('managementOfCourse')->with('Addsuccess','Nouvelle catégorie créée avec succès');

       }

       
    }
    
    public function addCourse($id = Null){

        $course= Cours::all();

        $data = Cours::find($id);

        $categories = Category::all();

        return view('forms.addCourse',compact('categories','data','course','id'));
    }

    public function courseStore(Request $request){

        
        $cours = Cours::all();

        

        $data =$request->all();

        $validateData = $request->validate([
            'name'=>'required|unique:cours',
            'coef'=> array([
                'required',
                'regex:/^(?=.*[0-9])/',
                
            ]),
            'timetable'=>'required',
            'categories_id'=>'required'
        ]);


        
        $save = Cours::create([
            'name'=>$data['name'],
            'coef'=>$data['coef'],
            'timetable'=>$data['timetable'],
            'categories_id'=>$data['categories_id'],
        ]);

        return redirect()->route('managementOfCourse')->with('addCourse','Nouveau cours ajouté avec succès');
        }
        
        public function courseModifyForm($id){

            $categories =Category::all();

            $data = Cours::find($id);
    
            $enseignant = Cours::all();
    
            return view('forms.addCourse', compact('id', 'data','categories', 'enseignant'));
    
        }
    
        public function courseUpdateStore (Request $request, $id)
        {
    
            $data = $request->all();
             
           
    
            Cours::where('id', $id)->update([
    
                
    
                "name" => $data['name'],
    
                "timetable" => $data['timetable'],
    
                "coef" => $data['coef'],
    
                "categories_id" => $data['categories_id'],
                
    
            ]);
    
            return redirect()->route('managementOfCourse')->with('updateSuccess','les modifications ont été enregistrés avec succès!');
          
        }
    
        public function deleteCourse($id)
        {
    
            $cours = Cours::where('id', $id)->delete();
            return redirect()->route('managementOfCourse');
        }
  
   
}

