<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieTranslationController extends Controller
{
    public function edit(Movie $movie, string $lang)
    {
        if ($lang === 'uk') {
            return redirect()->route('movies.edit', $movie);
        }

        $translation = $movie->translations()->where('lang', $lang)->first();

        return view('movies.translation', compact('movie', 'lang', 'translation'));
    }

    public function update(Request $request, Movie $movie, string $lang)
    {
        abort_if($lang === 'uk', 404);
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:5000'],
        ]);

        $movie->translations()->updateOrCreate(['lang' => $lang], $data);

        return redirect()->route('movies.show', ['movie' => $movie, 'lang' => $lang]);
    }
}
