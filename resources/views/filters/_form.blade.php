<div>
    <label for="filter_name">Назва мітки</label>
    <input
        id="filter_name"
        name="filter_name"
        type="text"
        maxlength="100"
        value="{{ old('filter_name', $filter->filter_name ?? '') }}"
    >
    @error('filter_name')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="filter_description">Опис мітки</label>
    <textarea id="filter_description" name="filter_description">{{ old('filter_description', $filter->filter_description ?? '') }}</textarea>
    @error('filter_description')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
