@extends('layouts/main')
@section('title','Form Ubah Password')
@section('artikel')
<div class="container"> @if (session('info'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('info') }}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <form action="/updateuser" method="post" class="action">
        @csrf  
        <div class="form-group">
            <label for="password">Password lama</label>
            <input type="password" name="password_lama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password baru</label>
            <input type="password" name="password_baru" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">confirmasi Password baru</label>
            <input type="password" name="confirmasi_password" class="form-control" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"> Update </button>
        </div>

    </form>
    
@endsection