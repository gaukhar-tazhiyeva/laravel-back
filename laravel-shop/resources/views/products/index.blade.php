@extends('layouts.app')

@section('content')
    <h1>Список товаров</h1>
    <a href="{{ route('products.create') }}">Новый товар</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th><th>Название</th><th>Цена</th><th>Кол-во</th><th>Действия</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}₸</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">Изменить</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Удалить товар?')">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
