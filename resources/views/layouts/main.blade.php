<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- روابط Tailwind أو CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- 1. استدعاء شريط الملاحة المقسّم -->
    @include('layouts.navigation')

    <!-- 2. المكان الذي سيتغير فيه محتوى كل صفحة -->
    <main class="container mx-auto py-6">
        @yield('content')
    </main>

</body>
</html>