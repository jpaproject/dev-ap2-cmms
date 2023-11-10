
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

            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
        }

        /* Zebra Color Row */
        /* tr:nth-child(even) {
            background-color: #dddddd;
        } */

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
            table-layout: fixed;
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
            text-align: center;
        }

        .table-borderless {
            padding-right: 20px;
            padding-left: 20px;
        }

        .table-borderless th,
        .table-borderless td {
            border: none;
            text-align: center;
        }

        .table-personil {
            width: 100%;
        }

        .table-personil th,
        .table-personil td {
            width: 33%;
            height: 10%;
            border: none;
        }

        .table-personil p {
            font-size: 13px;
            margin: 20px 20px;
            text-align: left;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="body">
            <div class="table">
                <table class="table-borderless">
                    <tr>
                        <th rowspan="2" style="width: 30%"><img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt=""></th>
                        <th class="center" style="width: 50%;"><img
                                style="width: 150px; text-align:center; display:inline; ">
                            <h1 style="font-size:25px; font-weight:bold; margin-top:20px">PERINTAH KERJA</h1>
                        </th>
                        <th rowspan="2" style="width: 30%"><img
                                style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('img/soekarno-hatta.jpg') }}" alt=""></th>
                    </tr>
                </table>

                <table class="my-table">
                    <tr>
                        <td>LOT</td>
                        <td>KODE</td>
                        <td>KLASIFIKASI</td>
                        <td>NOMOR</td>
                        <td>HARI</td>
                        <td>TANGGAL</td>
                        <td>BULAN</td>
                        <td>TAHUN</td>
                    </tr>

                    <tr style="background-color: white">
                        <td height=30;></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr style="background-color: white">
                        <td colspan="8">JENIS / TUGAS YANG DI BERIKAN</td>
                    </tr>

                    <tr>
                        <td colspan="8" height=100;>
                            <p style="margin: 20px 20px;">{{ $work_order->name ?? '' }}</p>
                        </td>
                    </tr>

                    <tr style="background-color: white">
                        <td colspan="8">PERSONIL YANG DI TUGASKAN</td>
                    </tr>

                    <tr>
                        <td colspan="8" height=80;>
                            <table class="table-personil" style="width: 100%">
                                <tr>
                                    <td>
                                        @for ($i = 0; $i < min(3, count($userTechnicals)); $i++)
                                            <p>{{ $i+1 . ' ' . $userTechnicals[$i] }}</p>
                                        @endfor
                                    </td>
                                    <td>
                                        @for ($i = 3; $i < min(6, count($userTechnicals)); $i++)
                                            <p>{{ $i+1 . ' ' . $userTechnicals[$i] }}</p>
                                        @endfor
                                    </td>
                                    <td>
                                        @for ($i = 6; $i < min(9, count($userTechnicals)); $i++)
                                            <p>{{ $i+1 . ' ' . $userTechnicals[$i] }}</p>
                                        @endfor
                                    </td>
                                </tr>                                
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4">NAMA PERALATAN</td>
                        <td colspan="2">LOKASI</td>
                        <td colspan="2">JUMLAH</td>
                    </tr>

                    <tr>
                        <td colspan="4" height=80;>
                            <p style="margin: 20px 20px;">{{ $work_order->asset->name ?? '' }}</p>
                        </td>
                        <td colspan="2">{{ $work_order->asset->location->name ?? '' }}</td>
                        <td colspan="2"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>






</body>

</html>
