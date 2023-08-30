<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Description;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Descriptor\Descriptor;

class ListController extends Controller
{
    public function index()
    {
        $studentsList = Description::all();
        return view('student-list', compact('studentsList'));
    }

    public function show($id = null)
    {

        $studentsList = Description::all();


        /*    $data = Description::where('id',$id)->first(); */
        /* je cherche l'index et en ensuiite je le récupère. */

        $data = Description::find($id);
        $etudiant = Description::all();



        return view('profil-details', compact('id', 'etudiant', 'data'));
    }

    public function showList()
    {
        return view('profil-details');
    }


    public function store(Request $request)
    {
        $data = $request->all();


        if($data['profil']){
            $profil=$data['profil'];
            $path=$profil->store('avatar');
         }
    
        $validation = $request->validate([
            "lastname" => 'required',
            "firstname" => 'required',
            "birthday" => 'required',
            "hobbies" => 'required',
            "speciality" => "required",
            "bio" => "required",
            "profil" => "required|mimes:jpg,jpeg,png",
            

        ]);

         
           
        


        $save = Description::create([
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'birthday' => $data['birthday'],
            'hobbies' => $data['hobbies'],
            'speciality' => $data['speciality'],
            'bio' => $data['bio'],
            'profil' => $path,

            
        ]);


        return redirect()->route('index')->with("message", "Etudiant enregistré avec succès!");
    }

    public function supprimer($id)
    {

        $studentinformation = Description::where('id', $id)->delete();
        return redirect()->route('index');
    }



    public function modifyForm($id)
    {

        $data = Description::find($id);
        $etudiant = Description::all();
        return view('modify-form', compact('id', 'data', 'etudiant'));
    }



    public function update(Request $request, $id)
    {

        $data = $request->all();

        $validateData = $request->validate([
            "lastname" => 'required',
            "firstname" => 'required',
            "birthday" => 'required',
            "hobbies" => 'required',
            "speciality" => "required",
            "bio" => "required",
            "profil" => "required|mimes:jpg,jpeg,png",
           
        ]);

        /* $etudiant = Description::find($id); */
         
        if($data['profil']){
            $profil=$data['profil'];
            $path=$profil->store('avatar');
         }

       

       /*  $etudiant->save(); */

        Description::where('id', $id)->update([
            "lastname" => $data['lastname'],
            "firstname" => $data['firstname'],
            "birthday" => $data['birthday'],
            "hobbies" => $data['hobbies'],
            "speciality" => $data['speciality'],
            "bio" => $data['bio'],
            "profil" => $path,
        ]);
        return redirect()->route('index')->with('update', 'les modifications ont été enregistrées avec succès');
    }

 public function lineActivate($id)
    {

      $etudiant = Description::find($id);

      if($etudiant->status){
        $etudiant->status = false;
      }

      else{
        $etudiant->status = true;
      }
      $etudiant->save();

            
       
       
        return redirect()->route('index')->with("Status", "status changé");
        

    }


};
