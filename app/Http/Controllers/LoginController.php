<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\PasswordRestore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
class LoginController extends Controller
{
 	use AuthenticatesUsers;
    protected $maxAttempts = 2;
    public $decayMinutes = 1;
    protected $redirectTo = '/administration/home/dashboard';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     public function index()
    {
        return view('Login.Login');
    }
    public function restore(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if($user!=null)
        {
            $user->PasswordRestore = "Change";
            $user->save();
            $url=  URL::temporarySignedRoute(
                'restorepass', 
                now()->addMinutes(5), 
                ['user' => auth()->user(),'model'=>$user->id]
            );
            $info=[
                "Url"=>$url,
                "Name"=> $user->Person()->Names." ". $user->Person()->LastNames,
            ];
            $ContactFormmail = new PasswordRestore($info);
            $ContactFormmail->subject = "Iger Quetzaltenango";
            Mail::to($request->email)->send($ContactFormmail);
        }
        else{
            return response()->json(['Error' => "No se ha encontrado ningun usuario con ese correo electronico, por favor ponte en contacto con secretaria."], 500);
        }
        return response()->json(['Message' =>"Se ha enviado un correo con el link de restauración de la contraseña."]);
    }
    public function restorepass(Request $request, $userid)
    {
        if (! $request->hasValidSignature()) {
            abort(403);
        }
        return view('Login/Restore',compact('userid'));
    }   
    public function ChangePassword(Request $request)
    {
        dd($request->data);
    }
    protected function authenticated(Request $request, $user)
    {
        
        $rols = $user->rols()->get()->where('State',"Active");
        if($rols->isNotEmpty()){
            $user->setSession($rols->toArray());
            $rol =$rols->toArray();
            $rol=$rol[0]['Name'];
            if($rol=="Estudiante")
            {
                return redirect('student/home/dashboard');
            }
            elseif($rol=="Voluntario")
            {
                return redirect('teacher/home/dashboard');
            }
            $user->PasswordRestore = "";
            $user->save();
        }
        else
        {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('login')->withErrors(['error' => 'Este usuario no tiene activo ningun rol...']);
        }
    }
    
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
           'Error contraseña y/o usuario incorrectos',
            ]);
    }
    public function username()
    {
        return 'name';
    }
}
