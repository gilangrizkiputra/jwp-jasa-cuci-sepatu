@extends('layouts.landing')

@section('title', 'Detail Jasa Pencucian')

@section('content')
<div class="container" style="max-width: 1200px; padding-left: 80px; padding-right: 80px;">
  <div class="row">
    {{-- Kiri --}}
    <div class="col-md-7">
      <img src="{{ asset('storage/' . $catalog->gambar) }}" class="img-fluid mb-4" alt="Gambar">
      <h4 class="fw-bold">{{ $catalog->nama_jasa_cuci }}</h4>
      <p class="fw-bold">Rp. {{ number_format($catalog->harga, 0, ',', '.') }}</p>
      <h6 class="fw-bold mt-4">Deskripsi</h6>
      <p>{{ $catalog->deskripsi }}</p>
    </div>

   {{-- Kanan --}}
    <div class="col-md-5">
    <div class="p-4 rounded bg-light">
        <p>Jika kamu tertarik untuk melakukan pencucian sepatu pada toko kami, harap masukkan Email pada form di bawah ini! Lalu Kirim! Proses pemesanan dan komunikasi akan dilakukan melalui email atau whatsapp.</p>

        <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <input type="hidden" name="katalog_id" value="{{ $catalog->id }}">

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email_pemesan" class="form-control" placeholder="Masukkan Email" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Pesan</button>
        </form>
    </div>
    </div>

  </div>
</div>
@endsection
