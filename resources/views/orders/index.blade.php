@extends('layouts.dashboard')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container-fluid">
  <h4 class="fw-bold mb-4">DAFTAR PESANAN</h4>

  <table class="table table-bordered table-striped text-center align-middle">
    <thead class="table-light">
      <tr>
        <th>No</th>
        <th>ID Pesanan</th>
        <th>Email Pemesan</th>
        <th>Tipe Jasa Cuci</th>
        <th>Tanggal Pesan</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($orders as $index => $order)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $order->id }}</td>
          <td>{{ $order->email_pemesan }}</td>
          <td>{{ $order->catalog->nama_jasa_cuci ?? '-' }}</td>
          <td>{{ $order->tanggal_pesan }}</td>
          <td>
            <form action="{{ route('orders.update', $order->id) }}" method="POST">
              @csrf
              @method('PUT')
              <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                @foreach(['Menunggu', 'Terkonfirmasi', 'Menjemput', 'Proses', 'Antar', 'Selesai'] as $status)
                  <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                    {{ $status }}
                  </option>
                @endforeach
              </select>
            </form>
          </td>
          <td>
            <div class="d-flex justify-content-center">
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </td>
        </tr>
      @empty
        <tr>
          <td colspan="7">Belum ada pesanan masuk.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
