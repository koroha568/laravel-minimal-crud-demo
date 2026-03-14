@extends('layouts.app')

@section('title', '本一覧')

@section('content')
    <section class="card stack">
        <div class="actions">
            <h1 style="margin: 0; margin-right: auto;">本一覧</h1>
            <a class="button" href="{{ route('books.create') }}">本を追加する</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>著者</th>
                    <th>価格</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ number_format($book->price) }} 円</td>
                        <td>
                            <div class="actions">
                                <a class="button subtle" href="{{ route('books.edit', $book) }}">編集</a>
                                <form action="{{ route('books.destroy', $book) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">削除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">まだ本が登録されていません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
