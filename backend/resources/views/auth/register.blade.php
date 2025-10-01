@extends('layouts.app')

@section('content')
<div class="w-full max-w-sm bg-white rounded-2xl shadow-xl p-6 mx-4 border border-amber-200 flex flex-col">
    <h2 class="text-2xl font-bold text-gray-800 mb-5 text-center">Registro de Hotel</h2>

    <form method="POST" action="{{ route('register') }}" class="flex flex-col flex-grow">
        @csrf

        <!-- Nombre del Hotel -->
        <div class="mb-3">
            <label for="name" class="block text-gray-800 font-semibold mb-1">Nombre del Hotel</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400">
            @error('name')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Dirección -->
        <div class="mb-3">
            <label for="address" class="block text-gray-800 font-semibold mb-1">Dirección</label>
            <input id="address" type="text" name="address" value="{{ old('address') }}" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400">
            @error('address')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Número de Habitaciones -->
        <div class="mb-3">
            <label for="rooms_number" class="block text-gray-800 font-semibold mb-1">Número de Habitaciones</label>
            <input id="rooms_number" type="number" name="rooms_number" value="{{ old('rooms_number', 1) }}" min="1" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400">
            @error('rooms_number')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="block text-gray-800 font-semibold mb-1">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400">
            @error('email')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label for="password" class="block text-gray-800 font-semibold mb-1">Contraseña</label>
            <input id="password" type="password" name="password" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400">
            @error('password')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-800 font-semibold mb-1">Confirmar Contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400">
        </div>

        <!-- Botón + Enlaces -->
        <div class="flex flex-col items-center mt-2">
            <button type="submit"
                class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-3 rounded-lg transition-colors">
                Registrarse
            </button>

            <p class="mt-3 text-sm text-gray-700">
                ¿Ya tienes una cuenta? 
                <a href="{{ route('login') }}" 
                   class="ml-1 font-semibold text-amber-600 hover:text-amber-800">
                    Inicia sesión aquí
                </a>
            </p>
        </div>
    </form>
</div>
@endsection
