@extends("layouts/contentNavbarLayout")

@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Pengaturan Akun /</span> Profil
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
                        Akun Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/edit-profile"><i class="bx bx-edit me-1"></i>
                        Edit Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/reset-password"><i class="bx bx-reset me-1"></i>
                        Ubah Kata Sandi</a></li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Detail Profil</h5>
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ !empty($profile->image) ? url("upload/user-images/" . $profile->image) : url("upload/user-images/default.png") }}"
                            alt="user-avatar" class="d-block rounded" height="170" width="170"
                            style="margin-top: -12px" />
                        <div class="row">
                            <div class="profile" style="font-size:17px;">
                                <p>
                                    Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    @auth
                                    {{ auth()->user()->name }} @endauth
                                </p>
                                <p>
                                    Departemen&nbsp;: @auth {{ auth()->user()->department }} @endauth
                                </p>
                                <p>
                                    Role
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    @auth
                                    {{ auth()->user()->role }} @endauth
                                </p>
                                <p>
                                    Email
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    @auth {{ auth()->user()->email }} @endauth
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
