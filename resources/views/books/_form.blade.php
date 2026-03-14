@php
    $book ??= null;
@endphp

<div class="field">
    <label for="title">タイトル</label>
    <input
        id="title"
        name="title"
        type="text"
        value="{{ old('title', $book?->title ?? '') }}"
    >
    @error('title')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="field">
    <label for="author">著者</label>
    <input
        id="author"
        name="author"
        type="text"
        value="{{ old('author', $book?->author ?? '') }}"
    >
    @error('author')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="field">
    <label for="price">価格（円）</label>
    <input
        id="price"
        name="price"
        type="number"
        min="0"
        value="{{ old('price', $book?->price ?? '') }}"
    >
    @error('price')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
