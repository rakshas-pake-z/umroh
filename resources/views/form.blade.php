<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
    <link rel="stylesheet" href="css\style.css">
</head>
    <body>
        <div class="navbar">
            <a href="account">account</a>
        </div>
        <form action="{{ route('form.submit') }}" method="post">
          @csrf
          <div class="form-container">
          <div class="selection">
            <label for="select">Pilih Pendaftaran</label>
            <select name="select" id="select">
              <option disable selected hidden>Select option</option>
              <option value="umroh">Pendaftaran Umroh</option>
              <option value="haji">Pendaftaran Haji</option>
            </select>
          </div>
          <div class="paket">
            <label for="">Pilih Paket</label>
            <select name="paket_id" required>
                <option disabled selected hidden>Select option</option>
                @foreach ($paket as $p)
                  <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
          </div>
          <div class="tgl-daftar">
            <label for="">Tgl Daftar</label>
            <input type="date" name="tgl_daftar">
          </div>
          <div class="nama">
            <label for="">Nama</label>
            <input type="text" name="nama">
          </div>
          <div class="alamat">
            <label for="">Alamat</label>
            <input type="text" name="alamat">
          </div>
          <div class="email">
            <label for="">Email</label>
            <input type="email" name="email">
          </div>
          <div class="no-telp">
            <label for="">No Telpon</label>
            <input type="number" name="no_hp">
          </div>
          <div class="tgl-berangkat">
            <label for="">Tgl Berangkat</label>
            <input type="date" name="tgl_berangkat">
          </div>
          <div class="room">
            <label for="">room</label>
            <input type="text" name="room">
          </div>
          <div class="jml-jamaah">
            <label for="">Jumlah Jamaah</label>
            <input type="number" name="jml_jamaah" required>
          </div>
          <div class="keterangan">
          <label for="">Keterangan</label>
          <textarea name="keterangan" rows="4" placeholder="Tulis keterangan jika ada..."></textarea>
          </div>
          <div class="button1">
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
          </div>
        </div>
        </form>
    </body>
    </html>
