<?php

namespace App\Queries;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;

class MovieFilter
{
    private const SORTABLE = [
        'title' => 'movies.title',
        'actors' => 'actors_count',
    ];

    public function apply(array $input): Builder
    {
        $query = Movie::query()->with('actors')->withCount('actors');

        foreach (['title', 'director'] as $field) {
            $value = $input[$field] ?? '';

            if ($value !== '') {
                $query->where('movies.' . $field, 'like', "%{$value}%");
            }
        }

        $actorName = $input['actorName'] ?? '';
        $actorId = $input['actor_id'] ?? null;

        if ($actorName !== '' || $actorId !== null) {
            $query->whereHas('actors', function (Builder $actors) use ($actorName, $actorId) {
                if ($actorName !== '') {
                    $actors->where('actors.name', 'like', "%{$actorName}%");
                }

                if ($actorId !== null) {
                    $actors->whereKey($actorId);
                }
            });
        }

        $sort = $input['sort'] ?? 'title';
        $desc = str_starts_with($sort, '-');
        $field = $desc ? substr($sort, 1) : $sort;

        return $query
            ->orderBy(self::SORTABLE[$field], $desc ? 'desc' : 'asc')
            ->orderBy('movies.id');
    }
}
