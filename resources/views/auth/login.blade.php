@extends('layouts.main')

@section('content')
<div class="container mt-5 pt-3 rounded-4">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden rounded-4 shadow-lg my-5">
                <div class="card-body p-0">

                    {{-- TODO: ubah tampilan pesan error email dan password --}}
                    {{-- pesan error, email tidak terdaftar --}}
                    @if (Session::has('errorEmail'))
                    <h1>{{ Session::get('errorEmail') }}</h1>
                    @endif

                    {{-- pesan error, password tidak terdaftar --}}
                    @if (Session::has('errorPassword'))
                    <h1>{{ Session::get('errorPassword') }}</h1>
                    @endif

                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <img class="px-3 mt-4 mb-4" style="width: 120%" src={{ asset('img/parkirlogin.jpg ') }} alt="..." />
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="text-gray-900 mb-4 fw-bold">
                                        Login
                                        <i class="fas fa-sign-in-alt"></i>
                                    </h1>
                                </div>
                                <form class="user" action="auth/login" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputemail" class="form-label fw-bold">Email</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Masukan Email Anda" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputpass" class="form-label fw-bold">Password</label>
                                        <input type="password" id="password" name="password" class="form-control form-control-user" placeholder="Masukan Password" />
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr />
                                <div class="text-center">
                                    <p class="small">Selamat Datang di Halaman Login Pakiran Simpati
                                        <p />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection