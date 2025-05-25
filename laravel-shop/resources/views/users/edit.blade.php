@extends('layouts.app')
@section('content')
<h2>Редактировать пользователя</h2>
@include('users.form', [
  'action' => route('users.update', $user->id), 
  'method' => 'PUT', 
  'user' => $user
])
@endsection
