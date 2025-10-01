<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricalRecord;
use Illuminate\Support\Facades\Auth;

class HistoricalRecordController extends Controller
{
    /**
     * Mostrar formulario de creación.
     * (Ruta protegida por 'auth')
     */
    public function create()
    {
        return view('historical_records.create');
    }

    /**
     * Guardar registro histórico asociado al usuario autenticado.
     */
    public function store(Request $request)
    {
        // Validaciones
        $request->validate([
            'date' => 'required|date',
            'demand_count' => 'required|integer|min:0',
            'meta' => 'nullable|string',
        ]);

        // Preparar meta como array (si el usuario pegó JSON válido lo decodificamos,
        // si no, guardamos un array con la clave 'notes' para mantener consistencia JSON)
        $metaInput = $request->input('meta');
        if ($metaInput) {
            $decoded = json_decode($metaInput, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $meta = $decoded;
            } else {
                // No era JSON; guardamos como nota simple
                $meta = ['notes' => $metaInput];
            }
        } else {
            $meta = null;
        }

        // Crear registro asociado al usuario autenticado
        HistoricalRecord::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'demand_count' => $request->demand_count,
            'meta' => $meta,
        ]);

        // Redirigir al dashboard (o a la vista que prefieras)
        return redirect()->route('dashboard')->with('success', 'Registro guardado correctamente ✅');
    }
}
