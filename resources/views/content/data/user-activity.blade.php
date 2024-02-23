@extends("layouts/contentNavbarLayout")


@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Maintenance /</span> User Activity
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
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-history'></i>
                        User Activity</a></li>
            </ul>

            <div class="card mb-4">
                <h5 class="card-header" style="font-size:19.5px">User Activity</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>IM Number</th>
                                    <th>Name</th>
                                    <th>File</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><span class="badge bg-label-success me-1">Finish</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-danger" style="width: 60; font-size:10px;"
                                                data-bs-toggle="dropdown">Action</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-edit-alt me-1"></i> Details</a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
