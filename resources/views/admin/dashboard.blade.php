<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sistem E-Voting</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <header class="bg-blue-600 text-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl md:text-2xl font-bold">Sistem E-Voting</h1>
            <nav class="flex items-center space-x-6 text-sm md:text-base font-medium">
    <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
    <a href="{{ route('admin.paslon.index') }}" class="hover:underline">Kelola Paslon</a>
    <a href="{{ route('admin.pemilih.index') }}" class="hover:underline">Kelola Pemilih</a>
    <a href="{{ route('admin.hasil') }}" class="hover:underline">Hasil Voting</a>
    <a href="{{ route('admin.kandidat.index') }}" class="hover:underline">Kandidat</a>
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
            Logout
        </button>
    </form>
</nav>

        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto py-10 px-4">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Selamat Datang, Admin!</h2>
            <p class="text-gray-600 mb-6">Gunakan navigasi bar di atas untuk mengelola sistem pemilu.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-5 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-blue-900">Total Paslon</h3>
                    <p class="text-3xl text-blue-800 mt-2">{{ $totalPaslon }}</p>
                </div>
                <div class="bg-green-100 p-5 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-900">Total Pemilih</h3>
                    <p class="text-3xl text-green-800 mt-2">{{ $totalPemilih }}</p>
                </div>
                <div class="bg-yellow-100 p-5 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-yellow-900">Sudah Memilih</h3>
                    <p class="text-3xl text-yellow-800 mt-2">{{ $sudahMemilih }}</p>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-center text-[10px] text-gray-400 mt-10 pt-2 pb-4 border-t border-gray-200">
        © {{ date('Y') }} - TAPRAKTIKUM SBD — Kelompok 25
    </footer>



</body>
</html>