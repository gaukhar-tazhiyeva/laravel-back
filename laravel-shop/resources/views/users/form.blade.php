<form method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <label>Имя: <input type="text" name="name" value="{{ $user->name ?? '' }}"></label><br>
    <label>Email: <input type="email" name="email" value="{{ $user->email ?? '' }}"></label><br>
    <label>Роль: 
        <select name="role">
            <option value="user" {{ ($user->role ?? '') === 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ ($user->role ?? '') === 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
    </label><br>
    <label>Пароль: <input type="password" name="password"></label><br>

    <button type="submit">Сохранить</button>
</form>
