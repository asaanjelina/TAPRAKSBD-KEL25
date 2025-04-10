@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Hasil Voting</h2>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Paslon</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Jumlah Suara</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($hasil as $item)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $item->nama_ketua }} & {{ $item->nama_wakil }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $item->jumlah_suara }}
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="togglePemilih({{ $item->paslon_id }})"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-sm">
                                Lihat Pemilih
                            </button>
                        </td>
                    </tr>
                    <tr id="pemilih-{{ $item->paslon_id }}" class="hidden">
                        <td colspan="3" class="px-6 py-4 bg-gray-50">
                            <ul class="list-disc list-inside text-gray-700">
                                @forelse($pemilihs->where('paslon_id', $item->paslon_id) as $pemilih)
                                    <li>{{ $pemilih->nama }} ({{ $pemilih->nim }})</li>
                                @empty
                                    <li>Tidak ada pemilih untuk paslon ini.</li>
                                @endforelse
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function togglePemilih(id) {
        const row = document.getElementById('pemilih-' + id);
        row.classList.toggle('hidden');
    }
</script>
@endsection
