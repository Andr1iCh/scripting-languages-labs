<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracker;
use App\Models\Movie;
class StatsController extends Controller
{
    public function movies()
    {
        $views = Tracker::query()
            ->select('metadata->movie_id as movie_id')
            ->selectRaw('COUNT(*) as views')
            ->where('metadata->method', 'GET')
            ->where('metadata->route', 'movies.show')
            ->where('status', 200)
            ->groupBy('metadata->movie_id');

        $movies = Movie::query()
            ->leftJoinSub($views, 'movie_views', function ($join) {
                $join->on('movies.id', '=', 'movie_views.movie_id');
            })
            ->select('movies.*')
            ->selectRaw('COALESCE(movie_views.views, 0) as views')
            ->orderByDesc('views')
            ->orderBy('movies.title')
            ->orderBy('movies.id')
            ->paginate(15);

        return view('stats.movies', compact('movies'));
    }

    public function pages(Request $request)
    {
        $type = $request->query('type', 'page');
        if (!in_array($type, ['page', 'ip'], true)) {
            abort(400, 'Невідомий тип групування.');
        }
        $rows = Tracker::query()
            ->selectRaw(
                "{$type}, count(*) as hits, max(visited_at) as last_visit"
            )
            ->groupBy($type)
            ->orderByDesc('hits')
            ->get();
        return view('stats.pages', compact('rows', 'type'));
    }

    public function detail(Request $request)
    {
        $type = $request->query('type', 'page');
        $item = $request->query('item');
        if (!in_array($type, ['page', 'ip'], true)) {
            abort(400, 'Невідомий тип фільтрації.');
        }
        $rows = Tracker::query()
            ->when(
                $item,
                fn ($query, $value) =>
                $query->where($type, $value)
            )
            ->orderByDesc('visited_at')
            ->paginate(15)
            ->withQueryString();
        return view(
            'stats.detail',
            compact('rows', 'type', 'item')
        );
    }
}
