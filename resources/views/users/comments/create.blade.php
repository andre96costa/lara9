@extends('layouts.app')

@section('title', 'Adicionar novo comentário para o usuário {{ $user->name }}')

@section('content')
   <h1 class="text-2xl font-semibold leading-tigh py-2">Novo comentário</h1>

   @include('includes.validations-form')
   <form action="{{ route('comments.store', $user->id) }}" method="post">
        @include('users.comments._partials.form')
   </form>
@endsection
