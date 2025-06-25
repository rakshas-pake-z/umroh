<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Form Pendaftaran</title>
  @vite('resources/css/app.css') <!-- Tailwind CSS masuk dari sini -->
</head>
<body class="bg-gray-100 font-sans">

  <!-- Navbar -->
  <nav class="bg-blue-600 p-4 text-white">
    <a href="account" class="font-semibold text-lg">Account</a>
  </nav>

  <!-- Card Container -->
  <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-3xl bg-white rounded-lg shadow-md p-8">
      <h2 class="text-2xl font-bold mb-6 text-gray-800">Form Pendaftaran</h2>

      <form action="{{ route('umroh.store') }}" method="post" class="space-y-6">
        @csrf

        <div>
          <label for="select" class="block text-sm font-medium text-gray-700">Pilih Pendaftaran</label>
          <select name="select" id="select" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            <option disabled selected hidden>Select option</option>
            <option value="umroh">Pendaftaran Umroh</option>
            <option value="haji">Pendaftaran Haji</option>
          </select>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Pilih Paket</label>
          <select name="paket_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            <option disabled selected hidden>Select option</option>
            @foreach ($paket as $p)
              <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Tgl Daftar</label>
          <input type="date" name="tgl_daftar" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Nama</label>
          <input type="text" name="nama" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Alamat</label>
          <input type="text" name="alamat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">No Telpon</label>
          <input type="number" name="no_hp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Tgl Berangkat</label>
          <input type="date" name="tgl_berangkat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Room</label>
          <input type="text" name="room" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Jumlah Jamaah</label>
          <input type="number" name="jml_jamaah" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Keterangan</label>
          <textarea name="keterangan" rows="4" placeholder="Tulis keterangan jika ada..." class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"></textarea>
        </div>

        <div class="flex space-x-4">
          <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Submit</button>
          <button type="reset" class="px-6 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Reset</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
