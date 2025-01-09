
@extends('master')

@section('content')

<br>
<a href="{{ route('home') }}"><button>Home</button></a>
<a href="{{ route('users.create') }}"><button>Cadastro Usuarios</button></a>

<hr>

<h2>Lista de Usuarios</h2>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                        <button>Editar</button>
                    </a>
                    <!-- Deletar -->
                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este usuário?')">
                            Deletar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection