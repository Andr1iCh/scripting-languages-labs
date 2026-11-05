<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MovieTranslation extends Model
{
    protected $fillable = ['lang', 'title', 'description'];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
