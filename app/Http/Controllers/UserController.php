<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function registerStore(Request $request){
        $data =$request->all();
        $request->validate([
            "firstname"=>"required|min:2",
            "lastname"=>"required|min:2",
            "email"=> array(
                "required",
                "unique:users",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/"
            ),
            "password"=>array(
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",
              
                "confirmed:password_confirmation"
            )

        ]);
        $save=User::create([
            'firstname'=>$data['firstname'],
            'lastname'=>$data['lastname'],
            'birthday'=>$data['birthday'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);

        $url=URL::temporarySignedRoute(
            'verifyEmail', now()->addMinutes(20),['email'=>$data['email']]
        );
        Mail::send('mail',['url'=>$url,'name'=>$data['firstname']],function($message ) use ($data){

            $config = config('mail');
            $name = $data['firstname'].''.$data['firstname'];
            $message->subject('Registration verified')
                    ->from ($config['from']['address'])
                    ->to ($data['email'],$data['firstname'].''.$data['lastname']);
          });

            
    }
    public function verify(Request $request, $email){

        $user = User::where("email",$email)->first();

        if(!$user){
            abort(404);
        }

        if(!$request->hasValidSignature()){
            abort(404);
        }

        $user->update([
            'verify_at'=>now(),
            "email_verified"=>true
        ]);
        return redirect()->route("login")->with("success","compte activé avec succès");

    }
}