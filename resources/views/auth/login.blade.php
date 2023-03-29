@extends('layouts.app')

@section('titulo','Ingresa a Devstagram')

@section('contenido')

<div class="md:flex md:justify-center  md:gap-10 md:items-center">
    <div class="md:w-6/12 pd-5">
        <img src="{{asset("img/login.jpg")}}" alt="Imagen login de usuarios">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{route('login.store')}}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="email" class="md-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input 
                type="email" 
                name="email" 
                id="email" 
                placeholder="Tu email" 
                class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                value="{{old('email')}}"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="md-2 block uppercase text-gray-500 font-bold">
                    Password
                </label>
                <input 
                type="password" 
                name="password" 
                id="password" 
                placeholder="Tu password" 
                class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <input type="submit" 
            value="Registrarse" 
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>

@endsection