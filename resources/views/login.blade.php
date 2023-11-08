@extends('layout')

@section('content')
    <main>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </main>
@endsection
