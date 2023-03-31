<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
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
}
