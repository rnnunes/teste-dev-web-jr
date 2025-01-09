
@extends('master')

@section('content')

<h2>Detalhes - Usuário</h2>

<form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>

@endsection
