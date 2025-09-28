<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricalRecord extends Model
{
    protected $fillable = ['hotel_id','date','demand_count','meta'];
    protected $casts = [
        'meta' => 'array',
        'date' => 'date',
    ];
}

