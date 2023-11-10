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
            font-size: 30px;
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
            font-size:15px;
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
            font-size:10px;
            border:none;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .table-no {
            border:none;
            border-left: 1px solid black;
        }

        .table-pert            border:none;
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
            border-bottom: none;
            font-size: 20px;
            background-color: #5f9ea0;
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
        <table style="margin-top:50px; padding:20px; border: none; padding-bottom: 0px;">
            <tr style=" background-color: white;">
                <td style="border: none; width: 50%;">
                    <p>BIDANG FASILITAS BANDARA</p>
                    <p>DIVISI ENERGY & POWER SUPPLY</p>
                    <p>DINAS GARDU INDUK</p>

                </td>
                <td style="border: none; width: 50%;"></td>
                <td style="border: none; width: 50%; text-align:center;">
                    <img style="width: 150px; text-align:right; display:inline;"
                        src="{{ public_path('img/AP2.png') }}" alt="">
                </td>

            </tr>
            <tr style=" background-color: white;">
                <td style="border: none; width: 50%;">

                </td>
                <td style="border: none; width: 50%; vertical-align:bottom;">LAPORAN HARIAN DINAS OPERASIONAL TEKNIS</td>
                <td style="border: none; width: 50%;">
                    <table>
                        <tr style=" background-color: white;">
                            <td style="border: none;">HARI</td>
                            <td style="border: none;">: {{$hari}}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td style="border: none;">TANGGAL</td>
                            <td style="border: none;">: {{$tanggal}}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td style="border: none;">SHIFT</td>
                            <td style="border: none;">: {{$shift}}</td>
                        </tr>
                    </table>
                </td>

            </tr>
        </table>
        <div class="body">
            <div class="table">
                <table class="table-data">
                    <tr>
                        <th class="center" style="width: 5%; border:1px solid black; font-weight:bold; font-size:10px;">NO</th>
                        <th class="center" style="border:1px solid black; font-weight:bold; font-size:10px;">JAM</th>
                        <th class="center" style="border:1px solid black; font-weight:bold; font-size:10px;">URAIAN KEJADIAN</th>
                        <th class="center" style="width: 50%; border:1px solid black; font-weight:bold; font-size:10px;">TINDAK LANJUT</th>
                        <th class="center" style="border:1px solid black; font-weight:bold; font-size:10px;">SELESAI</th>
                        <th class="center" style="border:1px solid black; font-weight:bold; font-size:10px;">HASIL</th>
                        <th class="center" style="border:1px solid black; font-weight:bold; font-size:10px;">KET</th>
                    </tr>
                    @foreach ( $formHmvLogHarians as $key => $item )
                            <tr>
                                <td class="center" style="width: 5%; border:1px solid black;">
                                    {{$loop->iteration}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item['jam']}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item['uraian_kejadian']}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item['tindak_lanjut']}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item['selesai']}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item['hasil']}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item['ket']}}
                                </td>
                            </tr>
                    @endforeach
                </table>
                <table class="table-data">
                    <tr>
                        <th class="center" style="width: 20%; border:1px solid black;">GANGGUAN PERMANEN</th>
                        <th class="center" style="border:1px solid black;" colspan="2">PRESSURE GAS</th>
                        <th class="center" style="border:1px solid black;" colspan="3">METERING</th>
                        <th class="center" style="border:1px solid black;" colspan="4">CONTROL MONITORING</th>
                        <th class="center" style="border:1px solid black;">PETUGAS</th>
                        <th class="center" style="border:1px solid black;">PARAF</th>
                        <th class="center" style="border:1px solid black;">ASMAN</th>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;" rowspan="7"></td>
                        <td style="border:1px solid black;">INCOMING 1</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;">INCOMING</td>
                        <td style="border:1px solid black;">1</td>
                        <td style="border:1px solid black;">2</td>
                        <td style="border:1px solid black;" colspan="2">SAS</td>
                        <td style="border:1px solid black;" colspan="2"></td>
                        <td style="border:1px solid black;" rowspan="7"></td>
                        <td style="border:1px solid black;" rowspan="7"></td>
                        <td style="border:1px solid black;" rowspan="3"></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">INCOMING 2</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;">DAYA</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;" colspan="2">RCU</td>
                        <td style="border:1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">OUTGOING 1</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;">ARUS</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;" colspan="4"></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">OUTGOING 2</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;">TEGANGAN</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;" colspan="3">TEMPERATURE</td>
                        <td style="border:1px solid black;">TAP</td>
                        <td style="border:1px solid black;">MECD</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">COUPLER 1</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;">COS PHI</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;" colspan="2">TRAFO 1</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;" rowspan="3"></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">BUS VT</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;">FREQUENSI</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;" colspan="2">TRAFO 2</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;"></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">SPARE 1</td>
                        <td style="border:1px solid black;"></td>
                        <td style="border:1px solid black;" colspan="7"></td>
                    </tr>
                </table>
                <br>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>

</body>

</html>
