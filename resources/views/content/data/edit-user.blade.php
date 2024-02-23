@extends("layouts/contentNavbarLayout")

@section("page-script")
    <script src="{{ asset("assets/js/pages-account-settings-account.js") }}"></script>
@endsection

@section("content")
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Data User / User Details /</span> Edit User
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit User</h5>
                <!-- Account -->
                <div class="card-body">
                    <form action="/details/edit-user" method="POST" onsubmit="return false">
                        @method("put")
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ $users->name }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-Mail</label>
                                <input class="form-control" type="email" name="email" id="email"
                                    value="{{ $users->email }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="division" class="form-label">Department</label>
                                <input class="form-control" type="department" id="department" name="department"
                                    value="{{ $users->department }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control" type="role" id="role" name="role">
                                    <option selected>{{ $users->role }}</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                        <a href="/data/details-user/{{ $users->id }}"><button type="button" name="back"
                                class="btn btn-danger" value="back">Back</button></a>
                        <button type="button" name="save" class="btn btn-primary" value="save">Save</button></a>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
