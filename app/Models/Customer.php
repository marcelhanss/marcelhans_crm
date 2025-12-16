<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    protected $fillable = [
        'lead_id',
        'name',
        'email'
    ];

    // Customer berasal dari satu lead
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

