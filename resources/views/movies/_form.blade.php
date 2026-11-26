<div class="movie-field">
    <label for="actors">Актори</label>
    <select id="actors" name="actors[]" multiple>
        @foreach ($actors as $id => $name)
            <option value="{{ $id }}"
                @selected(in_array($id, old('actors', $selected ?? [])))>
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('actors')
        <p class="movie-error">{{ $message }}</p>
    @enderror
    @error('actors.*')
        <p class="movie-error">{{ $message }}</p>
    @enderror
</div>

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
    <label for="release_date">Дата виходу</label>
    <input id="release_date" name="release_date" type="date"
           value="{{ old('release_date', isset($movie) ? $movie->release_date?->toDateString() : '') }}"
           @required(!isset($movie) || $movie->release_date !== null)>
    @if (isset($movie) && $movie->release_date === null)
        <p>Збережений рік виходу — {{ $movie->release_year }}. Якщо точна дата невідома, поле можна залишити порожнім.</p>
    @endif
    @error('release_date')
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
