<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register'); // Vista: resources/views/auth/register.blade.php
    }

    public function store(Request $request)
    {
        // Validación de acuerdo a la migración users
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'rooms_number' => 'required|integer|min:1',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // Creación del usuario
        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'rooms_number' => $request->rooms_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Dispara el evento de registro
        event(new Registered($user));

        // Inicia sesión automáticamente
        Auth::login($user);

        // Redirige al dashboard (o cualquier ruta que uses después del login)
        return redirect()->route('dashboard');
    }
}
