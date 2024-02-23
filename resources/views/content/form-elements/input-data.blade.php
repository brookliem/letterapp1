@extends("layouts/contentNavbarLayout")

@section("content")

    <body>
        <div class=" col-4">
            <div class="card">
                <h5 class="card-header text-center">Buat Internal Memo</h5>
                <div class="card-body d-flex justify-content-center">
                    <p style="margin-left: 5px">Masukkan data untuk melengkapi format pdf melalui form input
                        disini</p>
                </div>
                <a href="/form-data">
                    <button type="button" class="btn btn-primary text-uppercase" style="height: 43px; float: right;">
                        Tambah
                    </button>
                </a>
            </div>
        </div>
        </div>
    </body>
@endsection
