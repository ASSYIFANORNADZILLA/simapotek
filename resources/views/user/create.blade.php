<!-- resources/views/users/create.blade.php -->
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>
    <div>
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>
    <button type="submit">Register</button>
</form>
