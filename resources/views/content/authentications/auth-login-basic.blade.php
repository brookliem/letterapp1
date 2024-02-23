@extends("layouts/blankLayout")

@section("page-style")
    <!-- Page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
@endsection

@section("content")

    <body>
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        @if (session()->has("success"))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session("success") }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has("loginError"))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session("loginError") }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-7">
                        <p class="text-center h4 fw-bold mb-4 mx-1 mx-md-3 text-uppercase"
                            style="color:#fff;\">Letter
                            Application</p>
                        <form action="/login"
                            method="post">
                            @csrf
                            <!-- Email input -->
                        <div class="form-outline mb-4" style="width: 500px; margin-left:125px">
                            <label class="form-label" for="email" style="color:#fff;"> <i
                                    class="bi bi-person-circle"></i>
                                Email</label>
                            <input type="email" id="email"
                                class="form-control form-control-lg py-3 @error("email") is-invalid @enderror"
                                name="email" autocomplete="off" placeholder="Masukkan email" style="border-radius:15px ;"
                                required value="{{ old("email") }}">
                            @error("email")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4" style="width: 500px; margin-left:125px">
                            <label class="form-label" for="password" style="color:#fff;"><i
                                    class="bi bi-chat-left-dots-fill"></i>
                                Kata Sandi</label>
                            <input type="password" id="password" class="form-control form-control-lg py-3" name="password"
                                autocomplete="off" placeholder="Masukkan kata sandi" style="border-radius:15px ;" required>
                        </div>

                        <!-- Submit button -->
                        <!-- <button type="submit" class="btn btn-primary btn-lg">Login in</button> -->
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <input type="submit" value="Masuk" name="login"
                                class="btn btn-danger btn-lg text-light py-3"
                                style="width:50% ; border-radius: 15px; font-weight:600;" />
                        </div>
                        </form>
                        <p align="center" style="margin-bottom: 140px"> <a href="{{ "/forgot-password" }}" class="text"
                                style="font-weight:600;text-decoration:none; color:#fff">Forgot
                                password?</a></p>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>
@endsection
