
@extends('master')

@section('content')

<h2>Users</h2>

<ul>
    @foreach ($users as $user)
    <li>{{$user->name}}</li>
</ul>

@endsection