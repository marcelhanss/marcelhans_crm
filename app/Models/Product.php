<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Product extends Model
{
    protected $fillable = [
        'product_name',
        'speed',
        'price',
    ];

    //Satu product bisa dipakai di banyak project
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
