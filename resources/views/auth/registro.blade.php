@extends('layouts.app')

@section('titulo','Registrate en Devstagram')

@section('contenido')

    <div class="md:flex md:justify-center  md:gap-10 md:items-center">
        <div class="md:w-6/12 pd-5">
            <img src="{{asset("img/registrar.jpg")}}" alt="Imagen registro de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="">
                <div class="mb-5">
                    <label for="name" class="md-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input type="text" name="name" id="name" placeholder="Tu nombre" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="username" class="md-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input type="text" name="username" id="username" placeholder="Tu username" class="border p-3 w-full rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="email" class="md-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input type="email" name="email" id="email" placeholder="Tu email" class="border p-3 w-full rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="password" class="md-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="Tu password" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="md-2 block uppercase text-gray-500 font-bold">
                        Confirma tu password
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirma tu password" class="border p-3 w-full rounded-lg">
                </div>

                <input type="submit" 
                value="Registrarse" 
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
@endsection