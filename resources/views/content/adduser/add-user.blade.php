@extends("layouts/contentWithoutNavbar")

@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Master /</span> Tambah Pengguna
    </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Pengguna</h5>
                <!-- Account -->
                <div class="card-body">
                    <form action="/tambah-pengguna" method="POST">
                        @csrf
                        <div class="input mb-3">
                            <label for="name" class="form-label">Nama Pengguna</label>
                            <input class="form-control" type="name" id="name" name="name">
                            @error("name")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input mb-3">
                            <label for="department" class="form-label">Departemen</label>
                            <input class="form-control" type="department" id="department" name="department">
                            @error("department")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" type="role" id="role" name="role">
                                <option selected>Pilih Role</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                                <option value="Master">Master</option>
                            </select>
                            @error("role")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input class="form-control" type="email" name="email" id="email">
                            @error("email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input class="form-control" type="password" name="password" id="password">
                            @error("password")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="submit"
                            style="float: right; margin-right:5px">Tambah</button>
                        <button type="reset" class="btn btn-outline-secondary me-2" style="float: right;">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
