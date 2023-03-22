<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
        //validate
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);

        //store
        Comentario::create([
            'comentario' => $request->comentario,
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);

        //redirect
        return back()->with('mensaje', 'Comentario agregado exitosamente');
    }
}
