@extends("layouts/contentWithoutNavbar")

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .badge {
        padding: 5px 10px;
        border-radius: 3px;
        font-size: 14px;
    }

    .badge-primary {
        background-color: #3490dc;
        color: #ffffff;
    }

    .badge-success {
        background-color: #38c172;
        color: #ffffff;
    }

    .badge-danger {
        background-color: #e3342f;
        color: #ffffff;
    }
</style>

@section("content")
    <h4 class="fw-bold py-3 mb-4">
        Dashboard
    </h4>

    @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <h5 class="card-header">Data</h5>
        <div class="card-body">
            <div class="row justify-content-between align-items-center" style="float: right">
                <div class="search">
                    <form action="{{ url("/") }}" method="GET" class="d-flex">
                        <div class="input-group" style="width: 280px; right:-2px">
                            <input type="text" class="form-control" name="search" placeholder="Search Data"
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
                            <th>Nomor Surat</th>
                            <th style="width: 280px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konven_cessie_sebelums as $key => $data)
                            <tr>

                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data["nomorsurat"] }}</td>
                                <td>
                                    <div class="actions">
                                        <button type="button" class="btn btn-info" style="width: 75px; font-size:10px;"
                                            data-bs-toggle="dropdown">Action</button>
                                        <div class="dropdown-menu">
                                            <a id="set_dtl" class="btn btn-default dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-detail" data-nomorsurat="<?= $data->nomorsurat ?>"
                                                data-dibuatoleh="<?= $data->dibuatoleh ?>"
                                                data-perihal="<?= $data->perihal ?>"
                                                data-deskripsi="<?= $data->deskripsi ?>" data-date="<?= $data->date ?>"
                                                data-status="<?= $data->status ?>">
                                                <i class='bx bxs-detail me-1'></i>Detail
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex" style="margin-top: 15px; float:right">
                    {!! $konven_cessie_sebelums->links() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Details</h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th style="">Nomor IM</th>
                                <td><span id="nomorsurat"></span></td>
                            </tr>
                            <tr>
                                <th>Nama Pembuat</th>
                                <td><span id="dibuatoleh"></span></td>
                            </tr>
                            <tr>
                                <th>Nama File</th>
                                <td><span id="perihal"></span></td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td><span id="deskripsi"></span></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengiriman</th>
                                <td><span id="date"></span></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><span id="status"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#set_dtl', function() {
                var nomorsurat = $(this).data('nomorsurat');
                var dibuatoleh = $(this).data('dibuatoleh');
                var perihal = $(this).data('perihal');
                var deskripsi = $(this).data('deskripsi');
                var date = $(this).data('date');
                var status = $(this).data('status');
                $('#imnumber').text(imnumber);
                $('#dibuatoleh').text(dibuatoleh);
                $('#perihal').text(perihal);
                $('#deskripsi').text(deskripsi);
                $('#date').text(date);
                $('#status').text(status);
            });

        });
    </script>
@endsection
