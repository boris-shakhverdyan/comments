@extends('layout')

@section('content')
    <main>

        @auth
            <h3>User: {{ auth()->user()->username }}</h3>
            <form action="/" method="POST">
                @csrf
                <textarea name="body" placeholder="Comment body" style="display:block; width: 100%; height: 150px; margin: 10px auto"></textarea>
                <button type="submit">Leave comment</button>
            </form>
        @endauth
        <br>
        <h3>Comments</h3>
        <hr>
        <?= tree($comments) ?>
    </main>
@endsection
