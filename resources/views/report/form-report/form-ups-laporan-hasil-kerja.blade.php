<!DOCTYPE html>
<html>

<head>
    <title>Report Work Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            margin-top: 30px;
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
            padding: 8px;
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
            margin: 20px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 12px;
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

        .my-table td,
        .my-table th {
            border-left: 1px solid black;
            /* Set the left border of cells */
            border-right: 1px solid black;
            /* Set the right border of cells */
            border-top: 1px solid black;
            /* Set the top border of cells */
            border-bottom: 1px solid black;
            /* Set the bottom border of cells */
            vertical-align: middle;
            padding: 5px;
            height: 20;
        }
        .table-borderless {
            padding-right: 20px;
            padding-left: 20px;
            font-family: arial, sans-serif;
        }

        .table-borderless th,
        .table-borderless td {
            border: none;
            text-align: center;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr class="row-title">
                        <td class="bold" colspan="2" style="text-align:center">LAPORAN HASIL KERJA OPERASIONAL PAGI SIANG</td>
                    </tr>
                    <tr class="row-title">
                        <td class="bold" colspan="2" style="text-align:left">Serah terima tugas dengan petugas dinas Pagi (PS)</td>
                    </tr>
                    
                    <tr class="row-white">
                        <td class="row-title" style="text-align:left">Koordinasi dengan petugas AP2 dinas UPS & Converter a/n Bapak/Ibu :</td>
                        <td style="text-align:center; padding: 5px;"><span
                                >{{ $formUpsLaporanHasilKerja->koordinasi  }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td class="row-title" style="text-align:left"> Cek visual peralatan via monitoring RCMS :</td>
                        <td style="text-align:center; padding: 5px;"><span
                                >{{ $formUpsLaporanHasilKerja->hasil_visual  }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td colspan="2" class="row-title" style="text-align:left"> Cek kelengkapan alat kerja, antara lain :</td>
                        
                    </tr>
                    <tr class="row-white">
                        <td ><span
                                >Toolkit</span>
                        </td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->toolkit == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td ><span
                                >Avometer</span>
                        </td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->avometer == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td ><span
                                >Kendaraan Operasional</span>
                        </td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->kendaraan == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td ><span
                                >APD</span>
                        </td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->apd == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td ><span
                                >Reytex</span>
                        </td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->reytex == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td ><span
                                >Alat Cleaning</span>
                        </td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->alat_cleaning == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td class="row-title" style="text-align:left">Cek pengukuran Tegangan input/output, Arus input/output, Tegangan baterai pada peralatan dengan AVO meter</td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->pengukuran == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td class="row-title" style="text-align:left">Mengecek temperatur peralatan dan ruangan sekitar peralatan.</td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->temperatur == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td class="row-title" style="text-align:left">Membersihkan bagian-bagian peralatan dan area sekitar peralatan.</td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->membersihkan == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td class="row-title" style="text-align:left">Data dan dokumetasi selama kegiatan terlampir.</td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->dokumentasi == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr class="row-white">
                        <td class="row-title" style="text-align:left">Serah terima tugas dengan petugas dinas malam (M)</td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formUpsLaporanHasilKerja->serahterima == true ? '✔' : '' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="2" style="text-align:right">Hari/tanggal : {{ $tanggal_hari }} / {{ $tanggalWo }}</td>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="2" style="height: 5px;text-align:center">CATATAN</td>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="2" style="height: 80px; vertical-align: start">
                            {!! $formUpsLaporanHasilKerja->catatan ?? '' !!}</td>
                    </tr>
                </table>
            </div>
        </div>
                            <table class="table-borderless">
                                <tr style="text-align: center;">
                                    <td>DISETUJUI PT. ANGKASA PURA II <br> PENGAWAS PS/PTO</td>
                                    <td> <br> PENGAWAS M/PTO</td>
                                    <td>PT. ANGKASA PURA SOLUSI<br> PETUGAS PS</td>
                                </tr>
                                <tr>
                        <td class="row-white" colspan="3" style="height: 80px">
                            </td>
                    </tr>
                                <tr >
                                    <td class="row-white">(_______________)</td>
                                    <td class="row-white">(_______________)</td>
                                    <td class="row-white">(_______________)</td>
                                </tr>
                            </table>
        <div style="clear: both"></div>
    </div>

</body>

</html>
