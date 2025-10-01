<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'demand_count',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
        'date' => 'date',
    ];

    /**
     * Relación con el usuario (hotel).
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
