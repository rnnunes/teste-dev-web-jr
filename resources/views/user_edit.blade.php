
@extends('master')

@section('content')

<h2>Edição de Cadastro</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="text" name="email" value="{{ $user->email }}">
    <input type="text" name="password" value="Digite uma nova senha">
    
    <button type="submit">Atualizar</button>
</form>

<hr>
<a href="{{ route('users.index') }}"><button>Retornar</button></a>

@endsection