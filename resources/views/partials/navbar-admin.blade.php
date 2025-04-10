{{-- resources/views/layouts/admin-navbar.blade.php --}}
<nav class="bg-gray-900 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center space-x-10">
                <span class="text-xl font-bold">E-Voting Admin</span>
                <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-300">Dashboard</a>
                <a href="{{ route('admin.paslon.index') }}" class="hover:text-gray-300">Kelola Paslon</a>
                <a href="{{ route('admin.pemilih.index') }}" class="hover:text-gray-300">Kelola Pemilih</a>
                <a href="{{ route('admin.hasil') }}" class="hover:text-gray-300">Hasil Voting</a>
            </div>
        </div>
    </div>
</nav>
