@extends("layouts/contentNavbarLayout")

@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Data /</span> Kirim Data
    </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Isi kolom dibawah ini</h5>

                <div class="card-body">
                    <form action="/kirim-data" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="input mb-3">
                            <label for="imnumber" class="form-label">Nomor IM</label>
                            <input type="text" class="form-control" id="imnumber" name="imnumber">
                        </div>

                        <div class="input mb-3">
                            <label for="file" class="form-label">File</label>
                            <input class="form-control form-control" name="file" id="file" type="file">
                        </div>

                        <div class="input mb-3">
                            <label for="date" class="form-label">Tanggal dikirim</label>
                            <input class="datepicker-here form-control digits" name="date" id="date" type="date">
                        </div>

                        <div class="input mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" class="form-control" name="description"></textarea>
                        </div>
                        <a href="/"><button type="button" name="back" class="btn btn-outline-danger"
                                value="back">Kembali</button></a>
                        <button type="submit" name="send" class="btn btn-outline-primary" value="send"
                            style="float:right">Kirim</button>
                        <button type="reset" class="btn btn-outline-secondary me-2" style="float:right">Batal</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
