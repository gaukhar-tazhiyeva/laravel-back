<form method="POST" action="{{ $action }}">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <label>Название:
        <input type="text" name="name" value="{{ $product->name ?? '' }}">
    </label><br>

    <label>Описание:
        <textarea name="description">{{ $product->description ?? '' }}</textarea>
    </label><br>

    <label>Цена:
        <input type="number" step="0.01" name="price" value="{{ $product->price ?? '' }}">
    </label><br>

    <label>Количество:
        <input type="number" name="quantity" value="{{ $product->quantity ?? '' }}">
    </label><br>

    <button type="submit">Сохранить</button>
</form>
