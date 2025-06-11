@extends('layouts.dashboard')

@section('title', 'Edit Katalog')

@section('content')
<div class="container-fluid">
  <h4 class="fw-bold mb-3">Edit Katalog Jasa Cuci</h4>

  <form action="{{ route('catalogs.update', $catalog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nama_jasa_cuci" class="form-label">Nama Jasa Cuci</label>
      <input type="text" name="nama_jasa_cuci" class="form-control" value="{{ $catalog->nama_jasa_cuci }}" required>
    </div>

    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" name="harga" class="form-control" value="{{ $catalog->harga }}" required>
    </div>

    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="3" required>{{ $catalog->deskripsi }}</textarea>
    </div>

    <div class="mb-3">
      <label for="gambar" class="form-label">Gambar (opsional)</label>
      <input type="file" name="gambar" class="form-control" accept="image/*">
      <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
      <div class="mt-2">
        <img src="{{ asset('storage/' . $catalog->gambar) }}" width="100">
      </div>
    </div>

    <button type="submit" class="btn btn-dark">Update</button>
    <a href="{{ route('catalogs.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
