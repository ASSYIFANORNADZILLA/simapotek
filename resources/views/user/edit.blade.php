<!-- resources/views/users/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
        </div>
        
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>
        
        <div>
            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>
