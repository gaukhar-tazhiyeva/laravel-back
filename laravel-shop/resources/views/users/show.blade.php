@extends('layouts.app')

@section('content')
    <h1>Профиль пользователя: {{ $user->name }}</h1>

    <h3>Назначенные товары:</h3>
    <ul>
        @forelse ($user->products as $product)
            <li>{{ $product->name }} — {{ $product->pivot->quantity }} шт.</li>
        @empty
            <li>Нет назначенных товаров</li>
        @endforelse
    </ul>

    <a href="{{ route('users.index') }}">← Назад к списку пользователей</a>
@endsection
