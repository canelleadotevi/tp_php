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

        $validation = $request->validate([
            "lastname" => 'required',
            "firstname" => 'required',
            "birthday" => 'required',
            "hobbies" => 'required',
            "speciality" => "required",
            "bio" => "required",
            "profil" => "required|mimes:jpg,jpeg,png",
            

        ]);


       
        if($data["profil"]){
            $photo=$data["profil"];
            $path=$photo->store('etudiant');
        }



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

        $etudiant = Description::find($id);
         
           if ($request->hasFile(('profil'))) {
            $path = $request->file('profil')->store('etudiant');
            $etudiant->profil=$path; 
        } 
        $etudiant->lastname = $data['lastname'];
        $etudiant->firstname = $data['firstname'];
        $etudiant->birthday = $data['birthday'];
        $etudiant->hobbies = $data['hobbies'];
        $etudiant->speciality = $data['speciality'];
        $etudiant->bio = $data['bio'];
        $etudiant->profil = $data['profil'];

        $etudiant->save();

        Description::where('id', $id)->update($validateData);
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
