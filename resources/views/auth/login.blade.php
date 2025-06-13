@extends('layouts.app')

@section('title', 'Login')

@push('styles')
<style>
  .login-wrapper {
    display: flex;
    min-height: 100vh;
  }
  .left-side {
    flex: 1;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .right-side {
    flex: 1;
    background: #e0e0e0;
    padding: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .circle-img {
    width: 250px;
    height: 250px;
    border-radius: 50%;
    background: #ccc;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
  }
</style>
@endpush

@section('content')
<div class="login-wrapper">
  <div class="left-side bg-light">
    <div class="circle-img bg-primary"><h1 class="text-white font-weight-bold">JCS</h1></div>
  </div>
  <div class="right-side bg-primary">
    <h4 class="fw-bold text-white">JASA</h4>
    <p class="text-uppercase mb-4 text-white" style="font-size: 12px;">Cuci Sepatu Daerah Bekasi</p>
    <h5 class="mb-3 fw-bold text-white">LOGIN</h5>

    <form action="{{ route('login.submit') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label text-white">Username</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label text-white">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-dark w-100">Log In</button>
    </form>
  </div>
</div>
@endsection
