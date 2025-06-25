<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Paket Baru</h2>

    <form action="{{ route('paket.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nama Paket:
            </label>
            <input type="text" name="nama" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Harga Paket:
            </label>
            <input type="number" name="harga" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Biaya Airport:
            </label>
            <input type="number" name="by_airport" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition">
            Submit
        </button>
    </form>
</div>
