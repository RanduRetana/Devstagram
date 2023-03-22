 @extends('layout.app')

@section('titulo')
    {{$post->titulo}}
@endsection

 @section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset("uploads") . "/" . $post->imagen }}" alt="Imagen de la publicación">
            <div class="p-3 flex items-center gap-4">
                @auth

                @if($post->checklike(auth()->user()))
                <form method="POST" action={{route(posts.likes.destroy, $post)}}> 
                    @method('DELETE')
                    @csrf
                    <div class="my-4">
                        <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                          </svg>
                        </button>
                    </div>                          
                </form>
                @else
                <form method="POST" action={{route(posts.likes.store, $post)}}> 
                    @csrf
                    <div class="my-4">
                        <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                          </svg>
                        </button>
                    </div>                          
                </form>
                @endif
                @endauth
                <p>{{ $post->likes->count() }} likes</p>
            </div>
            <div> 
                <p class="font-bold text-2xl">
                    {{"@" . $post->user->username }}
                </p>
                <p class="text-gray-400 text-sm">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="text-gray-700 text-sm">
                    {{ $post->descripcion }}
                </p>
            </div>

            @auth 
                @if (auth()->user()->id == $post->user_id)
                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar post" class="bg-red-500 hover:bg-red-600 transition-colors cursor-pointer text-white px-4 py-3 rounded font-medium w-full rounded"/>
                    </form>
                @endif
            @endauth
            
        </div>

        <div class="md:w-1/2"> 
            <div class="shadow bg-white p-5 mb-5">
                @auth 
                @if (session('mensaje'))
                    <p class="bg-green-500 text-white my-2 rounded-lg text-sm text-center p-2">
                        {{ session('mensaje') }}
                    </p>
                @endif
                
                <img src="{{ asset('img/usuario.svg') }}" alt="Usuario Imagen" class="w-10 h-10 rounded-full">
                <form action="{{route('comentarios.store', ['post' => $post, 'user' => $user])}}" method="POST"> 
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 fontbold">Comment</label>
                        <textarea 
                        id="comentario"
                        name="comentario" 
                        type="text" 
                        placeholder="Ingresa tu comentario" 
                        class="border p-3 w-full rounded-lg
                        @error ("comentario") border-red-500 @enderror">@error('comentario')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                            {{ $message }}
                        </p>
                        @enderror</textarea>
                    </div>
                    <input type="submit" value="Crear comentario" class="bg-blue-500 hover:bg-blue-600 transition-colors cursor-pointer text-white px-4 py-3 rounded font-medium w-full"/> 
                </form>
                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-3">
                                <a href="{{route('posts.index', $comentario->user)}}" class="font-bold text-gray-500">
                                    {{ "@" . $comentario->user->username }}
                                </a>
                                <p class="text-gray-400 text-sm">
                                    {{ $comentario->created_at->diffForHumans() }}
                                </p>
                                <p class="text-gray-700 text-sm">
                                    {{ $comentario->comentario }}
                                </p>
                            </div>
            
                        @endforeach
                    @else
                        <p class="text-center text-gray-500">No hay comentarios</p>
                    @endif

                </div>
            </div>
            
        </div>
    </div>
 @endsection