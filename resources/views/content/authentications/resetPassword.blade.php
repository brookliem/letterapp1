@extends("layouts/blankLayout")
<link rel="icon" type="image/x-icon" href="{{ asset("assets/img/favicon/favicon.ico") }}" />
@section("page-style")
    <link rel="stylesheet" href="{{ asset("assets/vendor/css/pages/page-auth.css") }}">
@endsection

@section("content")

    <body>
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    @if (session()->has("error"))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session("error") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center h4 fw-bold mb-4 mx-1 mx-md-3 mt-2 text-uppercase" style="color: black">
                                Reset Kata Sandi
                            </h4>
                            <form class="mb-3 needs-validation" method="POST"
                                action="{{ url("/reset", ["token" => $token]) }}">

                                {{ csrf_field() }}

                                @if (session("status"))
                                    <div class="alert alert-success">
                                        {{ session("status") }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="password" class="form-label" style="color: black">Kata Sandi Baru</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan kata sandi" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <label for="konfirmasipassword" class="form-label" style="color: black">Konfirmasi Kata
                                        Sandi</label>
                                    <input type="password" class="form-control" id="konfirmasipassword"
                                        name="konfirmasipassword" placeholder="Konfirmasi kata sandi" autofocus required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
