<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Models\Cours;
use App\Models\Cours_Enseignant;
use App\Models\Cours_Studentinformation;
use App\Models\Course;
use App\Models\Enseignant;
use App\Models\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Descriptor\Descriptor;

class ListController extends Controller
{
    public function index()

    {

        $user = Auth::user();

        $nom = $user ? $user->firstname : "";

        $prenom = $user ? $user->lastname : "";

        $email = $user ? $user->email : "";

        $studentsList = Description::paginate(4);

        return view('students.student-list', compact('studentsList', 'nom', 'prenom', 'email'));
    }

    public function show($id = null)
    {

        $studentsList = Description::all();


        /*    $data = Description::where('id',$id)->first(); */
        /* je cherche l'index et en ensuite je le récupère. */

        $data = Description::find($id);
        $etudiant = Description::all();



        return view('students.profil-details', compact('id', 'etudiant', 'data'));
    }

    public function showList()
    {
        return view('students.profil-details');
    }


    public function store(Request $request)
    {
        $data = $request->all();


        if ($data['profil']) {
            $profil = $data['profil'];
            $path = $profil->store('avatar');
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
        return view('forms.modify-form', compact('id', 'data', 'etudiant'));
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

        if ($data['profil']) {
            $profil = $data['profil'];
            $path = $profil->store('avatar');
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

        if ($etudiant->status) {
            $etudiant->status = false;
        } else {
            $etudiant->status = true;
        }
        $etudiant->save();
        

        return redirect()->route('index')->with("Status", "status changé");
    }

    public function management()
    {

        $user = Auth::user();

        $nom = $user ? $user->firstname : "";

        $prenom = $user ? $user->lastname : "";

        $courses = Cours::paginate(3);



        return view('managementOfCourse', compact('courses', 'nom', 'prenom'));
    }

    public function teacher()
    {

        $teachers = Enseignant::paginate(2);
        return view('enseignant_list', compact('teachers'));
    }

    public function studentsCourse()

    {
        $cours = Cours::all();

        $students = Description::all();

        $affect = Description::with('etudiant')->has('etudiant')->get();
       
        return view('studentCourse', compact('cours', 'students','affect'));
    }
};
