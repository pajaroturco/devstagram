<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $oRequest){

        $oImagen = $oRequest->file('file');
        $sNombre = Str::uuid(). '.' . $oImagen->getClientOriginalExtension();
        $oImagenServidor = Image::make($oImagen)->fit(1000, 1000);

        $oImagenServidor->save(public_path('uploads/' . $sNombre));

        return response()->json(['imagen' => $sNombre]);
    }
}
