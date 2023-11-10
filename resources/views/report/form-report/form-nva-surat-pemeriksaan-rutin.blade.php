<!DOCTYPE html>
<html>

<head>
    <title>Report Work Order</title>
    <style type="text/css">
        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            font-family: sans-serif;
        }

        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .header {
            margin-top: 20px;
        }

        .header .title {
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: 700;
            text-align: center;
        }

        .body {
            /* margin-top: 30px; */
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: 400;
        }

        .detail {
            margin: 0 20px;
            letter-spacing: 0.1px;
            line-height: 1.1rem;
        }

        .detail .bold {
            /* font-weight: bold; */
            margin-right: 5px;
        }

        .bold {
            font-weight: bold;
        }

        .detail .left {
            float: left;
            width: 40%;
        }

        .detail .right {
            float: right;
            width: 40%;
        }

        .table {
            margin: 20px 20px;

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 7px;
            font-size: 10px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .images {
            margin: 20px 20px;
            margin-top: 30;
        }

        .images .wo-image {
            width: 25%;
            margin-top: 30px;
        }

        .page-break {
            page-break-after: always;
        }

        .d-inline {
            display: inline;
        }

        .ttd {
            margin: 40px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 15px;
        }

        .ttd-left {
            margin: 40px 0 0 0px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 15px;
        }

        .ttd-right {
            margin: 40px 0 0 50px;
            text-align: center;
            width: 40%;
            float: right;
            font-size: 15px;
        }

        .row-title {
            background-color: #d8d8d8;
        }

        .row-white {
            background-color: #ffffff;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .center {
            text-align: center;
            vertical-align: middle;
        }

        .table-data {
            border: 1px solid black;
        }

        .table-data tr td {
            background-color: white;
        }

        .no {
            border-top: none;
            border-bottom: none;
            border-right: 1px solid black;
            border-left: 1px solid black;
            text-align: center;

        }

        .header-table th {
            font-weight: bold;
            border: 1px solid black;
        }

        .title-table tr td {
            border: 1px solid black;
        }

        table tr td {
            border: none;
        }

        .border {
            border: 1px solid black;
            text-align: center;
        }

        .hide {
            border-top: none;
            border-bottom: none;
        }

        .br {
            border: 1px solid black;
            border-radius: 20px;
            margin: 20px;
            margin-bottom: 0px;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="br">
            <table style="padding:20px;">
                <tr style=" background-color: white; ">
                    <td style="border: none; width: 50%;">
                        <h1 style="font-size: 15px; display:inline; font-weight: bold;">
                            KCU BANDARA SOEKARNO-HATTA <br>
                            ELECTRICAL UTILITY & VISUAL AID <br>
                            NORTH VISUAL AID <br>
                            SOUTH VISUAL AID <br>
                            ELECTRICAL UTILITY
                        </h1>
                    </td>
                    <td style="border: none; width: 50%; text-align:right;">
                        <img style="width: 150px; text-align:right; display:inline;"
                            src="{{ public_path('img/AP2.png') }}" alt="">
                    </td>
                </tr>
            </table>
        </div>
        <div class="body">
            <div class="table">
                <table style="text-align:center" class="table-data">
                    <tr class="header-table">
                        <th style="background-color: white; font-size: 15px" class="center" colspan="3"> <u>SURAT PERINTAH
                                PEMERIKSAAN RUTIN</u></th>
                    </tr>
                    <tr>
                        <td style="width: 100px;"></td>
                        <td style="width: 100px;"></td>
                        <td style="width: 100px;"></td>
                    </tr>
                    <tr>
                        <td class="uraian" style="font-size: 10px">1. TANGGAL / BULAN / TAHUN</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ $tanggalWo[8] }}</td>
                                    <td class="border">{{ $tanggalWo[9] }}</td>
                                    <td class="hide"></td>
                                    <td class="border">{{ $tanggalWo[5] }}</td>
                                    <td class="border">{{ $tanggalWo[6] }}</td>
                                    <td class="hide"></td>
                                    <td class="border">{{ $tanggalWo[0] }}</td>
                                    <td class="border">{{ $tanggalWo[1] }}</td>
                                    <td class="border">{{ $tanggalWo[2] }}</td>
                                    <td class="border">{{ $tanggalWo[3] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="uraian" style="font-size: 10px">2. NAMA PETUGAS ATC</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formNvaSuratPemeriksaanRutin->nama_petugas_atc }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="uraian" style="font-size: 10px">3. JAM MASUK</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ $formNvaSuratPemeriksaanRutin->jam_masuk[0] }}</td>
                                    <td class="border">{{ $formNvaSuratPemeriksaanRutin->jam_masuk[1] }}</td>
                                    <td class="hide" style="text-align: center">-</td>
                                    <td class="border">{{ $formNvaSuratPemeriksaanRutin->jam_masuk[3] }}</td>
                                    <td class="border">{{ $formNvaSuratPemeriksaanRutin->jam_masuk[4] }}</td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="uraian" style="font-size: 10px">4. JAM KELUAR</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ $formNvaSuratPemeriksaanRutin->jam_keluar[0] }}</td>
                                    <td class="border">{{ $formNvaSuratPemeriksaanRutin->jam_keluar[1] }}</td>
                                    <td class="hide" style="text-align: center">-</td>
                                    <td class="border">{{ $formNvaSuratPemeriksaanRutin->jam_keluar[3] }}</td>
                                    <td class="border">{{ $formNvaSuratPemeriksaanRutin->jam_keluar[4] }}</td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="uraian" style="font-size: 10px">5. KENDARAAN</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formNvaSuratPemeriksaanRutin->kendaraan }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="uraian" style="font-size: 10px">6. NOMOR POLISI</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formNvaSuratPemeriksaanRutin->nomor_polisi }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="uraian" style="font-size: 10px">7. JUMLAH PERSONIL</td>
                        <td class="data" style="width: 20px">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ count($userTechnicals) }}</td>
                                    <td class="border"></td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="border">
                                <tr class="border">
                                    <th class="border">NAMA TEKNISI</th>
                                </tr>
                                @forelse ($userTechnicals as  $userTechnical)
                                    <tr class="border" style="text-align: left;">
                                        <td>{{ $loop->iteration }}. {{ $userTechnical }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td style="text-align: center">No Data Available</td>
                                    </tr>
                                @endforelse
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="uraian" style="font-size: 10px">8. TUJUAN KEPERLUAN</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formNvaSuratPemeriksaanRutin->tujuan_keperluan }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="uraian" style="font-size: 10px">9. LOKASI PEKERJAAN</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formNvaSuratPemeriksaanRutin->lokasi_pekerjaan }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-top: 1px solid black;">
                        <td colspan="3" height="80">
                            Catatan : <span style="font-style: italic">(Uraian Pelaksanaan Pemasangan)</span>
                            <br></br>
                        <br></br>
                            {!! $formNvaSuratPemeriksaanRutin->catatan !!}
                        </td>
                    </tr>

                    <tr style="border-top: 1px solid black;">
                        <td colspan="3">
                            <table>
                                <tr style="text-align: center;">
                                    <td height="60" style="vertical-align: bottom">PETUGAS SECURITY <br> MASUK AREA</td>
                                    <td style="vertical-align: bottom">PETUGAS SECURITY <br> KELUAR AREA</td>
                                    <td style="vertical-align: bottom">SUPERVISOR OF EU / <br> PENANGGUNG JAWAB</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>






</body>

</html>
