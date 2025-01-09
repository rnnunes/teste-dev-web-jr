
@extends('master')

@section('content')

<h2>Home</h2>

<hr>

<a href="{{ route('users.index') }}"><button>Lista de Usuarios</button></a>
<a href="{{ route('users.create') }}"><button>Cadastro Usuarios</button></a>

<hr>
@endsection