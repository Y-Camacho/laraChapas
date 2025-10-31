<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Collector extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function bottleCaps(): HasMany {
        return $this->hasMany(BottleCap::class);
    }
}
