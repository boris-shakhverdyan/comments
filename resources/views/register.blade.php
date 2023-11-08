@extends('layout')

@section('content')
    <main>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Confirm your password">
            <button type="submit">Register</button>
        </form>
    </main>
@endsection
