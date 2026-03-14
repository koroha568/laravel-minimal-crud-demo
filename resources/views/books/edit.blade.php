@extends('layouts.app')

@section('title', '本を編集する')

@section('content')
    <section class="card stack">
        <div class="actions">
            <h1 style="margin: 0; margin-right: auto;">本を編集する</h1>
            <a class="button subtle" href="{{ route('books.index') }}">一覧へ戻る</a>
        </div>

        <form action="{{ route('books.update', $book) }}" method="post">
            @csrf
            @method('PATCH')
            @include('books._form', ['book' => $book])

            <div class="actions" style="margin-top: 20px;">
                <button type="submit">更新する</button>
            </div>
        </form>
    </section>
@endsection
