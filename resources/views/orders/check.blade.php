@extends('layouts.landing')

@section('title', 'Cek Status Pesanan')

@section('content')
<div class="container" style="max-width: 900px;">
  <h4 class="fw-bold mb-4">Cek Daftar Pesanan</h4>

  <form action="{{ route('orders.showStatus') }}" method="POST" class="mb-4">
  @csrf
  <div class="row g-2 align-items-end">
    <div class="col-md-10">
      <label for="email_pemesan" class="form-label">Masukkan Email Pemesan</label>
      <input type="email" name="email_pemesan" class="form-control" placeholder="contoh@email.com" required>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Cek</button>
    </div>
    <div class="col-auto">
      <a href="{{ route('orders.check') }}" class="btn btn-secondary">Reset</a>
    </div>
  </div>
</form>

  @if(isset($orders) && count($orders) > 0)
    <h6 class="fw-bold">Hasil untuk: {{ $email }}</h6>
    <table class="table table-bordered mt-3">
      <thead class="table-light">
        <tr>
          <th>Nama Jasa</th>
          <th>Harga</th>
          <th>Tanggal Pesan</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td>{{ $order->catalog->nama_jasa_cuci }}</td>
          <td>Rp. {{ number_format($order->catalog->harga, 0, ',', '.') }}</td>
          <td>{{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('d M Y') }}</td>
          <td>{{ $order->status }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @elseif(isset($orders))
    <div class="alert alert-warning">Tidak ada pesanan ditemukan untuk email tersebut.</div>
  @endif
</div>
@endsection
