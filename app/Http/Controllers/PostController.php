<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(User $user){

        return view('dashboard', [
            'user' => $user,
            'posts' => $user->posts()->paginate(env('PAGINACION',10))
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
    ]);

        $request->user()->posts()->create($data);

        return redirect()->route('posts.index', ['user' => Auth::user()]);
    }

    public function show(User $user, Post $post){
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function delete(Post $post){

        $this->authorize('delete', $post);

        $post->delete();

        // eliminar images
        $imagenPath = public_path('uploads/'.$post->imagen);

        if(file_exists($imagenPath)){
            unlink($imagenPath);
        }

        return redirect()->route('posts.index', ['user' => Auth::user()]);
    }
}
