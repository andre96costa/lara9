@extends('layouts.app')

@section('title', 'Listagem dos usuários')

@section('content')
    <h1>Listagem dos usuarios</h1>

    <ul>
        @foreach ($users as $user)
            <li>
            {{ $user->name }} - {{ $user->email }} | <a href="{{ route('users.show', $user->id) }}">Show</a>
            </li>
        @endforeach
    </ul>
@endsection
