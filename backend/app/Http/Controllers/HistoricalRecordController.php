<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricalRecord;

class HistoricalRecordController extends Controller
{
    public function create()
    {
        return view('historical_records.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|integer',
            'date' => 'required|date',
            'demand_count' => 'required|integer|min:0',
            'meta' => 'nullable|string', // <- corregido
        ]);

        HistoricalRecord::create([
            'hotel_id' => $request->hotel_id,
            'date' => $request->date,
            'demand_count' => $request->demand_count,
            'meta' => $request->meta,
        ]);

        // Redirigir al Dashboard con mensaje de éxito
        return redirect()->route('dashboard')
                         ->with('success', 'Registro guardado correctamente ✅');
    }
}
