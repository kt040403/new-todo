<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Todo App</title>
</head>

<body>
    @include('layouts.header')

    <div class="container">
        @yield('content')
    </div>

    @yield('script')
</body>

</html>