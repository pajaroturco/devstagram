<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function __invoke()
    {

        $aIds = auth()->user()->followings->pluck('id')->toArray();

        $posts = Post::whereIn('user_id', $aIds)->latest()->paginate(env('PAGINACION',10));


        return view('home',[
            'posts' => $posts,
        ]);
    }
}
