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
            font-size: 11px;
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

        .table-header {
            margin-top: 20px;
            padding: 20px;
            font-family: "Gill Sans", sans-serif;
        }

        .table-header tr td {
            border: none;
        }

        .table-header p {
            background-color: #ffffff;
            font-size: 15px;
            font-style: italic;
            vertical-align: bottom
        }

        .table-header h1 {
            font-size: 25px;
            font-weight: 600;
            vertical-align: bottom text-align: center;
        }

        .table-sub-header th,
        .table-sub-header td {
            background-color: white;
            border: 1.5px solid black;
            padding: 8px;
            vertical-align: middle;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
        }

        .table-data {
            margin: 20px 0;
            border: 1.5px solid black;
            font-size: 12px;
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .table-data th,
        .table-data td {
            background-color: white;
            border: 1.5px solid black;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
        }

        h3 {
            font-family: "Gill Sans", sans-serif;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="content">
        <table class="table-header">
            <tr>
                <td width="25%" style="vertical-align: middle;">
                    <img style="width: 120px; vertical-align: middle;" src="{{ public_path('img/AP2.png') }}"
                        alt="">
                </td>
                <td width="55%" style="vertical-align: middle;">
                    <h1 style="margin: 0; vertical-align: middle;">LAPORAN HARIAN PAGI</h1>
                    <br>
                    <p style="margin: 0;">PEKERJAAN MAINTENANCE WATER TREATMENT</p>
                    <p style="margin: 0;">BANDARA INTERNASIONAL SOEKARNO-HATTA</p>
                </td>
                <td width="20%" style="vertical-align: bottom;">
                    <img style="width: 80px; vertical-align: bottom; text-align: right;"
                        src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
                </td>
            </tr>
        </table>
        <hr>
        <div class="body">
            <div class="table">
                <table style="text-align:center" class="table-sub-header">
                    <tr>
                        <td style="width: 20%">HARI, TANGGAL</td>
                        <td style="width: 5%; text-align:center"> : </td>
                        <td style="width: 75%">{{ $hariTanggal }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%">DINAS</td>
                        <td style="width: 5%; text-align:center"> : </td>
                        <td style="width: 75%">PS (Jam 07:00 WIB s/d 18:59 WIB)</td>
                    </tr>
                    <tr>
                        <td style="width: 20%">CUACA</td>
                        <td style="width: 5%; text-align:center"> : </td>
                        <td style="width: 75%">CERAH</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center; font-weight:bold">PERSONIL
                            ({{ count($userTechnicals) }})</td>
                    </tr>
                    <tr>
                        <td style="width: 20%">PERSONIL</td>
                        <td style="width: 5%; text-align:center"> : </td>
                        <td style="width: 75%">
                            @foreach ($userTechnicals as $userTechnical)
                                <span>{{ $userTechnical . (!$loop->last ? ', ' : '') }}</span>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>

            <div class="table" style="margin-top: 5%">
                <h3>INFORMASI PERALATAN</h3>
                <table style="text-align:center" class="table-data">
                    <tr>
                        <td style="width: 18%" rowspan="2">PERALATAN</td>
                        <td style="" colspan="4">JUMLAH ALAT</td>
                        <td style="width: 10%" rowspan="2">SATUAN</td>
                        <td style="width: 10%" rowspan="2">TINGKAT<br>SERVICE<br>ABILITY</td>
                        <td style="width: 14%" rowspan="2">RATA - RATA<br>PEFORMA</td>
                        <td style="width: 20%" rowspan="2">CATATAN TEKNISI</td>
                    </tr>
                    <tr>
                        <td style="background-color: green; width: 7%;">RUNNING</td>
                        <td style="background-color: yellow; width: 7%;">STANDBY</td>
                        <td style="background-color: red; width: 7%;">OFF</td>
                        <td style="width: 7%;">TOTAL</td>
                    </tr>
                    @foreach ($formWtrPeralatanHarians as $formWtrPeralatanHarian)
                        <tr>
                            <td>{{ $formWtrPeralatanHarian->peralatan }}</td>
                            <td>{{ $formWtrPeralatanHarian->jumlah_alat_running }}</td>
                            <td>{{ $formWtrPeralatanHarian->jumlah_alat_standby }}</td>
                            <td>{{ $formWtrPeralatanHarian->jumlah_alat_off }}</td>
                            <td>{{ $formWtrPeralatanHarian->jumlah_alat_total }}</td>
                            <td>{{ $formWtrPeralatanHarian->satuan }}</td>
                            <td>{{ $formWtrPeralatanHarian->tingkat_service_ability }}</td>
                            <td>{{ $formWtrPeralatanHarian->peforma }}</td>
                            <td>{{ $formWtrPeralatanHarian->catatan }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

</html>
