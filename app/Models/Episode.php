<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    protected $fillable = [
        'season_id',
        'episode_number',
        'title',
        'description',
        'still_path',
        'first_view'
    ];

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
