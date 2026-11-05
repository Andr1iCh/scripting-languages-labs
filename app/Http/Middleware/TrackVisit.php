<?php
namespace App\Http\Middleware;
use App\Models\Movie;
use App\Models\Tracker;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $movie = $request->route('movie');
        Tracker::create([
            'page' => $request->path(),
            'ip' => $request->ip(),
            'status' => $response->getStatusCode(),
            'visited_at' => now(),
            'metadata' => [
                'method' => $request->method(),
                'route' => $request->route()?->getName(),
                'movie_id' => $movie instanceof Movie ? $movie->getKey() : null,
            ],
        ]);
        return $response;
    }
}
