<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
class LoginController extends Controller
{
 	use AuthenticatesUsers;
    public $maxAttempts = 4;
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

    protected function authenticated(Request $request, $user)
    {
        $rols = $user->rols()->get()->where('State',"Active");

        if($rols->isNotEmpty()){
            $user->setSession($rols->toArray());
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
            'Error contraseña y/o usuario incorrectos'
            ]);
    }
    public function username()
    {
        return 'name';
    }
}
