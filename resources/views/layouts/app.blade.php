<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tembakau Indonesia - Warisan Nusantara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-sans selection:bg-amber-600 selection:text-white">
    
    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-white text-center py-8 mt-12 border-t border-slate-800">
        <p class="text-slate-400">&copy; {{ date('Y') }} Tembakau Nusantara. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>
