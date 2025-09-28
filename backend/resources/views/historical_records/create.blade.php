@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f5f2f1] flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-3xl bg-white shadow-2xl rounded-2xl overflow-hidden border border-[#c9c5c4]">
        {{-- Header --}}
        <div class="bg-gradient-to-r from-[#7a86a1] to-[#5c677f] text-white text-center py-5">
            <h2 class="text-2xl font-bold flex items-center justify-center gap-2">
                📌 Registro de Datos Históricos Turísticos
            </h2>
        </div>

        <div class="p-8 space-y-6">
            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="flex items-center justify-between bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg text-sm animate-fadeIn">
                    <span>✅ {{ session('success') }}</span>
                    <button type="button" class="text-green-700 hover:text-green-900" onclick="this.parentElement.remove()">
                        ✖
                    </button>
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ route('historical_records.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Selección del hotel --}}
                <div>
                    <label for="hotel_id" class="block text-[#7a86a1] font-semibold mb-2">
                        🏨 Seleccionar Hotel
                    </label>
                    <input type="number" id="hotel_id" name="hotel_id" placeholder="Ejemplo: 101"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#7a86a1] focus:border-[#7a86a1] p-3" required>
                    <p class="text-xs text-gray-500 mt-1">Ingrese el ID del hotel (en futuras versiones, lista desplegable).</p>
                </div>

                {{-- Fecha --}}
                <div>
                    <label for="date" class="block text-[#7a86a1] font-semibold mb-2">
                        📅 Fecha del registro
                    </label>
                    <input type="date" id="date" name="date"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#7a86a1] focus:border-[#7a86a1] p-3" required>
                </div>

                {{-- Demanda --}}
                <div>
                    <label for="demand_count" class="block text-[#7a86a1] font-semibold mb-2">
                        👥 Demanda Turística
                    </label>
                    <input type="number" id="demand_count" name="demand_count" placeholder="Ejemplo: 120"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#e57373] focus:border-[#e57373] p-3" required>
                </div>

                {{-- Meta --}}
                <div>
                    <label for="meta" class="block text-[#7a86a1] font-semibold mb-2">
                        📝 Notas / Meta (opcional)
                    </label>
                    <textarea id="meta" name="meta" rows="3" placeholder='{"notas":"temporada alta"}'
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#c9c5c4] focus:border-[#c9c5c4] p-3"></textarea>
                </div>

                {{-- Botones --}}
                <div class="flex justify-between items-center">
                    <a href="{{ route('dashboard') }}" 
                        class="bg-[#c9c5c4] hover:bg-[#a6a1a0] text-white font-semibold py-3 px-6 rounded-lg shadow-md transition">
                        ⬅ Volver al Dashboard
                    </a>
                    <button type="submit" 
                        class="bg-[#e57373] hover:bg-[#ef5350] text-white font-semibold py-3 px-6 rounded-lg shadow-md transition">
                        💾 Guardar Registro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
