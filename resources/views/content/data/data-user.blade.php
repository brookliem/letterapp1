@extends("layouts/contentNavbarLayout")

@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Master /</span> Data Pengguna
    </h4>

    @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between align-items-center" style="float:right">
                <div class="col-9 col-lg-8 d-md-flex">
                    <form action="{{ url("/data-pengguna") }}" method="GET" class="d-flex">
                        <div class="input-group" style="width: 280px; right:-2px">
                            <input type="text" class="form-control" name="search" placeholder="Cari"
                                value="{{ $search }}">
                            <button type="submit" class="btn btn-outline-primary"><i class="bx bx-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <br>
            <div class="table-responsive text-nowrap mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <th scope="user">{{ $no++ }}</th>
                                <td>{{ $user["name"] }}</td>
                                <td><b>{{ $user["role"] }}</b></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-info" style="width: 60; font-size:10px;"
                                            data-bs-toggle="dropdown">Action</button>
                                        <div class="dropdown-menu">
                                            <a href="/detail/{{ $user->id }}" class="dropdown-item"
                                                href="javascript:void(0);"><i class='bx bxs-user-detail'></i></i>
                                                Detail</a>
                                            <a href="datauser/delete/{{ $user->id }}" class="dropdown-item"><i
                                                    class="bx bx-trash me-1"></i>
                                                Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex" style="margin-top: 15px; float:right">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
