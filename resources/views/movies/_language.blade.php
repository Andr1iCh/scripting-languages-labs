<div>
    <label for="lang">Мова назви й опису</label>
    <input id="lang" name="lang" value="{{ $lang }}" list="movie-languages"
           size="3" maxlength="3" pattern="[a-z]{2,3}" required>
    <datalist id="movie-languages">
        @foreach ($languages as $code)
            <option value="{{ $code }}">{{ ['uk' => 'Українська', 'en' => 'Англійська', 'pl' => 'Польська'][$code] ?? $code }}</option>
        @endforeach
    </datalist>
</div>
