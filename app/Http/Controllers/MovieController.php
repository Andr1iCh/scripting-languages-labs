<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'genre' => ['nullable', 'string', 'max:60'],
        ]);

        $genre = $request->query('genre');
        $query = Movie::query()->orderBy('title')->orderBy('id');

        if ($request->filled('genre')) {
            $query->where('genre', $genre);
        }

        $movies = $query->paginate(5)->withQueryString();
        $genres = Movie::query()->distinct()->orderBy('genre')->pluck('genre');

        return view('movies.index', compact('movies', 'genres', 'genre'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(MovieRequest $request)
    {
        Movie::create($request->validated());

        return redirect()->route('movies.index')
            ->with('success', 'Фільм додано.');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(MovieRequest $request, Movie $movie)
    {
        $movie->update($request->validated());

        return redirect()->route('movies.index')
            ->with('success', 'Зміни збережено.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Фільм видалено.');
    }
}
