<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\BottleCapState;

class BottleCap extends Model
{
    protected $fillable = [
        "title",
        "description",
        "state",
        "img_nom",
        "date_edition",
        "collector_id",
    ];

    protected $casts  = [
        "state" => BottleCapState::class,
        "date_edition" => 'datetime',
    ];

    public function collector(): BelongsTo {
        return $this->belongsTo(Collector::class);
    }
}
