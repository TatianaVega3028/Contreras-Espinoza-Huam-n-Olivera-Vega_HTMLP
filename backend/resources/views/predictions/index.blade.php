@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-200">
        
        {{-- Header --}}
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white text-center py-6">
            <h2 class="text-3xl font-bold flex items-center justify-center gap-2">
                📊 Predicciones por periodo
            </h2>
        </div>

        <div class="p-8">
            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="mb-6 flex items-center justify-between bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg text-base">
                    <span>✅ {{ session('success') }}</span>
                    <button type="button" class="text-green-700 hover:text-green-900 text-lg font-bold" onclick="this.parentElement.remove()">
                        ✖
                    </button>
                </div>
            @endif

            {{-- Tabla --}}
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200 text-lg">
                    <thead class="bg-orange-500 text-white">
                        <tr>
                            <th class="px-8 py-4 text-left font-semibold">Periodo (YYYY-MM)</th>
                            <th class="px-8 py-4 text-left font-semibold">Total Predicciones</th>
                            <th class="px-8 py-4 text-left font-semibold">Promedio</th>
                            <th class="px-8 py-4 text-left font-semibold">Máximo</th>
                            <th class="px-8 py-4 text-left font-semibold">Mínimo</th>
                            <th class="px-8 py-4 text-left font-semibold">Notas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        {{-- Datos dinámicos --}}
                        @forelse($monthly as $month)
                            <tr class="hover:bg-orange-50 transition">
                                <td class="px-8 py-4 text-gray-700 font-medium">{{ $month->period ?? '—' }}</td>
                                <td class="px-8 py-4 text-gray-700 font-medium">{{ $month->total ?? '—' }}</td>
                                <td class="px-8 py-4 text-gray-700">—</td>
                                <td class="px-8 py-4 text-gray-700">—</td>
                                <td class="px-8 py-4 text-gray-700">—</td>
                                <td class="px-8 py-4 text-gray-500 italic">—</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-8 py-6 text-center text-gray-500 text-lg">
                                    ⚠️ No hay predicciones registradas aún
                                </td>
                            </tr>
                        @endforelse

                        {{-- Filas de ejemplo en blanco --}}
                        @for($i = 0; $i < 5; $i++)
                            <tr class="hover:bg-orange-50 transition">
                                <td class="px-8 py-4 text-gray-400">—</td>
                                <td class="px-8 py-4 text-gray-400">—</td>
                                <td class="px-8 py-4 text-gray-400">—</td>
                                <td class="px-8 py-4 text-gray-400">—</td>
                                <td class="px-8 py-4 text-gray-400">—</td>
                                <td class="px-8 py-4 text-gray-400">—</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
