<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Jasa Cuci Sepatu')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
    height: 100%;
    margin: 0;
    }

    body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    }

    main {
    flex: 1;
    }

    .hero {
      background-color: #888;
      color: white;
      padding: 100px 40px;
    }

     .hero-gradient {
    background: linear-gradient(135deg, #1e88e5, #42a5f5);
    min-height: 100vh;
    }

    .underline-title {
      border-bottom: 2px solid black;
      display: inline-block;
      margin-bottom: 30px;
    }

    .whatsapp-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #25D366;
      color: white;
      padding: 15px 25px;
      border: none;
      border-radius: 10px;
      font-weight: bold;
      z-index: 999;
    }

    .footer {
      background-color: #888;
      color: white;
      text-align: center;
      padding: 20px 0;
      margin-top: 50px;
    }
  </style>
  @stack('styles')
</head>
<body>

 {{-- Navbar --}}
<nav class="d-flex justify-content-between align-items-center px-4 py-3 bg-primary" style="height: 70px;">
  <div class="fw-bold text-white">
    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold">JCS</a>
  </div>
  <div class="d-flex gap-3">
    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold">Beranda</a>
    <a href="{{ route('about') }}" class="text-white text-decoration-none fw-bold">Tentang Kami</a>
    <a href="{{ route('login') }}" class="text-white text-decoration-none fw-bold">Login</a>
  </div>
</nav>


  {{-- Hero --}}
  @hasSection('hero')
  @yield('hero')
  @endif

  {{-- Main Content --}}
  <main class="container py-5">
  @yield('content')
  </main>


{{-- Footer --}}
<footer class="bg-primary text-white text-center py-3">
  <p class="fw-bold mb-0">Pasti bersih dan cepat</p>
</footer>


  {{-- WhatsApp Button --}}
  <a href="https://wa.me/6285810393460" target="_blank" class="whatsapp-btn">Whatsapp</a>

</body>
</html>
