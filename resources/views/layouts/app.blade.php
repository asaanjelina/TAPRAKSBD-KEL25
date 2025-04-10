<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evoting</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    {{-- Header/Navbar --}}
    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="text-lg font-bold text-blue-700">
                E-Voting
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm text-gray-700">Hai, {{ Auth::user()->nama }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Konten Utama --}}
    <main class="max-w-6xl mx-auto py-6 px-4">
        @yield('content')
    </main>
    <footer class="text-center text-[10px] text-gray-400 mt-10 pt-2 pb-4 border-t border-gray-200">
        © {{ date('Y') }} - TAPRAKTIKUM SBD — Kelompok 25
    </footer>
</body>
</html>
