@extends('layout.app')

@section('titulo')
    Crea una nueva publicación

@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('contenido')

    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}" id="dropzone" 
            method="POST"
            enctype="multipart/form-data"
            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center dz-clickable">
            @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 fontbold">Título</label>
                    <input 
                    id="titulo" 
                    name="titulo" 
                    type="text" 
                    placeholder="Título de la publicación" 
                    class="border p-3 w-full rounded-lg
                    @error ("titulo") border-red-500 @enderror"
                    value="{{old("titulo")}}">

                    @error('titulo')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 fontbold">Descripción</label>
                    <textarea 
                    id="descripcion"
                    name="descripcion" 
                    type="text" 
                    placeholder="Descripción de la publicación" 
                    class="border p-3 w-full rounded-lg
                    @error ("descripcion") border-red-500 @enderror">
                    {{old("descripcion")}}</textarea>

                    @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input
                        name="imagen"
                        type="hidden"
                        value="{{old('imagen')}}"
                    />
                    @error('imagen')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <input type="submit" value="Crear publicación" class="bg-blue-500 hover:bg-blue-600 transition-colors cursor-pointer text-white px-4 py-3 rounded font-medium w-full"/>
            </form>
        </div>

    </div>

@endsection