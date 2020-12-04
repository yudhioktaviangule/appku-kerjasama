@extends('layouts.main')
@section("crumb")
    <li class="breadcrumb-item active">403 Not Authorized User</li>
@endsection
@section("content")
<div class="error-page">
        <h2 class="headline text-danger">403</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Akses tidak diizinkan.</h3>

          <p>
            Maaf anda tidak memiliki akses ke menu ini
          </p>

          <form class="search-form">
            <div class="input-group">
              <a href="{{url('/home')}}" class="btn btn-link">Kembali ke Beranda</a>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
      </div>
@endsection
