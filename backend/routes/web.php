<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoricalRecordController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Rutas de acceso público (invitados)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Registro de usuarios
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Inicio de sesión
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas (solo usuarios autenticados)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Cerrar sesión
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Registro de datos históricos (HU-03)
    Route::resource('historical_records', HistoricalRecordController::class);

    // ✅ Carga masiva con Excel
    Route::post('/historical_records/import', [HistoricalRecordController::class, 'importExcel'])
        ->name('historical_records.import');

    // Predicciones y tablas (HU-04 y HU-05)
    Route::get('/predictions/create', [PredictionController::class, 'create'])->name('predictions.create');
    Route::post('/predictions', [PredictionController::class, 'store'])->name('predictions.predict');
    Route::get('/predictions', [PredictionController::class, 'index'])->name('predictions.index');
});

/*
|--------------------------------------------------------------------------
| Página principal
|--------------------------------------------------------------------------
|
| Si el usuario entra a la raíz ("/"), lo mandamos directo al login.
| Si ya está autenticado, Laravel lo redirige al dashboard.
|
*/
Route::get('/', function () {
    return redirect()->route('login'); // 🔹 Redirige directo al login
});
