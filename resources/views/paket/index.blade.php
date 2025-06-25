<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@if (session('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded mb-4">
        {{ session('message') }}
    </div>
@endif
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Paket</h2>
        <!-- Tombol Create Paket -->
        <a href="{{ route('paket.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow">
            + Tambah Paket
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 shadow-lg rounded-lg">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">Biaya Airport</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($data as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $item->id }}</td>
                        <td class="px-6 py-4">{{ $item->nama }}</td>
                        <td class="px-6 py-4">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">Rp{{ number_format($item->by_airport, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('paket.edit', $item->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                Edit
                            </a>

                            <!-- Tombol Hapus buka modal -->
                            <button onclick="openModal({{ $item->id }})" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg w-96 text-center">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
            <p class="mb-6 text-gray-600">Apakah kamu yakin ingin menghapus data ini?</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-center gap-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openModal(id) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        form.action = `/paket/${id}`; // pastikan route destroy sesuai
        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
