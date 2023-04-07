@extends('layouts.app')

@section('titulo', $post->titulo)

@section('contenido')
    <div class="container mx-auto md:flex">

        <div class="md:w-1/2">
           <img src="{{asset('uploads').'/'.$post->imagen}}" alt="{{$post->titulo}}">
           <div class="p-3 flex items-center gap-4">
                @auth
                    <livewire:like-post :post="$post"/>
                @endauth
           </div>
           <div>
                <p class="font-bold">{{$post->user->username}}</p>
                <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5">
                    {{$post->descripcion}}
                </p>
           </div>

           @auth
           @if ($post->user_id == auth()->user()->id)
            <form action="{{route('posts.delete',$post)}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Eliminar" class="bg-red-500 hover:bg-red-600 transition-colors cursor-pointer font-bold
                mt-4 p-2 text-white rounded-lg">
            </form> 
           @endif
            
           @endauth
           
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario.</p>

                @if (session('mensaje'))
                    <div class="bg-green-500 p-3 rounded-lg mb-6 text-white text-center">
                        {{session('mensaje')}}
                    </div>
                @endif

                <form action="{{route('comentarios.store',['post' => $post, 'user' => $user])}}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="md-2 block uppercase text-gray-500 font-bold">
                            
                        </label>
                        <textarea
                            name="comentario"
                            id="comentario"
                            placeholder="Comentario del post"
                            class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"
                        >{{old('comentario')}}</textarea>
                        @error('comentario')
                        <p class="text-red-500 text-xs mt-2">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <input type="submit"
                       value="Publicar"
                       class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
                        w-full p-3 text-white rounded-lg">
                </form> 
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count() == 0)
                        <p class="text-center text-gray-500">No hay comentarios</p>
                    @else
                        @foreach ($post->comentarios as $comentario)
                            <div class="mb-5 p-5 border-gray-300 border-b">
                                <a href="{{route('posts.index',['user' => $comentario->user])}}">
                                    <p class="font-bold">{{$comentario->user->username}}</p>
                                </a>
                                <p class="mt-5">
                                    {{$comentario->comentario}}
                                </p>
                                <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
                
            </div>
        </div>
    </div>
@endsection