@extends('layouts.app')

@section('titulo','Perfil: '.auth()->user()->username)

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('perfil.update')}}" class="mt-10 md:mt-0" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="md-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Tu username"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{old('username',auth()->user()->username)}}"
                    >
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="md-2 block uppercase text-gray-500 font-bold">
                        Imagen de perfil
                    </label>
                    <input
                    type="file"
                    name="imagen"
                    id="imagen"
                    class="border p-3 w-full rounded-lg"
                    value=""
                    accept="image/*"
                    >
                </div>

                <input type="submit"
                    value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
                    w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection