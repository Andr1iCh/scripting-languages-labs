<div class="movie-field">
    <label for="title">Назва</label>
    <input id="title" name="title" type="text" maxlength="150"
           value="{{ old('title', $movie->title ?? '') }}" required>
    @error('title')
        <p class="movie-error">{{ $message }}</p>
    @enderror
</div>

<div class="movie-field">
    <label for="genre">Жанр</label>
    <input id="genre" name="genre" type="text" maxlength="60"
           value="{{ old('genre', $movie->genre ?? '') }}" required>
    @error('genre')
        <p class="movie-error">{{ $message }}</p>
    @enderror
</div>

<div class="movie-field">
    <label for="director">Режисер</label>
    <input id="director" name="director" type="text" maxlength="100"
           value="{{ old('director', $movie->director ?? '') }}" required>
    @error('director')
        <p class="movie-error">{{ $message }}</p>
    @enderror
</div>

<div class="movie-field">
    <label for="release_year">Рік виходу</label>
    <input id="release_year" name="release_year" type="number" min="1888" max="{{ (int) date('Y') + 5 }}"
           value="{{ old('release_year', $movie->release_year ?? '') }}" required>
    @error('release_year')
        <p class="movie-error">{{ $message }}</p>
    @enderror
</div>

<div class="movie-field">
    <label for="duration">Тривалість, хвилин</label>
    <input id="duration" name="duration" type="number" min="1" max="600"
           value="{{ old('duration', $movie->duration ?? '') }}" required>
    @error('duration')
        <p class="movie-error">{{ $message }}</p>
    @enderror
</div>

<div class="movie-field">
    <label for="description">Короткий опис</label>
    <textarea id="description" name="description" rows="5" maxlength="5000">{{ old('description', $movie->description ?? '') }}</textarea>
    @error('description')
        <p class="movie-error">{{ $message }}</p>
    @enderror
</div>
