@extends("layouts/contentWithoutNavbar")

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@section("content")

    <body>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link active" href="/form-data"><i class="bx bx-folder-plus me-1"></i>
                            Data</a></li>
                </ul>
                <div class="card mb-4">
                    <div>
                        <h5 class="card-header">Masukkan Data</h5>
                        <p><span style="color: red; float:left; margin-left: 23px">*Wajib Diisi</span></p>
                    </div>
                    <div class="card-body">
                        <form action="/form-data" method="POST" id="formData" enctype="multipart/form-data">
                            @csrf
                            <!--IM Number-->
                            <div class="mb-3">
                                <label for="imnumber" class="form-label">Nomor Internal Memo</label>
                                <input class="form-control" name="imnumber" id="imnumber" type="text"
                                    value="{{ $newCode }}" disabled>
                            </div>
                            <div class="row">
                                <!--Date-->
                                <div class="mb-3 col-md-6">
                                    <label for="date" class="form-label">Tanggal Dibuat <span
                                            style="color: red">*</span></label>
                                    <input class="datepicker-here form-control digits" name="date" id="date"
                                        type="date" required>
                                </div>
                                <!--Lampiran-->
                                <div class="mb-3 col-md-6">
                                    <label for="lampiran" class="form-label">Lampiran <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="lampiran" name="lampiran" required>
                                </div>
                                <!--Perihal-->
                                <div class="mb-3 col-md-6">
                                    <label for="perihal" class="form-label">Perihal <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="perihal" name="perihal" required>
                                </div>
                                <!--Kepada-->
                                <div class="mb-3 col-md-6">
                                    <label for="kepada" class="form-label">Kepada <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="kepada" name="kepada" required>
                                </div>
                            </div>

                            <!--Deskripsi-->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi <span
                                        style="color: red">*</span></label>
                                <textarea id="deskripsi" class="form-control" name="deskripsi" required></textarea>
                            </div>

                            <hr size="3px" style="color: rgb(154, 154, 154)">

                            <h5>Masukkan data barang yang ingin diajukan</h5>
                            <div class="form-group-barang">
                                <h5>1</h5>
                                <div class="row">
                                    <!-- Nama Barang -->
                                    <div class="mb-3 col-md-6">
                                        <label for="namabarang" class="form-label">Nama Barang <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="namabarang" name="namabarang[]"
                                            required>
                                    </div>
                                    <!-- Jumlah -->
                                    <div class="mb-3 col-md-6">
                                        <label for="jumlah" class="form-label">Jumlah <span
                                                style="color: red">*</span></label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah[]" required>
                                    </div>
                                    <!-- Satuan -->
                                    <div class="mb-3 col-md-6">
                                        <label for="satuan" class="form-label">Satuan <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="satuan" name="satuan[]" required>
                                    </div>
                                    <!-- Harga -->
                                    <div class=" mb-3 col-md-6">
                                        <label for="harga" class="form-label">Harga<span
                                                style="color: red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" style="border-radius: 5px 0 0 5px">Rp
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="harga" name="harga[]"
                                                oninput="formatNumber(this)" placeholder="1.000.000" required>
                                        </div>
                                    </div>
                                    <!-- Keterangan -->
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan <span
                                                style="color: red">*</span></label>
                                        <textarea class="form-control" id="keterangan" name="keterangan[]" required></textarea>
                                    </div>
                                </div>
                                <hr>
                            </div>


                            <div class="form-group-buttons-barang">
                                <button type="button" value="Tambah Barang" id="addBarang"
                                    class="btn btn-primary btn-sm">
                                    <i class="bx bx-plus me-1"></i></button>
                                <button type="button" value="Hapus Barang" id="removeBarang"
                                    class="btn btn-primary btn-sm">
                                    <i class="bx bx-minus me-1"></i></button>
                            </div>

                            <hr size="3px" style="color: rgb(154, 154, 154)">

                            <h5>Masukkan attachments</h5>
                            <div class="form-group-attachment">
                                <h5>1</h5>
                                <div class="row">
                                    <!-- Nama attachment -->
                                    <div class="mb-3 col-md-6">
                                        <label for="attachments" class="form-label">Attachments<span
                                                style="color: red">*</span></label>
                                        <input type="file" class="form-control" id="attachments" name="attachments[]"
                                            required>
                                    </div>
                                    <!-- Keterangan attachment -->
                                    <div class="mb-3 col-md-6">
                                        <label for="attachments_detail" class="form-label">Keterangan attachment</label>
                                        <input class="form-control" id="attachments_detail" name="attachments_detail[]">
                                    </div>
                                </div>
                                <hr>
                            </div>


                            <div class="form-group-buttons-attachment">
                                <button type="button" value="Tambah Attachment" id="addAttachment"
                                    class="btn btn-primary btn-sm">
                                    <i class="bx bx-plus me-1"></i></button>
                                <button type="button" value="Hapus Attachment" id="removeAttachment"
                                    class="btn btn-primary btn-sm">
                                    <i class="bx bx-minus me-1"></i></button>
                            </div>

                            <hr size="3px" style="color: rgb(154, 154, 154)">

                            <h5>Masukkan Lampiran</h5>
                            <div class="form-group-addattachment">
                                <h5>1</h5>
                                <div class="row">
                                    <!-- Nama Lampiran -->
                                    <div class="mb-3">
                                        <label for="addattachments" class="form-label">Lampiran</label>
                                        <input type="file" class="form-control" id="addattachments"
                                            name="addattachments[]">
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="form-group-buttons-addattachment">
                                <button type="button" value="Tambah Lampiran" id="addLampiran"
                                    class="btn btn-primary btn-sm">
                                    <i class="bx bx-plus me-1"></i></button>
                                <button type="button" value="Hapus Lampiran" id="removeLampiran"
                                    class="btn btn-primary btn-sm">
                                    <i class="bx bx-minus me-1"></i></button>
                            </div>

                            <hr size="3px" style="color: rgb(154, 154, 154)">

                            <div class="row">
                                <!--Dibuat oleh-->
                                <div class="mb-3 col-md-4">
                                    <label for="dibuatoleh" class="form-label">Dibuat Oleh <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="dibuatoleh" name="dibuatoleh"
                                        required>
                                </div>
                                <!--Posisi Pembuat-->
                                <div class="mb-3 col-md-4">
                                    <label for="posisi1" class="form-label">Posisi Pembuat <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="posisi1" name="posisi1" required>
                                </div>
                                <!--Tanda Tangan Pembuat-->
                                <div class="mb-3 col-md-4">
                                    <label for="tandatangan1" class="form-label">Tanda Tangan<span
                                            style="color: red">*</span></label>
                                    <input type="file" class="form-control" id="tandatangan1" name="tandatangan1"
                                        required>
                                </div>

                                <!--Diperiksa oleh-->
                                <div class="mb-3 col-md-6">
                                    <label for="diperiksaoleh" class="form-label">Di periksa oleh <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="diperiksaoleh" name="diperiksaoleh"
                                        required>
                                </div>

                                <!--Posisi Pemeriksa-->
                                <div class="mb-3 col-md-6">
                                    <label for="posisi2" class="form-label">Posisi Pemeriksa <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="posisi2" name="posisi2" required>
                                </div>

                                @if (auth()->user()->role == "User")
                                    <!--Tanda Tangan Pemeriksa-->
                                    <div class="mb-3 col-md-4" id="tandaTanganContainer">
                                        <label for="tandatangan2" class="form-label">Tanda Tangan</label>
                                        <input type="file" class="form-control" id="tandatangan2"
                                            name="tandatangan2">
                                    </div>
                                @endif

                                <!--Diketahui oleh-->
                                <div class="mb-3 col-md-6">
                                    <label for="diketahuioleh" class="form-label">Di ketahui oleh <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="diketahuioleh" name="diketahuioleh"
                                        required>
                                </div>

                                <!--Posisi yang mengetahui-->
                                <div class="mb-3 col-md-6">
                                    <label for="posisi3" class="form-label">Posisi yang mengetahui <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="posisi3" name="posisi3" required>
                                </div>

                                @if (auth()->user()->role == "User")
                                    <!--Tanda Tangan yang mengetahui-->
                                    <div class="mb-3 col-md-4">
                                        <label for="tandatangan3" class="form-label">Tanda Tangan</label>
                                        <input type="file" class="form-control" id="tandatangan3"
                                            name="tandatangan3">
                                    </div>
                                @endif

                                <!--Disetujuioleh(untuk diatas 10juta)-->
                                <div class="mb-3 col-md-6">
                                    <label for="disetujuioleh" class="form-label">Disetujui oleh | <span
                                            style="color: red">
                                            Hanya untuk diatas 10 juta*</span></label>
                                    <input type="text" class="form-control" id="disetujuioleh" name="disetujuioleh">
                                </div>

                                @if (auth()->user()->role == "User")
                                    <!--Tanda Tangan yang Menyetujui-->
                                    <div class="mb-3 col-md-6">
                                        <label for="tandatangan4" class="form-label">Tanda Tangan</label>
                                        <input type="file" class="form-control" id="tandatangan4"
                                            name="tandatangan4">
                                    </div>
                                @endif
                            </div>
                            <div class="button" style="float:right">
                                <button type="reset"class="btn btn-outline-secondary text-uppercase me-2">Batal</button>
                                <button type="submit" name="print" id="validateAndSubmit"
                                    class="btn btn-outline-primary text-uppercase">Print</i></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            var formCount = 1; // Initial form count

            // Add form field
            $("#addBarang").click(function() {
                var html = $(".form-group-barang:first").clone(true, true);
                formCount++;
                updateFormNumbers();
                html.find('h5').text(formCount);
                $(".form-group-barang:last").after(html);
                moveButtonsToBottom();
            });

            // Remove form field
            $("#removeBarang").click(function() {
                if (formCount > 1) {
                    $(".form-group-barang:last").remove();
                    formCount--;
                    updateFormNumbers();
                }
            });

            function updateFormNumbers() {
                $(".form-group-barang").each(function(index) {
                    $(this).find('h5').text(index + 1);
                });
            }

            function moveButtonsToBottom() {
                var buttonGroup = $(".form-group-buttons-barang");
                buttonGroup.detach().insertAfter($(".form-group-barang:last"));
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var formCount = 1; // Initial form count

            // Add form field
            $("#addAttachment").click(function() {
                var html = $(".form-group-attachment:first").clone(true, true);
                formCount++;
                updateFormNumbers();
                html.find('h5').text(formCount);
                $(".form-group-attachment:last").after(html);
                moveButtonsToBottom();
            });

            // Remove form field
            $("#removeAttachment").click(function() {
                if (formCount > 1) {
                    $(".form-group-attachment:last").remove();
                    formCount--;
                    updateFormNumbers();
                }
            });

            function updateFormNumbers() {
                $(".form-group-attachment").each(function(index) {
                    $(this).find('h5').text(index + 1);
                });
            }

            function moveButtonsToBottom() {
                var buttonGroup = $(".form-group-buttons-attachment");
                buttonGroup.detach().insertAfter($(".form-group-attachment:last"));
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var formCount = 1; // Initial form count

            // Add form field
            $("#addLampiran").click(function() {
                var html = $(".form-group-addattachment:first").clone(true, true);
                formCount++;
                updateFormNumbers();
                html.find('h5').text(formCount);
                $(".form-group-addattachment:last").after(html);
                moveButtonsToBottom();
            });

            // Remove form field
            $("#removeLampiran").click(function() {
                if (formCount > 1) {
                    $(".form-group-addattachment:last").remove();
                    formCount--;
                    updateFormNumbers();
                }
            });

            function updateFormNumbers() {
                $(".form-group-addattachment").each(function(index) {
                    $(this).find('h5').text(index + 1);
                });
            }

            function moveButtonsToBottom() {
                var buttonGroup = $(".form-group-buttons-addattachment");
                buttonGroup.detach().insertAfter($(".form-group-addattachment:last"));
            }
        });
    </script>

    <script>
        function formatNumber(input) {
            // Remove non-numeric characters and parse the input as a number
            const number = parseFloat(input.value.replace(/[^\d]/g, ''));

            // Check if the input is a valid number
            if (!isNaN(number)) {
                // Format the number with commas and update the input value
                input.value = number.toLocaleString('id-ID');
            }
        }
    </script>
@endsection
