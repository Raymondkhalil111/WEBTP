<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
</head>
<body>
    <h1>User Details</h1>

    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>First Name:</strong> {{ $user->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <a href="{{ route('users.index') }}">Back to Users List</a>
</body>
</html>
