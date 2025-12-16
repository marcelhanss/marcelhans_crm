<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = [
        'lead_id',
        'product_id',
        'approved_by',
        'status',
    ];

    // Project milik satu leadd
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    // Project menggunakan satu product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    
   
}
