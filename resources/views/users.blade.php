
@extends('master')

@section('content')

<a href="{{ route('users.create') }}">Cadastro</a>

<hr>

<h2>Users</h2>

<ul>
    @foreach ($users as $user)
    <li>{{$user->name}} | <a href="{{ route('users.edit',['user'=> $user->id]) }}">Editar</a> | 
                          <a href="">Deletar</a> | 
                          <a href="{{ route('users.show',['user'=> $user->id]) }}">Detalhes</a></li>
    @endforeach
</ul>

@endsection