<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'user_id',
    ];

    //Lead dimiliki oleh satu user (sales)
     
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Lead memiliki satu project

    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }

    //Lead menjadi satu customer
     
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }
}
