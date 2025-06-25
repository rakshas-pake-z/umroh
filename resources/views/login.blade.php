<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Admin Loket - Umroh & Haji</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
  <body>
        <img class="qris" src="qris.png" alt="">
        <img class="pospay" src="pospay.png" alt="">
        <img class="andalus" src="andalus.png" alt="">
        <img class="kanpos" src="kanpos.png" alt="">
        <div class="line"></div>
        <div class="header-container">
    </div>
        <div class="login-container">
          <h2>Masuk</h2>
          <br>
          <form action="{{ route('post.login') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Email atau Username" required />
            <input type="password" name="password" placeholder="Kata Sandi" required />
            <button type="submit">Masuk</button>
          </form>
        </div>
        <div class="kotak1"></div>
        <div class="kotak2"></div>
  </body>
  </html>
