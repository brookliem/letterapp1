@extends("layouts/contentNavbarLayout")

@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Pengaturan Akun /</span> Tanda Tangan
    </h4>

    @if (session()->has("error"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session("error") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link" href="/akun-profil"><i class="bx bx-user me-1"></i>
                        Akun Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/edit-profile"><i class="bx bx-edit me-1"></i>
                        Edit Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/reset-password"><i class="bx bx-reset me-1"></i>
                        Ubah Kata Sandi</a></li>
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                            class="bx bxs-plus-circle me-1"></i>
                        Masukkan Tanda Tangan</a></li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Masukkan Tanda Tangan </h5>
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{ route("storetandatangan") }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="tandatangan" class="form-label">Tambah Tanda Tangan Anda</label>
                                <input class="form-control" type="file" id="tandatangan" name="tandatangan">
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" name="send" class="btn btn-outline-primary" style="float: right"
                                value="send">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary me-2"
                                style="float: right">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
