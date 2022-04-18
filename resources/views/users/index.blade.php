@extends('layouts.app')

@section('title', 'Listagem dos usuários')

@section('content')
    <h1>
        Listagem dos usuarios (<a href="{{ route('users.create') }}">+</a>)
    </h1>


    <ul>
        @foreach ($users as $user)
            <li>
            {{ $user->name }} - {{ $user->email }} 
            | <a href="{{ route('users.show', $user->id) }}">Show</a> 
            | <a href="{{ route('users.edit', $user->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection
