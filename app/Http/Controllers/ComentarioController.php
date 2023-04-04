<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //

    public function store(Request $request, User $user, Post $post){

        $data = $this->validate($request,[
            'comentario' => 'required|string|max:255|min:3|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        
        $request->user()->comentarios()->create([
            'comentario' => $data['comentario'],
            'post_id' => $post->id
        ]);

        return redirect()->back()->with(['mensaje' => 'Comentario agregado correctamente']);
    }
}
