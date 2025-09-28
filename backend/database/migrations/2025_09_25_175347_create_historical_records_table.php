<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historical_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id')->nullable(); // si manejas hoteles
            $table->date('date');
            $table->integer('demand_count'); // número de turistas/ocupación
            $table->json('meta')->nullable(); // info extra (eventos, clima, etc.)
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historical_records');
    }
};
