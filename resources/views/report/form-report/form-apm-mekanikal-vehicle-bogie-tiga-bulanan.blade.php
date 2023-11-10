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
            margin-top: 20px;
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
            padding: 2px;
        }

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

        .print-table {
            page-break-inside: avoid;
        }

        .d-inline {
            display: inline;
        }

        .ttd {
            margin: 10px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 12px;
        }

        .ttd-left {
            margin: 10px 0 0 0px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 15px;
        }

        .ttd-right {
            margin: 10px 0 0 50px;
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
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr>
                        <td rowspan="4" style="text-align:center"><img style="width: 80px; display:inline; height:20px"
                                src="{{ public_path('img/AP2.png') }}" alt=""></td>
                        <td rowspan="4" style="width: 25%;text-align:center">
                            <h3>Lembar Pemeriksaan 3 Bulanan Mechanical
                                Vehicle</h3>
                        </td>
                        <th style=" font-size: 7px;text-align:left">No. Dokumen</th>
                        <th style="width: 5%; font-size: 7px;text-align:left">:</th>
                        <th style="width: 30%; font-size: 7px;text-align:left">FRM-APM-VHC-ABS-001</th>
                        <td rowspan="4" style="text-align:center"><img
                                style="width: 30px;text-align:center; display:inline; height:30px"
                                src="{{ public_path('img/len_logo.JPEG') }}" alt=""></td>
                    </tr>
                    <tr>
                        <td style=" font-size: 7px;">Tanggal Efektif</td>
                        <td style="width: 5%; font-size: 7px;">:</td>
                        <td style="width: 30%; font-size: 7px;text-align:left">
                            {{ $formApmMekanikalVehicleBogieTigaBulanans[0]['created_at']->format('d-m-Y') }}

                        </td>
                    </tr>
                    <tr>
                        <td style=" font-size: 7px;">Revisi</td>
                        <td style="width: 5%; font-size: 7px;">:</td>
                        <th style="width: 30%; font-size: 7px;text-align:left">
                            </td>
                    </tr>
                    <tr>
                        <td style=" font-size: 7px;">Halaman</td>
                        <td style="width: 5%; font-size: 7px;">:</td>
                        <th style="width: 30%; font-size: 7px;text-align:left">1 Halaman</td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                </table>
                <table class="my-table">
                    <tr>
                        <td style="width: 20%; font-size: 7px;">Trainset</td>
                        <td style="width: 5%; font-size: 7px;">:</td>
                        <td style="width: 30%; font-size: 7px;"></td>
                        <td style="width: 20%; font-size: 7px;">Petugas</td>
                        <td style="width: 5%; font-size: 7px;">:</td>
                        <td style="width: 30%; font-size: 7px;"></td>
                        <td style="width: 20%; font-size: 7px;">Spv.</td>
                        <td style="width: 5%; font-size: 7px;">:</td>
                        <td style="width: 30%; font-size: 7px;"></td>
                    </tr>
                    <tr>
                        <td style="width: 20%; font-size: 7px;">Tanggal</td>
                        <td style="width: 5%; font-size: 7px;">:</td>
                        <td style="width: 30%; font-size: 7px;">
                            {{ $formApmMekanikalVehicleBogieTigaBulanans[0]['created_at']->format('d-m-Y') }}
                        </td>
                        <td rowspan="2" style="width: 20%; font-size: 7px;">Paraf</td>
                        <td rowspan="2" style="width: 5%; font-size: 7px;">:</td>
                        <td rowspan="2" style="height:2%"></td>
                        <td rowspan="2" style="width: 20%; font-size: 7px;">Paraf</td>
                        <td rowspan="2" style="width: 5%; font-size: 7px;">:</td>
                        <td rowspan="2" style="height: 2%"></td>
                    </tr>
                    <tr>
                        <td style="width: 20%; font-size: 7px;">Periode Pemeriksaan</td>
                        <td style="width: 5%; font-size: 7px;">:</td>
                        <td style="width: 30%; font-size: 7px;">per 3 bulan</td>
                    </tr>
                    <tr>
                        <td colspan="9"></td>
                    </tr>
                </table>



                {{-- Alfabet Array --}}
                @php
                    $alphabet = range('A', 'Z'); // Creates an array with letters A to Z
                    // {{ $alphabet[$loop->index] }}
                @endphp
                @php
                    $counter = 0;
                    $number = 0;
                @endphp

                {{-- isi tabel --}}
                <table class="my-table">
                    <tr>
                        <th colspan="2" rowspan="2" style="width: 55%">PEMERIKSAAN BOGIE</th>
                        <th colspan="4">HASIL</th>
                        <th rowspan="2" style="width: 30%;">REFERENSI</th>
                    </tr>
                    <tr>
                        <th colspan="2">OK</th>
                        <th colspan="2">NOK</th>
                    </tr>
                    {{-- AXLE --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 0)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">{{ $alphabet[$loop->index] }}</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi Gear Oli')
                                            <h5 style="color: red">{{ '*Ganti Oli setiap 24.000 Km' }}</h5>
                                        @endif
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(3);
                    @endphp

                    {{-- slewing ring --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 3)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">B.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi Grease')
                                            <h5 style="color: red">{{ '*inject grease 3 bulan sekali' }}</h5>
                                        @endif
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(4);
                    @endphp

                    {{-- Leveling Valve --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 7)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">C.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(2);
                    @endphp

                    {{-- DIfferential Valve --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 9)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">D.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(3);
                    @endphp

                    {{-- Mean Pressure Valve --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 12)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">E.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(3);
                    @endphp

                    {{-- AIR SPRING --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 15)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">F.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(3);
                    @endphp

                    {{-- VERTICAL DUMPER --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 18)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">G.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(2);
                    @endphp

                    {{-- lATERAL Dumper --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 20)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">H</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(2);
                    @endphp

                    {{-- BRAKE CALLPER  --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 22)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">H.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kekencangan mur dan baut')
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(3);
                    @endphp
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        <tr>
                            <td style="width: 5%;text-align:center" rowspan="9">4. </td>
                            <th style="text-align: left">
                                <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                            </th>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC1</td>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC2</td>
                            <td style="width: 21%" rowspan="9">
                                <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                            </td>
                        </tr>
                        @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pemeriksan Keausan Pad')
                    @endforeach
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        @php
                            $counter++;
                        @endphp
                        @if ($counter % 2 == 0)
                            <tr>
                                <td style="text-align: center">{{ $number }} R </td>
                                <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 }}</span>
                                <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 }}</span>

                            </tr>
                            
                        @elseif($counter % 2 != 0)
                            <tr>
                                <td style="text-align: center">{{ $number }} L </td>
                                <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 }}</span>
                                <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 }}</span>

                            </tr>
                            @php
                            $number ++;
                        @endphp 
                        @endif
                    
                        @break($counter == 17)
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(8);
                    @endphp
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        <tr>
                            <td style="width: 5%;text-align:center" rowspan="5">5. </td>
                            <th style="text-align: left">
                                <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                            </th>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC1</td>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC2</td>
                            <td style="width: 21%" rowspan="5">
                                <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                            </td>
                        </tr>
                        @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pengukuran Keausan Brake disc')
                    @endforeach
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        @php
                            $counter++;
                        @endphp
                        <tr>
                            <td style="text-align: center">{{ $counter - 17 }} </td>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 }}</span>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 }}</span>
                        </tr>
                        @break($counter == 21)
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(4);
                    @endphp


                    {{-- Chamber & Cylinder --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 37)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">J.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(4);
                    @endphp

                    {{-- Proppeler shaft --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 41)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">K.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(4);
                    @endphp

                    {{-- Bogie frame --}}

                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 45)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">L.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach

                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(2);
                    @endphp

                    {{-- running wheel --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 47)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">M.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi ring lock, flange ring')
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(3);
                    @endphp
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        <tr>
                            <td style="width: 5%;text-align:center" rowspan="5">4. </td>
                            <th style="text-align: left">
                                <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                            </th>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC1</td>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC2</td>
                            <td style="width: 21%" rowspan="5">
                                <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                            </td>
                        </tr>
                        @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Mengukur nilai tekanan ban')
                    @endforeach
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        @php
                            $counter++;
                        @endphp
                        <tr>
                            <td>Tekanan Ban {{ $counter - 25 }} </td>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 }}</span>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 }}</span>
                        </tr>
                        @break($counter == 29)
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(4);
                    @endphp
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        <tr>
                            <td style="width: 5%;text-align:center" rowspan="5">5. </td>
                            <th style="text-align: left">
                                <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                            </th>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC1</td>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC2</td>
                            <td style="width: 21%" rowspan="5">
                                <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                            </td>
                        </tr>
                        @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Mengukur nilai pengikisan ban')
                    @endforeach
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        @php
                            $counter++;
                        @endphp
                        <tr>
                            <td>Abrassion {{ $counter - 29 }} </td>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 }}</span>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 }}</span>
                        </tr>
                        @break($counter == 33)
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(4);
                    @endphp

                    {{-- LATERAL STOPER --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 58)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">N.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(3);
                    @endphp

                    {{-- PEPE BOGIE --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 61)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">O.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(3);
                    @endphp

                    {{-- Traction Link device --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 64)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">P.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(4);
                    @endphp

                    {{-- Anti-roll bar device --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 68)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">Q.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi Grease')
                                            <h5 style="color: red">{{ '*inject grease 1 tahun sekali' }}</h5>
                                        @endif
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(5);
                    @endphp

                    {{-- Guide System --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 73)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">R.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi rotasi guide wheel dan turnout wheel')
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(3);
                    @endphp
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        <tr>
                            <td style="width: 5%;text-align:center" rowspan="9">4. </td>
                            <th style="text-align: left">
                                <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                            </th>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC1</td>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC2</td>
                            <td style="width: 21%" rowspan="9">
                                <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                            </td>
                        </tr>
                        @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pengukuran nilai diameter guide wheel')
                    @endforeach
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        @php
                            $counter++;
                        @endphp
                        <tr>
                            <td style="text-align: center">{{ $counter - 38 }} </td>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 }}</span>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 }}</span>
                        </tr>
                        @break($counter == 46)
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(8);
                    @endphp
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        <tr>
                            <td style="width: 5%;text-align:center" rowspan="9">5. </td>
                            <th style="text-align: left">
                                <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                            </th>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC1</td>
                            <td style="text-align: center;background-color:#999696;" colspan="2">MC2</td>
                            <td style="width: 21%" rowspan="9">
                                <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                            </td>
                        </tr>
                        @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pengukuran nilai diameter turnout wheel')
                    @endforeach
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan)
                        @php
                            $counter++;
                        @endphp
                        <tr>
                            <td style="text-align: center"> {{ $counter - 46 }} </td>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 }}</span>
                            <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 }}</span>
                        </tr>
                        @break($counter == 54)
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(8);
                    @endphp

                    {{-- Burst detector --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 92)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">S.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @break($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group !== $formApmMekanikalVehicleBogieTigaBulanans[$key + 1]->pemeriksaan_bogie_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                        $formApmMekanikalVehicleBogieTigaBulanans = $formApmMekanikalVehicleBogieTigaBulanans->slice(5);
                    @endphp

                    {{-- RETURN SPRING --}}
                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                        @if ($key == 97)
                            <tr style="background-color:#999696;">
                                @php
                                    $counter++;
                                @endphp
                                <td rowspan="2" style="text-align: center">T.</td>
                                <td style="width: 55%" rowspan="2">
                                    <h5 style="font-size: 10px vertical-align:middle; text-align:left">
                                        {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group }} </h5>
                                </td>
                                <td style="text-align: center" colspan="2">MC1</td>
                                <td style="text-align: center" colspan="2">MC2</td>
                                <th style=" width: 21%;" rowspan="2">
                                </th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <td>OK</td>
                                <td>NOK</td>
                                <td>OK</td>
                                <td>NOK</td>
                            </tr>
                            @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }} </h2>
                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmMekanikalVehicleBogieTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align: left">Catatan : {!! $formApmMekanikalVehicleBogieTigaBulanans[97]->catatan !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <div class="ttd-left">
        <p><span class="bold">Supervisor</span></p>
        <p><span class="bold">Power Station 2</span></p>

        {{-- @if ($approve !== null)
            <img src="{{ public_path('img/users/ttd/' . ($approve->ttd ?? 'none.png')) }}" width="100px"
                style="display: block">
        @endif --}}
        <p><span>____________________</span></p>
    </div>
    <div class="ttd-right">
        <p><span class="bold">Paraf</span></p>
        <p><span class="bold">Technical</span></p>
        @if ($user_technicals !== null)
            <img src="{{ public_path('img/user-technicals/paraf/' . ($user_technicals->paraf ?? 'none.png')) }}"
                width="100px" style="display: block">
        @endif
        <p><span>____________________</span></p>
    </div>
    <div style="clear: both"></div>
    </div>
</body>

</html>
