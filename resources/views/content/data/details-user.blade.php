@extends("layouts/contentNavbarLayout")


@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menejemen Pengguna /</span> Detail
    </h4>

    @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                        Detail Pengguna</a></li>
            </ul>

            <div class="card mb-4">
                <h5 class="card-header" style="font-size:19.5px">Detail Pengguna</h5>
                <div class="card-body">


                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ !empty($users->image) ? url("upload/user-images/" . $users->image) : url("upload/default.png") }}"
                            alt="user-avatar" class="d-block rounded" height="170" width="170" id="uploadedAvatar"
                            style="margin-top: -30px" />

                        <div class="card-body">
                            <div class="mb-3" style="font-size:16.5px; margin-top:-19px">
                                <p>
                                    Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $users->name }}
                                </p>
                                <p>
                                    Departemen &nbsp;: {{ $users->department }}
                                </p>
                                <p>
                                    Role
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $users->role }}
                                </p>
                                <p>
                                    Email
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $users->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="button" style="margin-top: -5px">
                        <a href="/data-pengguna"><button type="button" name="back" class="btn btn-outline-danger btn-sm"
                                value="back">Kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
