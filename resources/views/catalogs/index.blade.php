@extends('layouts.dashboard')

@section('title', 'Katalog Jasa Pencucian')

@section('content')
<div class="container-fluid">
  <h4 class="fw-bold mb-0">KATALOG JASA PENCUCIAN</h4>

  <a href="{{ route('catalogs.create') }}" class="btn btn-primary mb-3 float-end">Tambah</a>

  <table class="table table-bordered table-striped text-center align-middle">
    <thead class="table-light">
      <tr>
        <th>No</th>
        <th>ID Tipe Pencucian</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($catalogs as $index => $catalog)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $catalog->id }}</td>
          <td><img src="{{ asset('storage/' . $catalog->gambar) }}" width="60" /></td>
          <td>{{ $catalog->nama_jasa_cuci }}</td>
          <td>Rp {{ number_format($catalog->harga, 0, ',', '.') }}</td>
          <td><div class="limit-2-lines">{{ $catalog->deskripsi }}</div></td>
            <td>
            <div class="d-flex gap-1">
                <a href="{{ route('catalogs.edit', $catalog->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('catalogs.destroy', $catalog->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </div>
            </td>
        </tr>
      @empty
        <tr>
          <td colspan="7">Belum ada katalog.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
