<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('perfil.edit');
    }

    public function update(Request $request)
    {
        $request->merge(['username' => Str::slug($request->username)]);

        $this->validate($request,[
            'username' => ['required','min:5','max:20','unique:users,username,'.auth()->user()->id,
            'not_in:twitter,facebook,instagram,edit,login,logout,registro,posts,comentarios,imagen,likes,editar-perfil'],
        ]);

        if($request->imagen){

            $oImagen = $request->file('imagen');
            $sNombre = Str::uuid(). '.' . $oImagen->getClientOriginalExtension();
            $oImagenServidor = Image::make($oImagen)->fit(1000, 1000);

            $oImagenServidor->save(public_path('perfiles/' . $sNombre));
        }

        $oUsuario = User::findOrFail(auth()->user()->id);

        $oUsuario->update([
            'username' => $request->username,
            'imagen' => $sNombre ?? auth()->user()->imagen,
        ]);

        return redirect()->route('posts.index',['user' => $oUsuario->username]);
    }
}
