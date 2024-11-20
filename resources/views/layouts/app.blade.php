<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Learning TOEIC</title>
    <!-- Bootstrap 2 CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <!-- Bootstrap 2 Responsive CSS (Nếu bạn muốn tính năng đáp ứng) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/twbs/bootstrap@2.3.2/docs/assets/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Bootstrap 2 JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    @yield('content')
    @yield('scripts')
    <!-- jQuery (cần cho Bootstrap) -->

</body>

</html>
