<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Series extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumb_path',
        'background_path',
        'first_view'
    ];

    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }

    public function getShortDescriptionAttribute(): string
    {
        return Str::limit($this->description, 50, '...');
    }
}
