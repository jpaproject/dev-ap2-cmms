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
                            <h3>Lembar Pemeriksaan Harian Electric Vehicle Exterior</h3>
                        </td>
                        <th style=" font-size: 7px;text-align:left">No. Dokumen</th>
                        <th style="width: 5%; font-size: 7px;text-align:left">:</th>
                        <th style="width: 30%; font-size: 7px;text-align:left">FRM-MOP-APMS-41-001</th>
                        <td rowspan="4" style="text-align:center"><img
                                style="width: 30px;text-align:center; display:inline; height:30px"
                                src="{{ public_path('img/len_logo.JPEG') }}" alt=""></td>
                    </tr>
                    <tr>
                        <td style=" font-size: 7px;">Tanggal Efektif</td>
                        <td style="width: 5%; font-size: 7px;">:</td>
                        <td style="width: 30%; font-size: 7px;text-align:left">
                            {{ $formApmElektrikalVehicleExteriorHarians[0]['created_at']->format('d-m-Y') }}

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
                            {{ $formApmElektrikalVehicleExteriorHarians[0]['created_at']->format('d-m-Y') }}
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
                        <td style="width: 30%; font-size: 7px;">per 1 hari</td>
                    </tr>
                    <tr>
                        <td colspan="9"></td>
                    </tr>
                </table>



                {{-- Alfabet Array --}}
                @php
                    $alphabet = range('H', 'Z'); // Creates an array with letters A to Z
                @endphp

                {{-- isi tabel --}}
                <table class="my-table" style="border-top: 0pt; height:2.2%">
                    <tr>
                        <th colspan="2">PEMERIKSAAN</th>
                        <th colspan="8">HASIL</th>
                        <th>REFERENSI</th>
                    </tr>
                    {{-- POWER COLLECTOR (MC 1) --}}
                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                        @if ($key == 0)
                            <tr style="background-color:#999696;">
                                <td rowspan="3" style="text-align: center">A.</td>
                                <td rowspan="3" style="text-align: left;width: 35%">
                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group }}
                                </td>
                                <td colspan="4" style="text-align: center">Power Collector 1</td>
                                <td colspan="4" style="text-align: center">Power Collector 2</td>

                                <td rowspan="3" style="width: 21%" rowspan="2"></td>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th colspan="2">PC 1 (+)</th>
                                <th colspan="2">PC 1 (-)</th>
                                <th colspan="2">PC 2 (+)</th>
                                <th colspan="2">PC 2 (-)</th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                            </tr>
                            @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                @if($loop->iteration == 4)  
                                <tr>
                                <th style="width: 5%" rowspan="3">{{ $loop->iteration }} </th>
                                    <th rowspan="3" style="text-align: left">
                                        <h2>{{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}
                                        </h2>
                                    </th>
                                    <td colspan="4" style="text-align: center">NILAI</td>
                                    <td colspan="4"style="text-align: center">NILAI</td>
                                    <td rowspan="3" style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">PC 1 (+)</th>
                                    <th colspan="2">PC 1 (-)</th>
                                    <th colspan="2">PC 2 (+)</th>
                                    <th colspan="2">PC 2 (-)</th>
                                </tr>
                                <tr>
                                    <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus }}</span>
                                    </td>
                                    
                                    <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min }}</span>
                                    </td>
                                    
                                    <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus }}</span>
                                    </td>
                                    
                                    <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min }}</span>
                                    </td>
                                
                                </tr>
                                @else
                                <tr>
                                <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}
                                        </h2>
                                    </th>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                </tr>
                                @endif
                                @break($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group !== $formApmElektrikalVehicleExteriorHarians[$key + 1]->pemeriksaan_exterior_group)
                            @endforeach
                        @endif
                    @endforeach

                        {{-- POWER COLLECTOR (MC 1) --}}
                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                        @if ($key == 0)
                            <tr style="background-color:#999696;">
                                <td rowspan="3" style="text-align: center">B.</td>
                                <td rowspan="3" style="text-align: left;width: 35%">
                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group }}
                                </td>
                                <td colspan="4" style="text-align: center">Power Collector 3</td>
                                <td colspan="4" style="text-align: center">Power Collector 4</td>

                                <td rowspan="3" style="width: 21%" rowspan="2"></td>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th colspan="2">PC 3 (+)</th>
                                <th colspan="2">PC 3 (-)</th>
                                <th colspan="2">PC 4 (+)</th>
                                <th colspan="2">PC 4 (-)</th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                            </tr>
                            </tr>
                            @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                @if($loop->iteration == 4)  
                                <tr>
                                <th style="width: 5%" rowspan="3">{{ $loop->iteration }} </th>
                                    <th rowspan="3" style="text-align: left">
                                        <h2>{{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}
                                        </h2>
                                    </th>
                                    <td colspan="4" style="text-align: center">NILAI</td>
                                    <td colspan="4"style="text-align: center">NILAI</td>
                                    <td rowspan="3" style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">PC 3 (+)</th>
                                    <th colspan="2">PC 3 (-)</th>
                                    <th colspan="2">PC 4 (+)</th>
                                    <th colspan="2">PC 4 (-)</th>
                                </tr>
                                <tr>
                                    <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc3_plus }}</span>
                                    </td>
                                    
                                    <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc3_min }}</span>
                                    </td>
                                    
                                    <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc4_plus }}</span>
                                    </td>
                                    
                                    <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc4_min }}</span>
                                    </td>
                                
                                </tr>
                                @else
                                <tr>
                                <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}
                                        </h2>
                                    </th>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                </tr>
                                @endif

                                @break($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group !== $formApmElektrikalVehicleExteriorHarians[$key + 1]->pemeriksaan_exterior_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                            $formApmElektrikalVehicleExteriorHarians = $formApmElektrikalVehicleExteriorHarians->slice(4);
                        @endphp

                        {{-- POWER COLLECTOR (MC 2) --}}
                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                        @if ($key == 4)
                            <tr style="background-color:#999696;">
                                <td rowspan="3" style="text-align: center">C.</td>
                                <td rowspan="3" style="text-align: left;width: 35%">
                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group }}
                                </td>
                                <td colspan="4" style="text-align: center">Power Collector 1</td>
                                <td colspan="4" style="text-align: center">Power Collector 2</td>

                                <td rowspan="3" style="width: 21%" rowspan="2"></td>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th colspan="2">PC 1 (+)</th>
                                <th colspan="2">PC 1 (-)</th>
                                <th colspan="2">PC 2 (+)</th>
                                <th colspan="2">PC 2 (-)</th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                            </tr>
                            </tr>
                            @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}
                                        </h2>

                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                </tr>
                                

                                @break($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group !== $formApmElektrikalVehicleExteriorHarians[$key + 1]->pemeriksaan_exterior_group)
                            @endforeach
                        @endif
                        
                    @endforeach
                
                        
                    
                    {{-- POWER COLLECTOR (MC 2) --}}
                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                        @if ($key == 4)
                            <tr style="background-color:#999696;">
                                <td rowspan="3" style="text-align: center">D.</td>
                                <td rowspan="3" style="text-align: left;width: 35%">
                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group }}
                                </td>
                                <td colspan="4" style="text-align: center">Power Collector 3</td>
                                <td colspan="4" style="text-align: center">Power Collector 4</td>

                                <td rowspan="3" style="width: 21%" rowspan="2"></td>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th colspan="2">PC 3 (+)</th>
                                <th colspan="2">PC 3 (-)</th>
                                <th colspan="2">PC 4 (+)</th>
                                <th colspan="2">PC 4 (-)</th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                            </tr>
                            </tr>
                            @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}
                                        </h2>

                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc3_plus == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc3_plus == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc3_min == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc3_min == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc4_plus == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc4_plus == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc4_min == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_pc4_min == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                </tr>

                                @break($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group !== $formApmElektrikalVehicleExteriorHarians[$key + 1]->pemeriksaan_exterior_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                            $formApmElektrikalVehicleExteriorHarians = $formApmElektrikalVehicleExteriorHarians->slice(4);
                        @endphp
                    {{-- LED HEAD TAIL LIGHT --}}
                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                        @if ($key == 8)
                            <tr style="background-color:#999696;">
                                <td rowspan="3" style="text-align: center">E.</td>
                                <td rowspan="3" style="text-align: left;width: 35%">
                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group }}
                                </td>
                                <td colspan="4" style="text-align: center">MC 1</td>
                                <td colspan="4" style="text-align: center">MC 2</td>

                                <td rowspan="3" style="width: 21%" rowspan="2"></td>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th colspan="2">LED 1</th>
                                <th colspan="2">LED 2</th>
                                <th colspan="2">LED 1</th>
                                <th colspan="2">LED 2</th>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                            </tr>
                            </tr>
                            @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th style="text-align: left">
                                        <h2>{{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}
                                        </h2>

                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_1_led1 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_1_led1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_1_led2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_1_led2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_2_led1 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_2_led1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_2_led2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_2_led2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                </tr>

                                @break($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group !== $formApmElektrikalVehicleExteriorHarians[$key + 1]->pemeriksaan_exterior_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                            $formApmElektrikalVehicleExteriorHarians = $formApmElektrikalVehicleExteriorHarians->slice(3);
                        @endphp
                    {{-- ELECTRIC HORM --}}
                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                        @if ($key == 11)
                            <tr style="background-color:#999696;">
                                <td rowspan="2" style="text-align: center"> G.</td>
                                <td rowspan="2" colspan="5" style="text-align: left;width: 55%">
                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group }}
                                </td>
                                <td colspan="2" style="text-align: center">MC 1</td>
                                <td colspan="2" style="text-align: center">MC 2</td>

                                <td rowspan="2" style="width: 21%" ></td>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                            </tr>
                            </tr>
                            @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                <tr>
                                    <th style="width: 5%">{{ $loop->iteration }} </th>
                                    <th colspan="5" style="text-align: left">
                                        <h2>{{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}
                                        </h2>

                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                </tr>

                                @break($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group !== $formApmElektrikalVehicleExteriorHarians[$key + 1]->pemeriksaan_exterior_group)
                            @endforeach
                        @endif
                    @endforeach
                    @php
                            $formApmElektrikalVehicleExteriorHarians = $formApmElektrikalVehicleExteriorHarians->slice(3);
                            $key = 14;
                        @endphp


                    @foreach ($formApmElektrikalVehicleExteriorHarians as $formApmElektrikalVehicleExteriorHarian)
                            <tr style="background-color:#999696;">
                                <td rowspan="2" style="text-align: center">{{ $alphabet[$loop->index] }}.</td>
                                <td rowspan="2" colspan="5" style="text-align: left;width: 55%">
                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group }}
                                </td>
                                @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'TRACTION MOTOR (MC 1)')
                                <td colspan="2" style="text-align: center">TM 1</td>
                                <td colspan="2" style="text-align: center">TM 2</td>
                                @elseif($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'TRACTION MOTOR (MC 2)')
                                <td colspan="2" style="text-align: center">TM 3</td>
                                <td colspan="2" style="text-align: center">TM 4</td>
                                @elseif($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'JUMPER PLUG')
                                <td colspan="2" style="text-align: center">Jumper Pluge HJB</td>
                                <td colspan="2" style="text-align: center">Jumper Pluge LJB</td>
                                @else
                                <td colspan="2" style="text-align: center">MC 1</td>
                                <td colspan="2" style="text-align: center">MC 2</td>
                                @endif
                                <td rowspan="2" style="width: 21%" ></td>
                            </tr>
                            <tr style="background-color:#999696;">
                                <th>OK</th>
                                <th>NOK</th>
                                <th>OK</th>
                                <th>NOK</th>
                            </tr>
                            </tr>
                                <tr>
                                    <th style="width: 5%">1. </th>
                                    <th colspan="5" style="text-align: left">
                                        <h2>{{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}
                                        </h2>

                                    </th>
                                    @if($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'TRACTION MOTOR (MC 1)')
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_tm1 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_tm1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_tm2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_tm2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                    @elseif($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'TRACTION MOTOR (MC 2)')
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_tm3 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_tm3 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_tm4 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_tm4 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                    @elseif($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'JUMPER PLUG')
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_jp_hjb == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_jp_hjb == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_jp_ljb == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_jp_ljb == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                    @else
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">{{ $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%">{{ $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorHarian->referensi }}</h3>
                                    </td>
                                </tr>
                                @endif
                                
                    @endforeach



                    
                    <tr>
                        <td colspan="11"></td>
                    </tr>
                    <tr>
                        <td colspan="11" style="text-align: left">CATATAN : {!! $formApmElektrikalVehicleExteriorHarians[17]->catatan !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="ttd-left">
        <p><span class="bold">Supervisor</span></p>
        <p><span class="bold">Power Station 2</span></p>

        @if ($approve !== null)
            <img src="{{ public_path('img/users/ttd/' . ($approve->ttd ?? 'none.png')) }}" width="100px"
                style="display: block">
        @endif
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
    </div> --}}
</body>

</html>
