@extends('layouts.app')

@section('content')
    <h1>Список пользователей</h1>
    <a href="{{ route('users.create') }}">Новый пользователь</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th><th>Имя</th><th>Email</th><th>Роль</th><th>Действия</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name ?? 'no role' }}</td>
            
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Изменить пользователя</a>
                <a href="{{ route('users.assign', $user->id) }}">Назначить товары</a>
                <a href="{{ route('users.show', $user->id) }}">Посмотреть товары</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Удалить?')">Удалить пользователя</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
