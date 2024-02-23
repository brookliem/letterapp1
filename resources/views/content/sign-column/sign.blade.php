@extends("layouts/contentNavbarLayout")


@section("content")
    <h4 class="fw-bold py-3 mb-4">
        Tanda Tangan
    </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4" style="width:300px; margin:auto">
                <h5 class="card-header"></h5>

                <div class="card-body">
                    <form action="/persetujuan" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <button type="submit" name="send" class="btn btn-outline-primary btn-sm" value="send"
                                    style="width: 100px; height:45px">Tanda Tangan</button>
                            </div>
                            <div class="mb-3 col-md-6">
                                <button type="submit" name="send" class="btn btn-outline-danger btn-sm" value="send"
                                    style="float:right; width: 100px; height:45px">Tolak</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="/">
                <p style="text-align:center; text-decoration:underline">Kembali</p>
            </a>
        </div>
    </div>
@endsection
