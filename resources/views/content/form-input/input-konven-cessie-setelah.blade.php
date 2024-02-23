@extends("layouts/contentNavbarLayout")

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@section("content")

    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div>
                        <h5 class="card-header">Form Surat Pemberitahuan Cessie: Konven (Setelah)</h5>
                        <p><span style="color: red; float:left; margin-left: 23px">*Wajib Diisi</span></p>
                    </div>
                    <div class="card-body">
                        <form action="/form-data" method="POST" id="formData" enctype="multipart/form-data">
                            @csrf
                            <!--IM Number-->
                            <div class="mb-3">
                                <label for="imnumber" class="form-label">Nomor XXXXX</label>
                                <input class="form-control" name="imnumber" id="imnumber" type="text" value="xxx"
                                    disabled>
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
                            <div class="button" style="float:right">
                                <button type="reset"class="btn btn-outline-secondary text-uppercase">Reset</button>
                                <button type="submit" name="print" id="validateAndSubmit"
                                    class="btn btn-outline-primary text-uppercase">Submit</i></button>
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
        }); <
        /scrip>

        <
        script
        script >
            function formatNumber(input) {
                // Remove non-numeric characters and parse the input as a number
                const number = parseFloat(input.value.replace(/[^\d]/g, ''));

                // Check if the input is a valid number
                if (!isNaN(number)) {
                    // Format the number with commas and update the input value
                    input.value = number.toLocaleString('id-ID');
                }
            } <
            />
    @endsection
