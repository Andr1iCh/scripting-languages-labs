<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Models\MovieTranslation;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'genre' => ['nullable', 'string', 'max:60'],
        ]);

        $genre = $request->query('genre');
        $lang = $this->language($request);
        $languages = $this->languages();
        $query = Movie::with(['translations' => fn ($query) => $query->where('lang', $lang)])
            ->withExists(['translations as has_translation' => fn ($query) => $query->where('lang', $lang)])
            ->orderByDesc('has_translation')
            ->orderBy('title')->orderBy('id');

        if ($request->filled('genre')) {
            $query->where('genre', $genre);
        }

        $movies = $query->paginate(5)->withQueryString();
        $genres = Movie::query()->distinct()->orderBy('genre')->pluck('genre');

        return view('movies.index', compact('movies', 'genres', 'genre', 'lang', 'languages'));
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

    public function show(Request $request, Movie $movie)
    {
        $lang = $this->language($request);
        $translation = $movie->translations()->where('lang', $lang)->first();
        $languages = $this->languages();

        return view('movies.show', compact('movie', 'lang', 'translation', 'languages'));
    }

    private function languages()
    {
        return collect(['uk', 'en'])
            ->merge(MovieTranslation::query()->distinct()->orderBy('lang')->pluck('lang'))
            ->unique()->values();
    }

    private function language(Request $request): string
    {
        $value = $request->query('lang', 'uk');

        return is_string($value) && preg_match('/^[a-z]{2,3}$/D', $value) ? $value : 'uk';
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
