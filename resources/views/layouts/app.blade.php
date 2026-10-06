<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Buku')</title>
</head>
<body>

    <!-- Flash message -->
    @if (session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    <!-- BAGIAN INI SANGAT PENTING -->
    <main>
        @yield('content')
    </main>

</body>
</html>
