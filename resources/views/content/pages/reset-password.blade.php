@extends("layouts/contentNavbarLayout")

@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Pengaturan Akun /</span> Ubah Kata Sandi
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
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-reset me-1"></i>
                        Ubah Kata Sandi</a></li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Ubah Kata Sandi </h5>
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="/pages/reset-password">
                        @csrf
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
                            <input class="form-control" type="password" id="current_password" name="current_password"
                                placeholder="Masukkan kata sandi saat ini">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="confirm_password" class="form-label">Konfirmasi kata sandi baru</label>
                                <input class="form-control" type="password" name="confirm_password" id="confirm_password"
                                    placeholder="Masukkan kata sandi baru">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="new_password" class="form-label">Kata sandi baru</label>
                                <input class="form-control" type="password" id="new_password" name="new_password"
                                    placeholder="Konfirmasi kata sandi baru">
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" name="send" class="btn btn-outline-primary" value="send"
                                style="float: right">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary me-2"
                                style="float: right">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
