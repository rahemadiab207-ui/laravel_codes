<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Details</title>
</head>
<body>
    <h1>User Details</h1>
    <p><strong>ID:</strong> {{ $users->id }}</p>
    <p><strong>Name:</strong> {{ $users->name }}</p>
    <p><strong>Email:</strong> {{ $users->email }}</p>
    <p><strong>Age:</strong> {{ $users->age }}</p>

    <a href="/users">Back to All Users</a>
</body>
</html>