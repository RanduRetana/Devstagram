<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'username' => 'required|min:3|max:30|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //autenticar al usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //redireccionar
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
