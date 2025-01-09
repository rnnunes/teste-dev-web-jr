
@extends('master')

@section('content')


<h2>Cadastro de Usuarios</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome">
    <input type="text" name="email" placeholder="E-mail">
    <input type="text" name="password" placeholder="Senha">

    <button type="submit">Cadastro</button>
</form>

<hr>
<a href="{{ route('users.index') }}"><button>Retornar</button></a>

@endsection