@extends('layouts.app')
@section('content')
<h2>Создать пользователя</h2>
@include('users.form', ['action' => route('users.store'), 'method' => 'POST', 'user' => null])
@endsection
