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
            font-size:8px;
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
            margin: 0px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 12px;
        }

        .ttd-left {
            margin: 0px 0 0 0px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 12px;
        }

        .ttd-right {
            margin: 0px 0 0 50px;
            text-align: center;
            width: 40%;
            float: right;
            font-size: 12px;
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

        .center td{
            text-align: center;
            vertical-align: middle;
        }

        .table-data {
            border:none;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .table-no {
            border:none;
            border-left: 1px solid black;
        }

        .table-pertanyaan {
            border:none;
            border-right: 1px solid black;
        }
        .table-data tr td {
            background-color: white;
            text-align: left;
            vertical-align: middle;
        }
        .table-header td{
            font-weight: bold;
        }
        .table-header{
            font-weight: bold;
            text-align: center;
            border: 1px solid black;
            border-bottom: none
        }
        .block-check {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="content">
        <table style="margin-top:50px; padding:20px; border: none;">
            <tr style=" background-color: white;">
                <td style="border: none; width: 50%;"></td>
                <td style="border: none; width: 50%;">
                    <h1 class="center">PT.ANGKASA PURA II</h1>
                    <h1 class="center">BANDAR UDARA SOEKARNO - HATTA</h1>
                    <br>
                    <h1 class="center" style="color:cornflowerblue; text-decoration:underline;">PEMELIHARAAN BULANAN GIS 150 KV</h1>
                </td>
                <td style="border: none; width: 50%; text-align:right;">
                    <img style="width: 150px; text-align:right; display:inline;"
                        src="{{ public_path('img/AP2.png') }}" alt="">
                </td>
            </tr>
        </table>
        <div class="body">
            <div class="table">
                <table class="table-data">
                    <tr>
                        <td colspan="5" style="border:1px solid black; width:10px;">
                            <table style="border: none;">
                                <tr style="border: none;">
                                    <td style="border: none;">
                                        <table style="border: none;">
                                            <tr style="border: none;">
                                                <td style="border: none;">EQUIPMENT NUMBER</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvGisBulanan->equipment_number}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">LOCATION/STATION</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvGisBulanan->location_station}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">TYPE</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvGisBulanan->type}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">Reference drawing</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvGisBulanan->reference_drawing}}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td style="border: none; width: 55%">
                                        <table style="border: none;">
                                            <tr style="border: none;">
                                                <td style="border: none;">INSPECTION DATE</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvGisBulanan->inspection_date}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">SERIAL NUMBER</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvGisBulanan->serial_number}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">BRAND/MERK</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvGisBulanan->brand_merk}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">NAME PLATE</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvGisBulanan->name_plate}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;"></td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;"></td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;"></td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">STATUS</td>
                                                <td style="border: none; width:70%;">
                                                    <table>
                                                        <tr>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->status == 'OPS' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">OPS</td>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->status == 'STBY' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">STBY</td>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->status == 'REPAIR' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">REPAIR</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 10px; border: 1px solid black; width:10px;">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 20px; border: 1px solid black; width:10px;">

                        </td>
                    </tr>
                    <tr class="center">
                        <td class="table-header" colspan="2" style="text-align: center">
                            LEVEL 1 CEK VISUAL (IN SERVICE INSPECTION)
                        </td>
                        <td class="table-header" style="text-align: center">
                            KONDISI AWAL
                        </td>
                        <td class="table-header" style="text-align: center">
                            KONDISI AKHIR
                        </td>
                        <td class="table-header" style="text-align: center">
                            REMARKS <br> <span style="color:grey">Keterangan Tambahan </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">1</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan kondisi manometer dan density meter pada PMT/CB
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q1_awal == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q1_awal == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Berfungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q1_akhir == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q1_akhir == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Berfungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q1_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">2</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan kondisi manometer dan density meter pada PMS/DS
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q2_awal == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q2_awal == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Berfungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q2_akhir == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q2_akhir == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Berfungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q2_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">3</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan tekanan gas SF6 pada CT
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvGisBulanan->q3_awal }}</td>
                                    <td style="border:none;">bar</td>
                                    <td style="border: 1px solid black; width:40px;">5-6 (1)</td>
                                    <td style="border:none;">bar</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvGisBulanan->q3_akhir }}</td>
                                    </td>
                                    <td style="border:none;">bar</td>
                                    <td style="border: 1px solid black; width:40px;">5-6 (1)</td>
                                    <td style="border:none;">bar</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q3_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">4</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan kondisi manometer dan density meter pada CT
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q4_awal == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q4_awal == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Berfungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q4_akhir == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q4_akhir == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Berfungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q4_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">5</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan tekanan gas SF6 pada CVT/PT
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvGisBulanan->q5_awal }}
                                    </td>
                                    <td style="border:none;">bar</td>
                                    <td style="border: 1px solid black; width:40px;">5-6 (1)</td>
                                    <td style="border:none;">bar</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvGisBulanan->q5_akhir }}
                                    </td>
                                    <td style="border:none;">bar</td>
                                    <td style="border: 1px solid black; width:40px;">5-6 (1)</td>
                                    <td style="border:none;">bar</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q5_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">6</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan tekanan gas SF6 pada Sealing End/Sealing Box
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvGisBulanan->q6_awal }}
                                    </td>
                                    <td style="border:none;">bar</td>
                                    <td style="border: 1px solid black; width:40px;">5-6 (1)</td>
                                    <td style="border:none;">bar</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvGisBulanan->q5_akhir }}
                                    </td>
                                    <td style="border:none;">bar</td>
                                    <td style="border: 1px solid black; width:40px;">5-6 (1)</td>
                                    <td style="border:none;">bar</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q6_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">7</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan tekanan gas SF6 pada Busbar
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvGisBulanan->q7_awal }}
                                    </td>
                                    <td style="border:none;">bar</td>
                                    <td style="border: 1px solid black; width:40px;">5-6 (1)</td>
                                    <td style="border:none;">bar</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvGisBulanan->q7_akhir }}
                                    </td>
                                    <td style="border:none;">bar</td>
                                    <td style="border: 1px solid black; width:40px;">5-6 (1)</td>
                                    <td style="border:none;">bar</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q7_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">8</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan lampu indicator tekanan gas SF6 pada PMT/CB
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q8_awal == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q8_awal == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q8_akhir == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q8_akhir == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q8_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">9</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan indikasi pengisian pegas pada PMT/CB
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q9_awal == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q9_awal == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Berfungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q9_akhir == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q9_akhir == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Berfungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q9_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">10</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan lampu indicator tekanan gas SF6 pada PMS/DS
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q10_awal == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q10_awal == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q10_akhir == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q10_akhir == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q10_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">11</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan lampu indicator tekanan gas SF6 pada CT
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q11_awal == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q11_awal == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q11_akhir == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q11_akhir == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q11_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">12</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan lampu indicator tekanan gas SF6 pada CVT/PT
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q12_awal == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q12_awal == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q12_akhir == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q12_akhir == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q12_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">13</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan lampu indicator tekanan gas SF6 pada sealing
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q13_awal == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q13_awal == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q13_akhir == 'menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Menyala</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisBulanan->q13_akhir == 'tidak-menyala' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Menyala</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$formHmvGisBulanan->q13_remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 10px; border: 1px solid black; width:10px;">
                            REMARKS: {{$formHmvGisBulanan->remarks}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 10px; border: 1px solid black; width:10px;">

                        </td>
                    </tr>
                </table>
                <br>
                {{-- <table>
                    <tr class="table-hide">
                        <td class="center">Mengetahui <br> ASSISTANT MANAGER ELECTRICAL UTILITY <br> VISUAL AID</td>
                        <td class="center">Penanggung Jawab <br>ELECTRICAL UTILITY SUPERVISOR <br> VISUAL AID</td>
                    </tr>
                </table> --}}
            </div>
        </div>


        {{-- <div class="ttd-left">
            <p><span class="bold">Mengetahui</span></p>
            <p><span class="bold">ASSISTANT MANAGER ELECTRICAL UTILITY</span></p>
            <p><span class="bold">VISUAL AID</span></p>
            @if ($approve !== null)
                <img src="{{ public_path('img/users/ttd/' . ($approve->ttd ?? 'none.png')) }}" width="100px"
                    style="display: block">
            @endif
            <p><span>____________________</span></p>
        </div>
        <div class="ttd-right">
            <p><span class="bold">Penanggung Jawab</span></p>
            <p><span class="bold">ELECTRICAL UTILITY SUPERVISOR</span></p>
            <p><span class="bold">VISUAL AID</span></p>
            @if ($user_technicals !== null)
                <img src="{{ public_path('img/user-technicals/paraf/' . ($user_technicals->paraf ?? 'none.png')) }}"
                    width="100px" style="display: block">
            @endif
            <p><span>____________________</span></p>
        </div> --}}
        <div style="clear: both"></div>
    </div>






</body>

</html>
