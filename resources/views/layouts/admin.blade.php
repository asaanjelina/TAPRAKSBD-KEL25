<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evoting Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">


    <nav class="bg-white shadow px-6 py-4 mb-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-lg font-bold text-blue-600">Dashboard Admin</h1>
            <ul class="flex space-x-6 text-sm font-medium text-gray-700">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.paslon.index') }}" class="hover:text-blue-600">
                        Kelola Paslon
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pemilih.index') }}" class="hover:text-blue-600">
                        Kelola Pemilih
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.hasil') }}" class="hover:text-blue-600">
                        Hasil Voting
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.kandidat.index') }}" class="hover:text-blue-600">
                        Kandidat
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-500">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

   
    <main class="max-w-6xl mx-auto px-4">
        @yield('content')
    </main>

  
    <footer class="text-center text-[10px] text-gray-400 mt-10 pt-2 pb-4 border-t border-gray-200">
        © {{ date('Y') }} - TAPRAKTIKUM SBD — Kelompok 25
    </footer>

</body>
</html>
