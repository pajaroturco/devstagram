@extends('layouts.app')

@section('titulo','Crear Post')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagen.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="dropzone"
                  class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="md-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input
                        type="text"
                        name="titulo"
                        id="titulo"
                        placeholder="Titulo del post"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{old('titulo')}}"
                    >
                    @error('titulo')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="md-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea
                        name="descripcion"
                        id="descripcion"
                        placeholder="Descripcion del post"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                    >
                        {{old('descripcion')}}
                    </textarea>
                    @error('descripcion')
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
        </div>
    </div>
@endsection
