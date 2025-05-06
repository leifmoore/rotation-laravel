<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyRotationHistory extends Model
{
    protected $fillable = [
        'date',
        'rotation_data'
    ];

    protected $casts = [
        'rotation_data' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
