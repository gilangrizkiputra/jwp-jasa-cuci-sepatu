@extends('layouts.dashboard')

@section('title', 'Tambah Katalog')

@section('content')
<div class="container-fluid">
  <h4 class="fw-bold mb-3">Tambah Katalog Jasa Cuci</h4>

  <form action="{{ route('catalogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="nama_jasa_cuci" class="form-label">Nama Jasa Cuci</label>
      <input type="text" name="nama_jasa_cuci" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label for="gambar" class="form-label">Gambar</label>
      <input type="file" name="gambar" class="form-control" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-dark">Simpan</button>
    <a href="{{ route('catalogs.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
