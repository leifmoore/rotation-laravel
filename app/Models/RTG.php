<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RTG extends Model
{
    protected $table = 'rtgs';
    protected $fillable = [
        'user_id',
        'name_code',
        'status',
        'tour_count',
        'location',
        'position',
        'availability_status'
    ];

    protected $casts = [
        'status' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
