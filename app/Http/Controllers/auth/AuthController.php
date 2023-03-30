<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('auth.registro');
    }

    public function store(Request $oRequest)
    {
        $oRequest->merge(['username' => Str::slug($oRequest->username)]);

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

        return redirect()->route('posts.index');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $oRequest){

        $oValidator = Validator::make($oRequest->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($oValidator->fails()) {
            return redirect()->back()->withErrors($oValidator->errors())
            ->withInput();
        }

        if (!Auth::attempt(['email' => $oRequest->email, 'password' => $oRequest->password], $oRequest->remember)){
            return redirect()->back()->with(['mensaje' => 'Error al autenticar'])
            ->withInput();
        }

        return redirect()->route('posts.index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
