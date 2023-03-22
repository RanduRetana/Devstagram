<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');  // 'imagen' is the name of the input field in the form

        $nombreImagen = Str::uuid() . '.' . $imagen->extension();

        $imagenServidor = Image::make($imagen)->fit(1000, 1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
