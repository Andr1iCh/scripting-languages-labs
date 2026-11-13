<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'genre',
        'director',
        'release_year',
        'duration',
        'description',
    ];

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(MovieTranslation::class);
    }
}
