<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CobraCerta - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('imagens/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen font-['Inter']">
    <main class="min-h-screen flex items-center justify-center">
        @yield('content')
    </main>

    @if(session('toast'))
        <div class="fixed bottom-4 right-4 z-50">
            <div class="bg-{{ session('toast.type') === 'success' ? 'green' : 'red' }}-500 text-white px-6 py-3 rounded-lg shadow-lg">
                {{ session('toast.message') }}
            </div>
        </div>
    @endif
</body>
</html>
