<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function translations(): HasMany
    {
        return $this->hasMany(MovieTranslation::class);
    }
}
