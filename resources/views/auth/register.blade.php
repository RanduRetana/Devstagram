@extends('layout.app')

@section('titulo', 'Regístrate en Devstagram')

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Registro">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="/register" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 fontbold">Nombre</label>
                    <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    placeholder="Tu nombre de usuario" 
                    class="border p-3 w-full rounded-lg
                    @error ("name") border-red-500 @enderror"
                    value="{{old("name")}}">

                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
               
                    
                
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 fontbold">Username</label>
                    <input 
                    id="username" 
                    name="username" 
                    type="text" 
                    placeholder="Username" 
                    class="border p-3 w-full rounded-lg
                    @error ("name") border-red-500 @enderror"
                    value="{{old("username")}}">

                    @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 fontbold">E-mail</label>
                    <input 
                    id="email" 
                    name="email" 
                    type="text" 
                    placeholder="E-mail" 
                    class="border p-3 w-full rounded-lg
                    @error ("name") border-red-500 @enderror"
                    value="{{old("email")}}">

                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 fontbold">Password </label>
                    <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    placeholder="Password" 
                    class="border p-3 w-full rounded-lg"
                    @error ("name") border-red-500 @enderror>

                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5 w-full">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 fontbold">Validar Password </label>
                    <input 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    placeholder="Valida tu password" 
                    class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <button type="submit" value="Crear cuenta" class="bg-blue-500 hover:bg-blue-600 transition-colors cursor-pointer text-white px-4 py-3 rounded font-medium w-full">Regístrate</button>
                </div>
            </form>
        </div>
    </div>


@endsection