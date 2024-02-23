@extends("layouts/contentNavbarLayout")

@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> Pilih Template
    </h4>

    @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-5" style="justify-content:center">
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card" style="width: 400px; height:530px">
                <div class="card-body">
                    <h5 class="card-title">
                        < 10jt</h5>
                            <img class="img-fluid" style="height: 400px; width: 370px"
                                src="{{ asset("assets/images/template1.png") }}">
                            <a href="/form-data" class="btn btn-outline-primary" style="float: right"><i
                                    class='bx bx-printer'></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card" style="width: 400px; height:530px">
                <div class="card-body">
                    <h5 class="card-title">
                        > 10jt</h5>
                    <img class="img-fluid" style="height: 400px; width: 370px"
                        src="{{ asset("assets/images/template2.png") }}">
                    <a href="/form-data" class="btn btn-outline-primary" style="float: right"><i
                            class='bx bx-printer'></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
