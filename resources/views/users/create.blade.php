@extends('layouts.app')

@section('title', 'Criar novo usuário')

@section('content')
   <h1>Novo usuário</h1>

   @include('includes.validations-form')
   
   <form action="{{ route('users.store') }}" method="post">
        @csrf
        @include('users._partials.form')
   </form>
@endsection
