 
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
            font-size: 12px;
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

        }
    </style>
</head>

<body>
    <div class="content">
        <div class="body">
            <div class="table">
                <table>
                    <tr class="header-table">
                        <th rowspan="3" style="width: 30%"><img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt=""></th>
                        <th colspan="2" class="center">
                            BANDAR UDARA INTERNASIONAL SOEKARNO-HATTA OPERATION & MAINTENANCE ELECTRICAL
                        </th>
                        <th rowspan="3" style="width: 20%"><img
                                style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('img/ap2-solusi.png') }}" alt=""></th>
                    <tr class="header-table">
                        <th style="background-color: white;" colspan="2" class="center">
                            LAPORAN KERUSAKAN
                        </th>
                    </tr>
                    <tr class="header-table">
                        <th class="center">
                            DOK NO :
                        </th>
                        <th class="center">
                            TANGGAL : {{ $tanggalWo }}
                        </th>
                    </tr>
                </table>

                <table style="text-align:center" class="table-data">
                    <tr class="header-table">
                        <th style="background-color: white;" class="center">NO</th>
                        <th style="background-color: white;" class="center">URAIAN</th>
                        <th style="background-color: white;" class="center" colspan="2">DATA</th>
                    </tr>
                    <tr>
                        <td class="center">1</td>
                        <td class="uraian" style="vertical-align: middle">Tanggal/Bulan/Tahun</td>
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
                        <td class="center">2</td>
                        <td class="uraian" style="vertical-align: middle">Lokasi</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formUpsLaporanKerusakanDanPerbaikan->lokasi_pekerjaan }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">3</td>
                        <td class="uraian" style="vertical-align: middle">Fasilitas</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formUpsLaporanKerusakanDanPerbaikan->fasilitas }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">4</td>
                        <td class="uraian" style="vertical-align: middle">PERALATAN YANG DIBAWA MASUK</td>
                        <td colspan="2">
                            <table>
                                @foreach ($assetMaterials as $assetMaterial)
                                    <tr style="text-align: left;">
                                        <td>{{ $loop->iteration . ' ' . $assetMaterial->material_name }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">5</td>
                        <td class="uraian" style="vertical-align: middle">Bagian Peralatan</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formUpsLaporanKerusakanDanPerbaikan->bagian_peralatan }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">6</td>
                        <td class="uraian" style="vertical-align: middle">Kategori Kerusakan</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">7</td>
                        <td class="uraian" style="vertical-align: middle">Uraian Kerusakan</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border" height="80" style="text-align: left">
                                        {{ $formUpsLaporanKerusakanDanPerbaikan->uraian }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">8</td>
                        <td class="uraian" style="vertical-align: middle">Tindakan Perbaikan</td>
                        <td class="hide"></td>
                        <td class="center">Oleh : PT. AP II dan PT. APS Unit UPS & Converter</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="data" colspan="2">

                            <table class="waktu">
                                <tr>
                                    <td class="border" height="40" style="text-align: left">
                                        {{ $formUpsLaporanKerusakanDanPerbaikan->tindakan }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">9</td>
                        <td class="uraian" style="vertical-align: middle">Penyebab Kerusakan</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border" style="text-align: left">
                                        {{ $formUpsLaporanKerusakanDanPerbaikan->penyebab }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">10</td>
                        <td class="uraian" style="vertical-align: middle">Tanggal Kerusakan</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ $tanggalWo1[8] }}{{ $tanggalWo1[9] }}</td>
                                    <td class="border">{{ $tanggalWo1[5] }}{{ $tanggalWo1[6] }}</td>
                                    <td class="border">
                                        {{ $tanggalWo1[0] }}{{ $tanggalWo1[1] }}{{ $tanggalWo1[2] }}{{ $tanggalWo1[3] }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="center"></td>
                        <td class="uraian" style="vertical-align: middle">Jam Kerusakan</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ $jamWo }}</td>
                                </tr>
                            </table>
                        </td>
                        <td rowspan="6">
                            <table class="table-data">
                                <tr class="header-table">
                                    <th class="center">KODE HAMBATAN</th>
                                </tr>
                                <tr>
                                    <td>AU - Tidak Ada Alat Ukur</td>
                                </tr>
                                <tr>
                                    <td>PK - Menunggu Penerbangan Kalibrasi</td>
                                </tr>
                                <tr>
                                    <td>TT - Tidak ada Teknisi</td>
                                </tr>
                                <tr>
                                    <td>SC - Menunggu Suku cadan</td>
                                </tr>
                                <tr>
                                    <td>TR - Tidak ada transportasi</td>
                                </tr>
                                <tr>
                                    <td>ST - Peralatan belum serah terima</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">11</td>
                        <td class="uraian" style="vertical-align: middle">Tanggal Selesai Perbaikan</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ $tanggalWo2[8] }}{{ $tanggalWo2[9] }}</td>
                                    <td class="border">{{ $tanggalWo2[5] }}{{ $tanggalWo2[6] }}</td>
                                    <td class="border">
                                        {{ $tanggalWo2[0] }}{{ $tanggalWo2[1] }}{{ $tanggalWo2[2] }}{{ $tanggalWo2[3] }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                        
                    </tr>
                    <tr>
                        <td class="center"></td>
                        <td class="uraian" style="vertical-align: middle">Jam Selesai Perbaikan</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ $jamWo2 }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">12</td>
                        <td class="uraian" style="vertical-align: middle">Jumlah Jam Operasi Terputus</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ $formUpsLaporanKerusakanDanPerbaikan->jumlah_jam[0] }}</td>
                                    <td class="border">{{ $formUpsLaporanKerusakanDanPerbaikan->jumlah_jam[1] }}</td>
                                    <td class="border">{{ $formUpsLaporanKerusakanDanPerbaikan->jumlah_jam[3] }}</td>
                                    <td class="border">{{ $formUpsLaporanKerusakanDanPerbaikan->jumlah_jam[4] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">13</td>
                        <td class="uraian" style="vertical-align: middle">Jumlah Jam Operasi Terputus</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{ $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan[0] }}
                                    </td>
                                    <td class="border">{{ $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan[1] }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>


                    <tr style="border-top: 1px solid black;">
                        <td colspan="4">
                            <table>
                                <tr style="text-align: center;">
                                    <td>PETUGAS SECURITY <br> MASUK AREA</td>
                                    <td>PETUGAS SECURITY <br> KELUAR AREA</td>
                                    <td>SPV OF EU / <br> PENANGGUNG JAWAB</td>
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
