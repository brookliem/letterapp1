<title>IM Web Application</title>
<link rel="icon" type="image/x-icon" href="{{ asset("assets/img/favicon/favicon.ico") }}" />

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!-- Styles -->
        <style>
            .table td {
                padding: .5rem !important;
            }

            body {
                font-size: 16px !important;
            }

            @media print {
                body {
                    page-break-before: always;
                }

                .page {
                    page-break-before: always;
                }
            }

            @page {
                margin: 1cm;
                /* Set margin as needed */
            }
        </style>

        <style type="text/css">
            .p {
                font-family: 'Times New Roman', Times, serif;
            }

            .h3 {
                font-family: 'Times New Roman', Times, serif;
                font-size: 14px;
            }

            .tg {
                border-collapse: collapse;
                border-spacing: 0;
            }

            .tg td {
                border-color: black;
                border-style: solid;
                border-width: 1px;
                font-family: 'Times New Roman', Times, serif;
                font-size: 11px;
                overflow: hidden;
                padding: 10px 5px;
                word-break: normal;
            }

            .tg th {
                border-color: black;
                border-style: solid;
                border-width: 1px;
                font-family: 'Times New Roman', Times, serif;
                font-size: 11px;
                font-weight: normal;
                overflow: hidden;
                padding: 10px 5px;
                word-break: normal;
            }

            .tg .tg-baqh {
                text-align: center;
                vertical-align: top
            }

            .tg .tg-0lax {
                text-align: center;
                vertical-align: top
            }
        </style>

    </head>
    <style>
        .table td {
            padding: .5rem !important;
        }

        body {
            font-size: 16px !important;
        }
    </style>

    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 11px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 11px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-baqh {
            text-align: center;
            vertical-align: top
        }

        .tg .tg-0lax {
            text-align: center;
            vertical-align: top
        }
    </style>


    <body>
        <div class="mB-40" style="margin-top: 30px;">
            <div class="page">
                <div class="mB-40" style="margin-top: 30px;">
                    <div class="p-30">
                        <!-- Company Information -->
                        <table class="table border-0" style="margin-left: auto; margin-right: auto">
                            <tr>
                                <p style="text-align: center; font-size:13.2px; margin-left: auto; margin-right: auto">
                                    <strong style="font-size: 26px">PT CITA MINERAL INVESTINDO Tbk</strong><br>
                                    Panin Bank Building Lantai 2, Jl. Jend Sudirman - Senayan Jakarta Pusat 10270<br>
                                    Telp. (021) - 7251344 Fax (021) - 72789885<br>
                                </p>
                            </tr>
                        </table>

                        <h3 style="text-align: center; margin-top:5px; text-decoration:underline">INTERNAL MEMO</h3>

                        <!-- Internal Memo Content -->
                        <table class="table table-bordered"
                            style="margin-top:5px; font-size: 15.5px; margin-left:30px; margin-right:30px; line-height:27px;">

                            <tr>
                                <td> No. <br> <br> Perihal</td>
                                <td>: <br> : <br> : </td>
                                <td style="width: 512px; margin-right:30px">
                                    <span style="float:right; margin-right:-20px">
                                        {{ \Carbon\Carbon::parse($templates["date"])->format("d F Y") }}</span>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                        </table>
                        <br>

                        <table class="table table-bordered"
                            style="margin-top:5px; font-size: 15.5px; margin-left:30px; margin-right:30px;line-height:27px;">
                            <tr>
                                <td>Kepada Yth, <br> {{ $templates["kepada"] }} <br> Di Tempat <br> <br>
                                    Dengan hormat,
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered"
                            style="margin-top:5px; margin-right: 29px; margin-left:30px; line-height:27px; font-size:15.5px; text-align: justify;">
                            <tr>
                                <td>
                                    {{ $templates["deskripsi"] }}
                                </td>
                            </tr>
                        </table>
                        <table class="tg" style="margin-left: auto; margin-right: auto">
                            <thead>
                                <tr>
                                    <th class="tg-baqh" style="font-size: 15.5px;">No</th>
                                    <th class="tg-baqh" style="width: 300px; font-size: 15.5px;">Nama Barang</th>
                                    <th class="tg-0lax" style="width: 50px; font-size: 15.5px;">Jumlah</th>
                                    <th class="tg-0lax" style="width: 50px; font-size: 15.5px;">Satuan</th>
                                    <th class="tg-0lax" style="width: 150px; font-size: 15.5px;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($items as $item)
                                    <tr>
                                        <th scope="item" style="font-size: 14px;">{{ $no++ }}</th>
                                        <td style="font-size: 14px;">{{ $item["namabarang"] }}</td>
                                        <td style="text-align: center; font-size: 14px;">{{ $item["jumlah"] }}</td>
                                        <td style="text-align: center; font-size: 14px;">{{ $item["satuan"] }}</td>
                                        <td style="font-size: 14px;">{{ $item["keterangan"] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="table-container">
                            <table class="tg" style="margin-left: auto; margin-right: auto;">
                                <thead>
                                    <tr>
                                        <th class="tg-0lax" style="width: 150px; font-size:15.5px;">Dibuat oleh,</th>
                                        <th class="tg-0lax" style="width: 150px; font-size:15.5px;">Diperiksa oleh,</th>
                                        <th class="tg-0lax" style="width: 150px; font-size:15.5px;">Diketahui oleh,</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    <td style="height: 90px;">
                                        @if (isset($templates["tandatangan1"]))
                                            <img
                                                src="{{ asset("upload/user-tandatangan/{$templates["tandatangan1"]}") }}">
                                        @endif
                                    </td>

                                    <td style="height: 90px;">
                                        @if (isset($templates["tandatangan2"]))
                                            <img
                                                src="{{ asset("upload/user-tandatangan/{$templates["tandatangan2"]}") }}">
                                        @endif
                                    </td>

                                    <td style="height: 90px;">
                                        @if (isset($templates["tandatangan3"]))
                                            <img
                                                src="{{ asset("upload/user-tandatangan/{$templates["tandatangan3"]}") }}">
                                        @endif
                                    </td>

                                </tbody>
                                <tbody style="text-align: center; ">
                                    <td style="font-size:15.5px;">
                                        <u>{{ $templates["dibuatoleh"] }}</u> <br> {{ $templates["posisi1"] }}
                                    </td>
                                    <td style="font-size:15.5px;">
                                        <u>{{ $templates["diperiksaoleh"] }}</u> <br> {{ $templates["posisi2"] }}
                                    </td>
                                    <td style="font-size:15.5px;">
                                        <u>{{ $templates["diketahuioleh"] }}</u> <br> {{ $templates["posisi3"] }}
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estimasi Harga Page -->
        <div class="page">
            <div class="mB-40" style="margin-top: 30px;">
                <div class="p-30">
                    <!-- Company Information -->
                    <table class="table border-0">
                        <tr>
                            <p style="text-align: center; font-size:13.2px;">
                                <strong style="font-size: 26px">PT CITA MINERAL INVESTINDO Tbk</strong><br>
                                Panin Bank Building Lantai 2, Jl. Jend Sudirman - Senayan Jakarta Pusat 10270<br>
                                Telp. (021) - 7251344 Fax (021) - 72789885<br>
                            </p>
                        </tr>
                    </table>

                    <h3 style="text-align: center; margin-top:5px">ESTIMASI HARGA</h3>

                    <!-- Estimasi Harga Content -->
                    <table class="tg" style="margin-left: auto; margin-right: auto">
                        <thead>
                            <tr>
                                <th class="tg-baqh" style="font-size: 15.5px;">No</th>
                                <th class="tg-baqh" style="width: 300px; font-size: 15.5px;">Nama Barang</th>
                                <th class="tg-0lax" style="width: 50px; font-size: 15.5px;">Jumlah</th>
                                <th class="tg-0lax" style="width: 50px; font-size: 15.5px;">Satuan</th>
                                <th class="tg-0lax" style="width: 108px; font-size: 15.5px;">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $totalValue = 0;
                            @endphp

                            @foreach ($items as $item)
                                <tr>
                                    <th scope="item" style="font-size: 14px;">{{ $no++ }}</th>
                                    <td style="font-size: 14px;">{{ $item["namabarang"] }}</td>
                                    <td style="text-align: center; font-size: 14px;">{{ $item["jumlah"] }}</td>
                                    <td style="text-align: center; font-size: 14px;">{{ $item["satuan"] }}</td>
                                    <td style="font-size: 14px;">Rp
                                        <span
                                            style="float: right">{{ number_format($item->harga, 2, ",", ".") }}</span>
                                    </td>
                                </tr>

                                @php
                                    $totalValue += $item->harga;
                                @endphp
                            @endforeach
                        </tbody>

                        <tbody>
                            <tr>
                                <td colspan="4" style="font-size: 14px; text-align: center">Total</td>
                                <td style="font-size: 14px;">Rp <span
                                        style="float: right">{{ number_format($totalValue, 2, ",", ".") }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Attachments Page -->
        <div class="page">
            <div class="mB-40" style="margin-top: 30px;">
                <div class="p-30">
                    <!-- Company Information -->
                    <table class="table border-0">
                        <tr>
                            <p style="text-align: center; font-size:13.2px;">
                                <strong style="font-size: 26px">PT CITA MINERAL INVESTINDO Tbk</strong><br>
                                Panin Bank Building Lantai 2, Jl. Jend Sudirman - Senayan Jakarta Pusat 10270<br>
                                Telp. (021) - 7251344 Fax (021) - 72789885<br>
                            </p>
                        </tr>
                    </table>

                    <div class="table-container">
                        <table style="margin-left: auto; margin-right: auto; margin-top:20px">
                            @foreach ($attachments as $attachment)
                                <tr>
                                    <td>
                                        <img src="{{ asset("data-attachments/{$attachment["attachments"]}") }}"
                                            style="width: 420px; margin-bottom:27px">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; font-size: 14px;">
                                        {{ $attachment->attachments_detail }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="table-container">
                        <table style="margin-left:auto; margin-right:auto">
                            @foreach ($addattachments as $lampiran)
                                <tr>
                                    <td>
                                        <img src="{{ asset("data-lampiran/{$lampiran["addattachments"]}") }}"
                                            style="width: 180mm; height: 230mm">
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>
        @if (session("targetBlank"))
            const printWindow = window.open('{{ url("print") }}', '_blank');

            if (printWindow) {
                printWindow.onload = function() {
                    // Trigger the print function in the new window
                    printWindow.print();

                    // Close the new window after printing (optional)
                    printWindow.onafterprint = function() {
                        printWindow.close();
                    };

                    // Automatically navigate the original window back to the main menu
                    window.location.href = '{{ url("/form-data") }}';
                };
            }
        @endif
    </script>

</html>
