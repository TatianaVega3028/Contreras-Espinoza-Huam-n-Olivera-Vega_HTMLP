<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction;
use Illuminate\Support\Facades\DB;

class PredictionController extends Controller
{
    /**
     * Mostrar tabla de predicciones por periodos (HU-05)
     */
    public function index()
    {
        $monthly = Prediction::select(
            DB::raw('DATE_FORMAT(date, "%Y-%m") as period'),
            DB::raw('SUM(predicted_count) as total')
        )
        ->groupBy('period')
        ->orderBy('period', 'desc')
        ->get();

        return view('predictions.index', compact('monthly'));
    }

    /**
     * Mostrar formulario para predecir (HU-04)
     */
    public function create()
    {
        return view('predictions.create');
    }

    /**
     * Guardar predicción (HU-04)
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $prediction = Prediction::create([
            'date' => $request->date,
            'predicted_count' => rand(50,200), // valor simulado por ahora
            'model_version' => 'v1.0',
        ]);

        return redirect()->route('predictions.index')
                         ->with('success','Predicción generada correctamente');
    }
}
