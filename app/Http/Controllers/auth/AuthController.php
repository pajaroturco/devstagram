<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\View\Components\Alert;
use Termwind\Components\Dd;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('auth.registro');
    }

    public function store(Request $oRequest)
    {
        $oValidator = Validator::make($oRequest->all(), [
            'nombre' => 'required|min:5',
            'username' => 'required|min:5|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($oValidator->fails()) {
            return redirect()->back()->withErrors($oValidator->errors())->withInput();
        }

        $oUsuario = User::create([
            'name' => $oRequest->nombre,
            'username' => $oRequest->username,
            'email' => $oRequest->email,
            'password' => Hash::make($oRequest->password)
        ]);

        if ($oUsuario) {
            return redirect()->route('login.index')
            ->withAlert('Usuario registrado correctamente');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $oRequest){

        $oValidator = Validator::make($oRequest->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($oValidator->fails()) {
            return redirect()->back()->withErrors($oValidator->errors())
            ->withInput();
        }

        info($oRequest->email);
        $oUsuario = User::where('email', $oRequest->email)->first();
        dd($oUsuario);

        if (!$oUsuario) {
            Log::warning("usuario incorrecto");
            return redirect()->back()->withErrors(['email' => 'Error al autenticar'])
            ->withInput();
            
        } 

        if (!Hash::check($oRequest->password, $oUsuario->password)) {
            Log::warning("contraseña incorrecta");
            return redirect()->back()->withErrors(['email' => 'Error al autenticar'])
            ->withInput();
            
        }

        $oRequest->session()->put('usuario', $oUsuario);
        return redirect()->route('principal');
    }
}