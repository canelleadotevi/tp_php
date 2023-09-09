<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    //
    public function studentMarkStore(Request $request){
        $data =$request->all();
        //dd($data);
        $validateData =$request->validate([
            'note'=>'required|max:20',
            'type'=>'required',
        ]);
        
        $save = Mark::updateOrCreate([
            'note'=>$data['note'],
            'type'=>$data['type'],
            'cours_id'=>$request->cours_id,
            'studentinformation_id'=>$request->studentinformation_id,
        ]);

        

        //return view('mark_student',compact('data'));
        return redirect()->back()->with('Success','Enregistrement effectuée avec succès');
    }
}
