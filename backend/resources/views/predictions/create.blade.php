@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4 py-10">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
        
        {{-- Header --}}
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white text-center py-5">
            <h2 class="text-2xl font-semibold flex items-center justify-center gap-2">
                🔮 Predecir Afluencia Turística
            </h2>
        </div>

        <div class="p-6 space-y-6">
            {{-- Formulario --}}
            <form action="{{ route('predictions.predict') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Fecha --}}
                <div>
                    <label for="date" class="block text-gray-700 font-medium mb-2">
                        📅 Fecha a predecir
                    </label>
                    <input type="date" id="date" name="date"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500 p-3" required>
                </div>

                {{-- Botón --}}
                <div>
                    <button type="submit"
                        class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition">
                        🚀 Predecir
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


