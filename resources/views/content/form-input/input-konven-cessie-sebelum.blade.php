@extends("layouts/contentNavbarLayout")

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@section("content")

    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div>
                        <h5 class="card-header">Form Surat Pemberitahuan Cessie: Konven (Sebelum)</h5>
                        <p><span style="color: red; float:left; margin-left: 23px">*Wajib Diisi</span></p>
                    </div>
                    <div class="card-body">
                        <form action="/select_konven_cessie_sebelum" method="POST">
                            @csrf
                            <!--Nomor Penerbitan Surat-->
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="nomorsurat" class="form-label">Nomor Penerbitan Surat</label>
                                    <input type="text" class="form-control" name="nomorsurat" id="nomorsurat">
                                </div>
                                <!--Tanggal Dibuat-->
                                <div class="mb-3 col-md-6">
                                    <label for="tanggaldibuat" class="form-label">Tanggal Dibuat <span
                                            style="color: red">*</span></label>
                                    <input type="date" class="datepicker-here form-control digits" name="tanggaldibuat"
                                        id="tanggaldibuat" required>
                                </div>
                                <!--Nama Debitur-->
                                <div class="mb-3 col-md-6">
                                    <label for="namadebitur" class="form-label">Nama Debitur <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="namadebitur" name="namadebitur" required>
                                </div>
                                <!--Nomor Perjanjian Kredit-->
                                <div class="mb-3 col-md-3">
                                    <label for="nomorperjanjiankredit" class="form-label">Nomor Perjanjian Kredit <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="nomorperjanjiankredit"
                                        name="nomorperjanjiankredit" required>
                                </div>
                                <!--Tanggal Perjanjian-->
                                <div class="mb-3 col-md-3">
                                    <label for="tanggalperjanjian" class="form-label">Tanggal Perjanjian Kredit <span
                                            style="color: red">*</span></label>
                                    <input type="date" class="datepicker-here form-control digits"
                                        name="tanggalperjanjian" id="tanggalperjanjian" required>
                                </div>
                                <!--Alamat Debitur-->
                                <div class="mb-3 col-md-6">
                                    <label for="alamatdebitur" class="form-label">Alamat Debitur <span
                                            style="color: red">*</span></label>
                                    <textarea id="alamatdebitur" class="form-control" name="alamatdebitur" required></textarea>
                                </div>
                                <!--Tanggal Pembukuan Bank-->
                                <div class="mb-3 col-md-6">
                                    <label for="tanggalpembukuanbank" class="form-label">Tanggal Pembukuan Bank <span
                                            style="color: red">*</span></label>
                                    <input type="date" class="datepicker-here form-control digits"
                                        id="tanggalpembukuanbank" name="tanggalpembukuanbank" required>
                                </div>
                                <hr>
                                <!--Pokok-->
                                <div class="mb-3 col-md-3">
                                    <label for="pokok" class="form-label">Pokok <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="pokok" name="pokok" required>
                                </div>
                                <!--Denda-->
                                <div class="mb-3 col-md-3">
                                    <label for="denda" class="form-label">Denda <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="denda" name="denda" required>
                                </div>
                                <!--Bunga-->
                                <div class="mb-3 col-md-3">
                                    <label for="bunga" class="form-label">Bunga <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="bunga" name="bunga" required>
                                </div>
                                <!--Lain-lain-->
                                <div class="mb-3 col-md-3">
                                    <label for="lainlain" class="form-label">Lain-lain <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="lainlain" name="lainlain" required>
                                </div>
                                <hr>
                                <!--Total Kewajiban-->
                                <div class="mb-3 col-md-4">
                                    <label for="cpmenangani" class="form-label">CP(PIC Yang Menangani) <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="cpmenangani" name="cpmenangani"
                                        required>
                                </div>
                                <!--Email-->
                                <div class="mb-3 col-md-4">
                                    <label for="email" class="form-label">E-Mail <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                                <!--Phone-->
                                <div class="mb-3 col-md-4">
                                    <label for="phone" class="form-label">Phone <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <hr>
                                <!--Tanggal Tenggat Waktu-->
                                <div class="mb-3 col-md-4">
                                    <label for="tanggaltenggatwaktu" class="form-label">Tanggal Tenggat Waktu Pembayaran
                                        <span style="color: red">*</span></label>
                                    <input type="date" class="datepicker-here form-control digits"
                                        name="tanggaltenggatwaktu" id="tanggaltenggatwaktu" required>
                                </div>
                                <!--Private Auction Officer-->
                                <div class="mb-3 col-md-4">
                                    <label for="privateofficer" class="form-label">Nama Staff: Private Auction Officer
                                        <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="privateofficer" name="privateofficer"
                                        required>
                                </div>
                                <!--Private Auction Department Head-->
                                <div class="mb-3 col-md-4">
                                    <label for="privatedphead" class="form-label">Nama Staff: Private Auction Department
                                        Head
                                        <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="privatedphead" name="privatedphead"
                                        required>
                                </div>
                            </div>


                            <!--Deskripsi-->
                            <div class="button" style="float:right">
                                <button type="reset"class="btn btn-outline-secondary text-uppercase me-2">Reset</button>
                                <button type="submit" name="print" id="validateAndSubmit"
                                    class="btn btn-outline-danger text-uppercase">Submit</i></button>
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
