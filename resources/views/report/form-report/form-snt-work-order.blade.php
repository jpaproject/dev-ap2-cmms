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
            border: 1px solid #ffffff;
            text-align: left;
            padding: 7px;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
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
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="body">
            <div class="table">
                <table class="table-borderless">
                    <tr>
                        <th  style="width: 40%"><label>AIRPORT ELECTRICAL & MECHANICAL </br> MECHANICAL & AIRPORT EQUIPMENT </br> SANITATION FACILITY</label></th>
                        <th class="center" style="width: 30%"><img
                                style="width: 150px; text-align:center; display:inline; "
                                ><h1 style="font-size:20px">PERINTAH KERJA</h1> </th>
                        <th  style="width: 30%"><img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt=""></th>
                    </tr>
                </table>

                <table class="my-table">
                    <tr>
                        <td>TANGGAL</td>
                        <td>NOMOR</td>
                        <td>KLASIFIKASI</td>
                        <td>LOKASI PEKERJAAN</td>
                    </tr>

                    <tr style="background-color: white">
                        <td height=30;></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr style="background-color: white">
                        <td colspan="3">WORK ORDER (JENIS PEKERJAAN)</td>
                        <td>NAMA TEKNISI</td>
                    </tr>

                    <tr>
                        <td colspan="3" height=100;></td>
                        <td></td>
                    </tr>

                    <tr style="background-color: white">
                        <td colspan="4">URAIAN PELAKSANAAN PEKERJAAN</td>
                    </tr>

                    <tr>
                        <td colspan="4" height=100;>
                        
                        </td>
                    </tr>
                </table>
                <table class="my-table">
                    <tr>
                        <td colspan="5">PELAKSANAAN</td>
                    </tr>

                    <tr>
                        <td>MATERIAL YANG DIPAKAI</td>
                        <td>JUMLAH</td>
                        <td colspan="2">TANGGAL DAN JAM</td>
                        <td>PARAF</td>
                    </tr>
                    <tr>
                        <td rowspan="5" height=40;></td>
                        <td rowspan="5"></td>
                        <td rowspan="4">TANGGAL</td>
                        <td>MULAI</td>
                        <td>TEKNISI</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td rowspan="2"></td>
                    </tr>

                    <tr>
                        <td> SELESAI </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>PTO</td>
                    </tr>

                    <tr>
                        <td>PUKUL</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="4" rowspan="2" style="vertical-align: baseline;text-align:left">Catatan :</td>
                        <td height =10;>ASISTANT MANAGER</td>
                    </tr>
                    <tr>
                        <td height =50></td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>






</body>

</html>
