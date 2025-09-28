@extends('layouts.app')

@section('content')
<div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 m-4 border border-amber-200">
    <h2 class="text-3xl font-bold text-white-700 mb-6 text-center">Iniciar Sesión</h2>

    <!-- Mostrar errores de sesión -->
    @if(session('status'))
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-800 font-semibold mb-2">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-800 font-semibold mb-2">Contraseña</label>
            <input id="password" type="password" name="password" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400">
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-4 flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
                class="rounded border-gray-300 text-amber-600 focus:ring-amber-400">
            <label for="remember_me" class="ms-2 text-gray-700 text-sm">Recordarme</label>
        </div>

        <!-- Botón Iniciar Sesión -->
        <div class="flex flex-col items-center">
            <button type="submit"
                class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                Iniciar Sesión
            </button>

            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" 
                    class="mt-3 text-sm text-amber-600 hover:text-amber-800">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif

            <!-- Nuevo enlace para registro -->
            <p class="mt-4 text-sm text-gray-700">
                ¿No tienes una cuenta? 
                <a href="{{ route('register') }}" 
                   class="ml-1 inline-block font-semibold text-amber-600 hover:text-amber-800">
                    Regístrate aquí
                </a>
            </p>
        </div>
    </form>
</div>
@endsection
