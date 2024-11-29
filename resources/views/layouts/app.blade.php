<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body class="flex flex-col min-w-full min-h-screen z-0 gap-4 bg-slate-50">
    <header class="flex flex-row min-w-full h-10 z-10 p-2 bg-blue-300 text-black">
        Student Monagement System
    </header>
    <main class="flex flex-col min-w-full min-h-screen z-10 justify-center items-center">
        @yield('content')
    </main>
    <footer class="flex min-w-full h-14 z-10 p-2 top-0 bg-blue-200">
        Thank you
    </footer>
</body>
</html>