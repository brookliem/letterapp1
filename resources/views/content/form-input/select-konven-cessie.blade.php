@extends("layouts/contentNavbarLayout")

@section("page-style")
    <link rel="stylesheet" href="/assets/css/konvencessie.css">
@endsection

@section("content")
    <h4 class="fw-bold py-3 mb-4" style="margin-left: 1px">
        <span class="text-muted fw-light">Surat Pemberitahuan Cessie / Konven / </span> Select Forms
    </h4>

    @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-5" style="justify-content:center">
        <div class="col-lg-6">
            <div class="card" style="width: 600px; height:200px; margin-top:120px; border: 1px solid #000;">
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center; font-size:25px">
                        SURAT PEMBERITAHUAN CESSIE: <br> KONVEN
                    </h5>
                    <div class="button"
                        style="display:flex; flex-direction:row; gap:26px; justify-content:center; margin-top:30px">
                        <a href="/select_konven_cessie_sebelum"><button class="btn btn-danger"
                                style="width: 250px">SEBELUM</button></a>
                        <a href="/select_konven_cessie_setelah"><button class="btn btn-danger"
                                style="width: 250px">SETELAH</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
