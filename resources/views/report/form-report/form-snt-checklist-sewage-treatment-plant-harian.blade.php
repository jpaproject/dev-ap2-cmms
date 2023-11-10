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
            padding: 2px;
            font-size: 10px;
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
            background-color: #ffffff;
        }

        .row-white {
            background-color: #ffffff;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .my-table {
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

        .tinggi {
            height: 7px;
            font-size: 5px;

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
            font-size: 10px;

        }

        .table-borderless {
            padding-top: 20px;
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
                    <tr class="header-table">
                        <th colspan="2" class="center" style="width: 35%"><img style="width: 150px; text-align:center;"
                                src="{{ public_path('img/AP2.png') }}" alt=""></th>
                        <th colspan="4" class="center">
                            <h1 style="font-size: 16px;font-weight:bold">LAPORAN CHECK LIST HARIAN</h1>
                        </th>
                        <th class="center" style="width: 30%"><img style="width: 150px; text-align:center;"
                                src="{{ public_path('img/ap2-solusi.png') }}" alt=""></th>
                    </tr>
                    <tr class="header-table">
                        <th colspan="2" style="background-color: white;font-weight:bold"" class="center">
                            NAMA ALAT
                        </th>
                        <th colspan="4" style="background-color: white;" class="center">
                            LOKASI
                        </th>
                        <th  style="background-color: white;" >
                            TANGGAL : {{ $formSntChecklistSewageTreatmentPlantHarians[0]->created_at->format('d M Y') }}
                        </th>
                    </tr>
                    <tr class="header-table">
                        <th colspan="2" rowspan="2" style="background-color: white;font-weight:bold" class="center">
                            SEWAGE TREATMENT PLANT
                        </th>
                        <th colspan="4" rowspan="2" style="background-color: white;" class="center">
                            BANDARA INTERNASIONAL SOEKARNO HATTA
                        </th>
                        <th style="background-color: white;" >
                            JAM MULAI : {{ $tanggalWo2 }}
                        </th>
                    </tr>
                    <tr class="header-table">
                        <th style="background-color: white;" >
                            JAM SELESAI : {{ $tanggalWo }}
                        </th>
                    </tr>

                    <tr class="my-table">
                        <td style="width: 10px" rowspan="2">
                            NO
                        </td>
                        <td style="width: 30%" rowspan="2">
                            NAMA PERALATAN
                        </td>
                        <td style="width: 10%" rowspan="2">
                            MERK
                        </td>
                        <td style="width: 10%" rowspan="2">
                            TIPE
                        </td>
                        <td colspan="2">
                            KONDISI
                        </td>
                        <td  rowspan="2">
                            TINDAKAN / KETERANGAN
                        </td>
                    </tr>

                    <tr class="my-table">
                        <td style="width: 50px">OPERASI</td>
                        <td style="width: 50px">OFF</td>
                    </tr>
                    @foreach ($formSntChecklistSewageTreatmentPlantHarians as $formSntChecklistSewageTreatmentPlantHarian)
                        <tr class="my-table">
                            <td>{{ $loop->iteration }}</td>
                            <td style="text-align: left">{{ $formSntChecklistSewageTreatmentPlantHarian->nama_peralatan }}</td>
                            <td style="text-align: left">{{ $formSntChecklistSewageTreatmentPlantHarian->merk }}</td>
                            <td style="text-align: left">{{ $formSntChecklistSewageTreatmentPlantHarian->tipe }}</td>
                            <td style="text-align:center; padding: 5px;"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formSntChecklistSewageTreatmentPlantHarian->kondisi == 'OPERASI' ? '✔' : '' }}</span>
                            </td>
                            <td style="text-align:center; padding: 5px;"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formSntChecklistSewageTreatmentPlantHarian->kondisi == 'OFF' ? '✔' : '' }}</span>
                            </td>
                            <td style="text-align: left">{{ $formSntChecklistSewageTreatmentPlantHarian->keterangan }}</td>
                        </tr>
                    @endforeach
                </table>

                <table class="table-borderless">
                    <tr>
                        <td>PT. AngkasaPura II</td>
                    <td></td>
                    <td>PELAKSANA</td>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="3" style="height: 80px">
                            </td>
                    </tr>
                    <tr height="60">
                        <td>(_____________________)</td>
                        <td></td>
                        <td>(_____________________)</td>
                    </tr>
                </table>
            </div>
            
        </div>
        <div style="clear: both"></div>
    </div>






</body>

</html>
