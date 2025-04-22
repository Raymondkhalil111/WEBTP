<!-- resources/views/users/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        body { font-family: Arial; background:rgb(100, 101, 102); padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        input { padding: 5px; width: 200px; }
        button { padding: 5px 10px; }
    </style>
</head>
<body>

    <h1>All Users</h1>

    <form method="GET" action="{{ route('users.index') }}">
        <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('users.show', $user->id) }}">View</a></td>
                </tr>
            @empty
                <tr><td colspan="3">No users found.</td></tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
