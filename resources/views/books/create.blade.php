@extends('layouts.app')

@section('title', '本を追加する')

@section('content')
    <section class="card stack">
        <div class="actions">
            <h1 style="margin: 0; margin-right: auto;">本を追加する</h1>
            <a class="button subtle" href="{{ route('books.index') }}">一覧へ戻る</a>
        </div>

        <form action="{{ route('books.store') }}" method="post">
            @csrf
            @include('books._form')

            <div class="actions" style="margin-top: 20px;">
                <button type="submit">保存する</button>
            </div>
        </form>
    </section>
@endsection
