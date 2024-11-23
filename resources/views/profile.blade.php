
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
</head>
<body>
    <h1>Thông tin người dùng</h1>

    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Tên:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Ngày tạo:</strong> {{ $user->created_at->format('d/m/Y') }}</p>

    <a href="{{ route('profile') }}">Quay lại</a>
</body>
</html>
