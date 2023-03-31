@extends('layouts.app')

@section('titulo', $post->titulo)

@section('contenido')
    <div class="container mx-auto flex">

        <div class="md:w-1/2">
           <img src="{{asset('uploads').'/'.$post->imagen}}" alt="{{$post->titulo}}">
           <div class="p-3">
             <p>0 likes</p>
           </div>
           <div>
                <p class="font-bold">{{$post->user->username}}</p>
                <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5">
                    {{$post->descripcion}}
                </p>
           </div>
        </div>
        <div class="md:w-1/2">
            2
        </div>
    </div>
@endsection