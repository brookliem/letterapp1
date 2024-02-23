@extends("layouts/contentNavbarLayout")

@section("page-script")
    <script src="{{ asset("assets/js/pages-account-settings-account.js") }}"></script>
@endsection

@section("content")
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Pengaturan Akun /</span> Edit Profil
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link" href="/akun-profil"><i class="bx bx-user me-1"></i>
                        Akun Profil</a></li>
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-edit me-1"></i>
                        Edit Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/reset-password"><i class="bx bx-reset me-1"></i>
                        Ubah Kata Sandi</a></li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Edit Profil </h5>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="/pages/edit-profile">
                        @csrf
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ !empty($editUser->image) ? url("upload/user-images/" . $editUser->image) : url("upload/default.png") }}"
                                alt="user-avatar" class="d-block rounded" height="210" width="220"
                                style="margin-top: 2px" id="showImage" />
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ $editUser->name }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="department" class="form-label">Departemen</label>
                                    <input class="form-control" type="department" id="department" name="department"
                                        value="{{ $editUser->department }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control form-control" type="email" name="email" id="email"
                                        value="{{ $editUser->email }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="image" class="form-label">Ubah Foto</label>
                                    <input name="image" class="form-control" type="file" id="image">
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-outline-primary" value="Update Profile"
                                        style="float: right">Perbarui
                                        Profil</button>
                                    <button type="reset" class="btn btn-outline-secondary me-2"
                                        style="float: right">Batal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
