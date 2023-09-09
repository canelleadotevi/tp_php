<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use SplSubject;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function registerStore(Request $request)
    {
        $data = $request->all();
        $request->validate([
            "firstname" => "required|min:2",
            "lastname" => "required|min:2",
            "email" => array(
                "required",
                "unique:users",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/"
            ),
            "password" => array(
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",

                "confirmed:password_confirmation"
            )

        ]);


        $save = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'birthday' => $data['birthday'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);



        $url = URL::temporarySignedRoute(
            'verifyEmail',
            now()->addMinutes(20),
            ['email' => $data['email']]
        );
        Mail::send('mail', ['url' => $url, 'name' => $data['firstname']], function ($message) use ($data) {

            $config = config('mail');
            $name = $data['firstname'] . '' . $data['firstname'];
            $message->subject('Registration verified')
                ->from($config['from']['address'])
                ->to($data['email'], $data['firstname'] . '' . $data['lastname']);
        });
        return redirect()->back()->with('msg', 'Veuillez consulter votre boîte mail pour activer votre compte');
    }


    public function verify(Request $request, $email)
    {

        $user = User::where("email", $email)->first();

        if (!$user) {
            abort(404);
        }

        if (!$request->hasValidSignature()) {
            abort(404);
        }

        $user->update([
            'verify_at' => now(),
            "email_verified" => true
        ]);
        return redirect()->route("login")->with("success", "compte activé avec succès");
    }


    public function forgotPassword()
    {
        return view('forgotPassword');
    }

    public function formPasswordStore(Request $request)
    {

        $data = $request->all();
        $validateEmail = $request->validate([
            'email' => array([
                'required',
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
            ])
        ]);
        $userEmail = User::where('email', $request->email)->first();

        if (!$userEmail) {
            return redirect()->back()->with("error", "l'email saisi est invalid");
        } else {
            $url = URL::temporarySignedRoute(
                'urlRoot',
                now()->addMinutes(30),
                ['email' => $data['email']],
            );
            Mail::send('resetPasswordMail', ['url' => $url, 'name' => $userEmail['firstname'] . ' ' . $userEmail['lastname']], function ($message) use ($userEmail) {
                $config = config('mail');
                $name = $userEmail['firstname'] . ' ' . $userEmail['lastname'];
                $message->Subject('Réinitialisation de votre mot de passe')
                    ->from($config['from']['address'], "Ecole 229")
                    ->to($userEmail['email'], $name);
            });
            return redirect()->back()->with('verifyEmail','Consultez votre boîte mail pour finaliser la réinitialisation de votre mot de passe!');
        }
    }

    public function urlRoot(Request $request, $email)
    {
        $user = User::where("email", $email)->first();

        if (!$user) {
            abort(404);
        }

        if (!$request->hasValidSignature()) {
            abort(404);
        }
        return view("reinitialize",compact('email'));
    }

    public function  reinitializeStore(Request $request)
    {


       /*  $user  = User::where('email', $request->email)->first(); */
        $data =$request->all();
      
        $validate = $request->validate([
                "newpassword" => array(
                    "required",
                    "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",
                ),
                "confirmed:newpassword_confirmation"
                ]);
        $update = User::where('email',$request->email)->update([

                'password' => Hash::make($data['newpassword'])

            ] );

        return redirect()->route('login')->with('passwordReset', ' votre mot de passe a été réinitialisé ');
    }


    public function authentification(Request $request)
    {
        // $data =$request->all();  attempt faire un checking vers la base de données

        $user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'email_verified' => true,

        ]);

        //dd($user);

        if ($user) {

            return redirect()->route('index');
        } else {
            return redirect()->back()->with('error', 'combinaison email/password');
        }
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
