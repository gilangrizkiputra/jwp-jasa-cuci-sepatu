@extends('layouts.landing')

@section('title', 'Landing Page')

@if (session('success'))
  <div id="popupAlert" class="position-fixed top-0 start-50 translate-middle-x mt-3 alert alert-success shadow" style="z-index: 9999;">
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
    }, 3000); // 3 detik
  </script>
@endif

@section('hero')
<section class="hero-gradient text-white d-flex align-items-center" style="min-height: 75vh;">
  <div class="container-lg" style="padding-left: 80px; padding-right: 80px;">
    <h1 class="fw-bold">JASA CUCI SEPATU</h1>
    <p class="fw-semibold">Pasti bersih dan cepat</p>
    <p>Kami menyediakan layanan cuci sepatu profesional dengan proses yang higienis dan cepat. Dengan peralatan modern dan bahan pembersih berkualitas, sepatu Anda akan kembali bersih, wangi, dan tampak seperti baru. Cocok untuk semua jenis sepatu, mulai dari sneakers, boots, hingga sepatu kerja. Percayakan perawatan sepatu Anda pada tim kami yang berpengalaman. Kami memastikan kualitas terbaik dengan harga yang terjangkau dan pelayanan yang ramah.</p>
  </div>
</section>
@endsection

@section('content')
  <div class="container px-4" style="max-width: 1200px; margin: auto;">
  <h4 class="fw-bold text-decoration-underline mb-4">Jasa Pencucian</h4>
</div>
  <div class="container pt-2 px-4" style="max-width: 1200px; margin: auto;">
  <div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($catalogs as $catalog)
      <div class="col">
        <a href="{{ route('catalogs.show', $catalog->id) }}" class="text-decoration-none text-dark">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $catalog->gambar) }}" class="card-img-top" alt="Image">
                <div class="card-body">
                <h6 class="fw-bold">{{ $catalog->nama_jasa_cuci }}</h6>
                <p class="fw-bold">Rp. {{ number_format($catalog->harga, 0, ',', '.') }}</p>
                <p class="card-text text-muted" style="font-size: 14px;">{{ \Illuminate\Support\Str::limit($catalog->deskripsi, 180) }}</p>
                </div>
            </div>
            </a>
      </div>
    @endforeach
  </div>
</div>

@endsection
