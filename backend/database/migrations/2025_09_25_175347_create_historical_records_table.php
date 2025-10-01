<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historical_records', function (Blueprint $table) {
            $table->id();

            // Relación con el hotel (usuario)
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Datos históricos
            $table->date('date');
            $table->integer('demand_count');   // número de turistas / ocupación
            $table->json('meta')->nullable();  // info extra (eventos, clima, etc.)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historical_records');
    }
};
