<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .sidebar {
      width: 220px;
      background: #0d6efd;
      color: white;
      min-height: 100vh;
      position: fixed;
    }
    .sidebar a {
      display: block;
      padding: 12px 20px;
      text-decoration: none;
      color: white;
    }
    .sidebar a.active {
      font-weight: bold;
    }
    .main {
      margin-left: 220px;
      padding: 30px;
    }
    .topbar {
    background: #0d6efd;
    color: white;
    margin-left: 220px;
    width: calc(100% - 220px);
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: end;
    padding: 0 20px;
    }
    .limit-2-lines {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    }
  </style>
  @stack('styles')
</head>
<body>
  <div class="sidebar d-flex flex-column justify-content-between">
    <div>
      <div class="text-center fw-bold py-4">JASA CUCI SEPATU</div>
      <a href="{{ route('orders.index') }}" class="{{ request()->is('orders*') ? 'active' : '' }}">Pesanan</a>
      <a href="{{ route('catalogs.index') }}" class="{{ request()->is('catalogs*') ? 'active' : '' }}">Katalog Jasa Pencucian</a>
    </div>
  </div>

  {{-- TOPBAR diletakkan setelah sidebar --}}
  <div class="topbar">
    <div class="d-flex justify-content-end align-items-center px-4 py-2">
      <strong class="me-3">{{ Auth::user()->name }}</strong>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
      </form>
    </div>
  </div>

  <div class="main">
   @if (session('success'))
    <div id="popupAlert" class="alert alert-success position-fixed top-0 start-50 translate-middle-x mt-3 shadow" style="z-index: 9999; width: auto;">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
        const alert = document.getElementById('popupAlert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }
        }, 3000);
    </script>
    @endif

    @yield('content')
  </div>
</body>

</html>
