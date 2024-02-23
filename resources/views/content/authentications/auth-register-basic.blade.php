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
                        <img src="/assets/images/img2.png" class="img-fluid" alt="Phone image" height="300px"
                            width="500px">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <p class="text-center h4 fw-bold mb-4 mx-1 mx-md-3">REGISTER</p>

                        <form action="/auth/register-basic" method="post">
                            @csrf
                            <!-- Username input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name" style="color:#fff;"> <i
                                        class="bi bi-person-circle"></i>
                                    Name</label>
                                <input type="name" id="name"
                                    class="form-control form-control-lg py-3 @error("name") is-invalid @enderror"
                                    name="name" autocomplete="off" placeholder="enter your name"
                                    style="border-radius:25px ;" required value="{{ old("name") }}">

                                @error("name")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- division -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="division" style="color:#fff;"> <i
                                        class="bi bi-person-circle"></i>
                                    Division</label>
                                <input type="division" id="division"
                                    class="form-control form-control-lg py-3 @error("division") is-invalid @enderror"
                                    name="division" autocomplete="off" placeholder="enter your division"
                                    style="border-radius:25px ;" required value="{{ old("division") }}">

                                @error("division")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- division -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="role" style="color:#fff;"> <i
                                        class="bi bi-person-circle"></i>
                                    Role</label>
                                <input type="role" id="role"
                                    class="form-control form-control-lg py-3 @error("role") is-invalid @enderror"
                                    name="role" autocomplete="off" placeholder="enter your role"
                                    style="border-radius:25px ;" required value="{{ old("role") }}">

                                @error("division")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email" style="color:#fff;"> <i
                                        class="bi bi-person-circle"></i>
                                    Your Email</label>
                                <input type="email" id="email"
                                    class="form-control form-control-lg py-3 @error("email") is-invalid @enderror"
                                    name="email" autocomplete="off" placeholder="enter your e-mail"
                                    style="border-radius:25px ;" required value="{{ old("email") }}">

                                @error("email")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password" style="color:#fff;"><i
                                        class="bi bi-chat-left-dots-fill"></i>
                                    Password</label>
                                <input type="password" id="password"
                                    class="form-control form-control-lg py-3 @error("password") is-invalid @enderror"
                                    name="password" autocomplete="off" placeholder="enter your password"
                                    style="border-radius:25px ;" required value="{{ old("password") }}">

                                @error("password")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Submit button -->
                            <!-- <button type="submit" class="btn btn-primary btn-lg">Login in</button> -->
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <input type="submit" value="Register" class="btn btn-warning btn-lg text-light py-3"
                                    style="width:50% ; border-radius: 30px; font-weight:600;">
                            </div>
                        </form>
                        <p align="center">Already registered? <a href="/auth/login-basic" class="text-warning"
                                style="font-weight:600; text-decoration:none;">Login</a></p>
                    </div>
                </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>
@endsection
