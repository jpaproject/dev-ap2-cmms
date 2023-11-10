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
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 10px;
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
            padding-right: 20px;
            padding-left: 20px;

        }
        .my-table {
            padding-right: 20px;
            padding-left: 20px;

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            vertical-align: middle;
            padding: 2px;
            width: auto;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
            font-size: 8px;
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

        .float-left {
            margin: 20px 0 0 10%;
            text-align: left;
            width: 30%;
            float: left;
            font-size: 15px;
        }

        .float-right {
            margin: 20px 0 0 0px;
            text-align: left;
            width: 70%;
            float: right;
            font-size: 15px;
        }

        .ttd-left {
            margin: 20px 0 0 20px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 15px;
        }

        .ttd-right {
            margin: 20px 0 0 20px;
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
        }

        .g1 {
            width: 50%;
            text-align: left;
            display: inline;
        }

        .g2 {
            width: 50%;
            text-align: left;
            display: inline;
            position: absolute;
            left: 30%;
        }

        .sub-header,
        .sub-header td,
        .sub-header th {
            border: none;
            /* Menghilangkan batas sel */
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
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
            font-size: 8px;
            height: 15px;
        }

        .vertical-text {
            writing-mode: vertical-rl;
            /* Menulis dari atas ke bawah (vertikal) dari kanan ke kiri */
            transform: rotate(-90deg);
            /* Memutar teks sejauh 180 derajat (agar berhadapan dengan tabel) */
            white-space: nowrap;
            /* Mencegah teks memotong dan tetap dalam satu baris */
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
    <div class="body">
        <table class="sub-header table">
            <tr>
                <td style="font-size:16px; text-align:center; font-weight: bold ">
                    <h1>DATA PENGUKURAN BEBAN / LOAD UPS </h1>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">
                    Hari / Tanggal : {{ $tanggal_hari }} / {{ $tanggalWo }}
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">
                    Lokasi Peralatan : {{ $lokasi }}
                </td>
            </tr>
        </table>
    </div>
    @php
        $count = count($formUpsDataUkurLoadBebans);
    @endphp

    <div class="body">
            <table class="my-table" style="table-layout: fixed">
                <tr>
                    <td rowspan="2"style="background-color: white; width:5%">NO</td>
                    <td style="background-color: rgb(213, 196, 62); ">Module / Fedder</td>
                    <td style="background-color: rgb(213, 196, 62); ">Lokasi Panel</td>
                    <td colspan="5" style="background-color: rgb(213, 196, 62); ">Arus Beban PerModul</td>
                    <td colspan="3" style="background-color: rgb(213, 196, 62); ">PENGUKURAN DISPLAY</td>
                </tr>
                <tr>
                    <td style="background-color: white;width:15%">Kapasitas</td>
                    <td style="background-color: white;width:15%">Distribusi Utama</td>
                    <td style="background-color: white;">R</td>
                    <td style="background-color: white;">S</td>
                    <td style="background-color: white;">T</td>
                    <td style="background-color: white;">N</td>
                    <td style="background-color: white;">Satuan</td>
                    <td style="background-color: white;">Besaran</td>
                    <td style="background-color: white;">Pengukuran</td>
                    <td style="background-color: white;">Satuan</td>
                </tr>

                @foreach ($formUpsDataUkurLoadBebans as $key => $formUpsDataUkurLoadBeban)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $formUpsDataUkurLoadBeban->kapasitas }}
                        </td>
                        <td>
                            {{ $formUpsDataUkurLoadBeban->distribusi }}
                        </td>
                        <td>
                            {{ $formUpsDataUkurLoadBeban->r }}
                        </td>
                        <td>
                            {{ $formUpsDataUkurLoadBeban->s }}
                        </td>
                        <td>
                            {{ $formUpsDataUkurLoadBeban->t }}
                        </td>
                        <td>
                            {{ $formUpsDataUkurLoadBeban->n }}
                        </td>
                        <td>
                            A
                        </td>
                        <td>
                            {{ $formUpsDataUkurLoadBeban->besaran }}
                        </td>
                        <td>
                            {{ $formUpsDataUkurLoadBeban->pengukuran }}
                        </td>
                        <td>
                            {{ $formUpsDataUkurLoadBeban->satuan }}
                        </td>

                    </tr>
                    @if ($count < 15)
                        @for ($i = 0; $i < 15 - $count; $i++)
                            <tr>
                                <td></td>
                                <td>

                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endfor
                    @endif
                @endforeach
                <tr>
                    <td colspan="11" style="background-color: rgb(100, 157, 161);width:25% ">Dokumentasi</td>
                </tr>
                <tr>
                    <td colspan="5"  style="width: 50%;height: 80px" ><img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('storage/dokumentasiLoad-ups/' . $fotoPath) }}" alt=""></td>
                    <td colspan="6"  style="width: 50%;height: 80px"><img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('storage/dokumentasiLoad-ups/' . $fotoPath2) }}" alt=""></td>
                </tr>
                <tr>
                    <td colspan="11">CATATAN</td>
                </tr>
                <tr>
                    <td colspan="11"  style="vertical-align: baseline;text-align: left;height: 80px"> {!! $formUpsDataUkurLoadBeban->catatan !!}</td>
                </tr>

            </table>
        <table class="table-borderless" style="padding: 20px">
            <tr class="table-borderless">
                <td>PENGAWAS AP 2
                </td>
                <td>Petugas AP 2
                </td>
            </tr>
            <tr class="table-borderless">
                <td>(_______________________________)</td>
                <td>
                    <table class="table-borderless">
                        @forelse ($userTechnicals as  $userTechnical)
                            <tr style="background-color: white">
                                <td style="text-align: left;">{{ $loop->iteration }}. {{ $userTechnical }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td style="text-align: center">No Data Available</td>
                            </tr>
                        @endforelse
                    </table>
                </td>
            </tr>
        </table>

    </div>

</body>

</html>
