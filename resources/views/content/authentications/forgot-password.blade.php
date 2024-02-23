@extends("layouts/blankLayout")
<link rel="icon" type="image/x-icon" href="{{ asset("assets/img/favicon/favicon.ico") }}" />
@section("page-style")
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset("assets/vendor/css/pages/page-auth.css") }}">
@endsection

@section("content")

    <body>
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    <div class="alert">
                        @if (session()->has("success"))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session("success") }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has("error"))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session("error") }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <!-- Forgot Password -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center h4 fw-bold mb-4 mx-1 mx-md-3 mt-2 text-uppercase" style="color: black">
                                Lupa Kata Sandi
                            </h4>
                            <p class="mb-4" style="color: black">
                                Masukkan email anda, dan tunggu link reset kata sandi dikirim.
                            </p>
                            <form class="login-validation mb-3" method="POST" novalidate="" action="/forgot-password">
                                @csrf

                                @if (session("status"))
                                    <div class="alert alert-success">
                                        {{ session("status") }}
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="email" class="form-label" style="color: black">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan email anda" autofocus>
                                    <span class="text-danger">
                                        @error("email")
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-warning d-grid w-100">Kirim Link Reset</button>
                            </form>
                            <div class="text-center">
                                <p align="center" style="margin-bottom: 2px"><a href="/login" class="text-warning"
                                        style="font-weight:600;text-decoration:none;"><i class='bx bx-left-arrow-circle'
                                            style="margin-bottom: 1px"></i>Kembali ke Login</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /Forgot Password -->
                </div>
            </div>
        </div>
    @endsection
</body>
<!--@include("_partials.macros", ["width" => 25, "withbg" => "#696cff"])-->
