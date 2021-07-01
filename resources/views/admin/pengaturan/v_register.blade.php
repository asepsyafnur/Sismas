@extends('admin/templates/v_default')
@section('title', 'Ippmp | register')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title text-bold">Register User</h3>
                    </div>
                    <div class="card">
                        @if(auth()->user()->level == 'admin')
                        <div class="card-body register-card-body">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <select name="level" class="form-control @error('level') is-invalid @enderror" name="level">
                                        <option value="{{null}}">-- Pilih --</option>
                                        <option value="ketua">Ketua</option>
                                        <option value="sekretaris">Sekretaris</option>
                                        <option value="keorganisasian">Keorganisasian</option>
                                        <option value="humas">Humas</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-address-card"></span>
                                        </div>
                                    </div>
                                    @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>*{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ old('name') }}" autocomplete="name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>*{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>*{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>*{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-auto">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @else
                            <h1>ANDA TIDAK MEMILIKI HAK AKSES UNTUK KE HALAMAN INI</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection