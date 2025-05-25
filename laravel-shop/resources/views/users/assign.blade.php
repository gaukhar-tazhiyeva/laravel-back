@extends('layouts.app')

@section('content')
    <h2>Назначение товаров пользователю: {{ $user->name }}</h2>

    <form action="{{ route('users.assign.store', $user->id) }}" method="POST">
        @csrf
        @foreach ($products as $product)
            <div>
                <label>
                    <input type="checkbox" name="products[{{ $product->id }}][selected]"
                        {{ $user->products->contains($product->id) ? 'checked' : '' }}>
                    {{ $product->name }} — {{ $product->price }}₸
                </label>
                <input type="number" name="products[{{ $product->id }}][quantity]"
                       value="{{ $user->products->find($product->id)?->pivot->quantity ?? 1 }}" min="1">
            </div>
        @endforeach
        <button type="submit">Сохранить</button>
    </form>
@endsection
