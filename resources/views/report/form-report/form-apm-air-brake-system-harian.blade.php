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
            margin: 20px 20px;

        }

        td,
        th {
            border: 1px solid #dddddd;
            padding: 3px;
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

        .d-inline {
            display: inline;
        }

        .ttd {
            margin: 10px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 10px;
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
                        <td rowspan="4" style="width: 25%;text-align:center"><h3>Lembar Pemeriksaan Harian Mechanical
                            Vehicle</h3></td>
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
                        <th style="width: 30%; font-size: 7px;text-align:left">
                            {{ $formApmVehicleAirBrakeSystemHarians[0]['created_at']->format('d-m-Y') }} </td>
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
                        <td style="width: 20%; font-size: 10px;">Trainset</td>
                        <td style="width: 5%; font-size: 10px;">:</td>
                        <td style="width: 30%; font-size: 10px;"></td>
                        <td style="width: 20%; font-size: 10px;">Petugas</td>
                        <td style="width: 5%; font-size: 10px;">:</td>
                        <td style="width: 30%; font-size: 10px;"></td>
                        <td style="width: 20%; font-size: 10px;">Spv.</td>
                        <td style="width: 5%; font-size: 10px;">:</td>
                        <td style="width: 30%; font-size: 10px;"></td>
                    </tr>
                    <tr>
                        <td style="width: 20%; font-size: 10px;">Tanggal</td>
                        <td style="width: 5%; font-size: 10px;">:</td>
                        <td style="width: 30%; font-size: 10px;">
                            {{ $formApmVehicleAirBrakeSystemHarians[0]['created_at']->format('d-m-Y') }}
                        </td>
                        <td rowspan="2" style="width: 20%; font-size: 10px;">Paraf</td>
                        <td rowspan="2" style="width: 5%; font-size: 10px;">:</td>
                        <td rowspan="2" style="height:2%"></td>
                        <td rowspan="2" style="width: 20%; font-size: 10px;">Paraf</td>
                        <td rowspan="2" style="width: 5%; font-size: 10px;">:</td>
                        <td rowspan="2" style="height: 2%"></td>
                    </tr>
                    <tr>
                        <td style="width: 20%; font-size: 10px;">Periode Pemeriksaan</td>
                        <td style="width: 5%; font-size: 10px;">:</td>
                        <td style="width: 30%; font-size: 10px;">per 1 hari</td>
                    </tr>
                    <tr>
                        <td colspan="9"></td>
                    </tr>
                </table>



                {{-- Alfabet Array --}}
                @php
                    $alphabet = range('A', 'Z'); // Creates an array with letters A to Z
                @endphp

                {{-- AIR COMPRESSOR --}}
                <table class="my-table" style="border-top: 0pt; height:2.2%">
                    <tr>
                        <th colspan="2">PEMERIKSAAN AIR BRAKE SYSTEM</th>
                        <th colspan="4">HASIL</th>
                        <th>REFERENSI</th>
                    </tr>
                    @foreach ($formApmVehicleAirBrakeSystemHarians as $formApmVehicleAirBrakeSystemHarian)
                        <tr style="background-color:#999696;">
                            <th style="width: 5%" rowspan="2">{{ $alphabet[$loop->index] }}.</th>
                            <th style="width: 55%" rowspan="2">
                                <h4 style="font-size: 10px vertical-align:middle; text-align:left">
                                    {{ $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system_group }}</h4>
                            </th>
                            @if ($loop->index == 0)
                                <th colspan="4">MC 1</th>
                            @else
                                <th colspan="2">MC 1</th>
                            @endif
                            @if ($loop->index != 0)
                                <th colspan="2">MC 2</th>
                            @endif
                            <th style=" width: 21%;" rowspan="2">
                                <h3 style=" font-size: 10px vertical-align:middle;"></h3>
                            </th>
                        </tr>
                        <tr style="background-color:#999696;">
                            @if ($loop->index == 0)
                                <th colspan="2">
                                    OK
                                </th>
                                <th colspan="2">
                                    NOK
                                </th>
                            @else
                                <th>
                                    OK
                                </th>
                                <th>
                                    NOK
                                </th>
                            @endif
                            @if ($loop->index != 0)
                                <th>
                                    OK
                                </th>
                                <th>
                                    NOK
                                </th>
                            @endif
                        </tr>
                        <tr>
                            <td style="width: 5%; text-align:center" >1.</td>
                            <td style="width: 55%">
                                <h3 style="font-size: 10px; vertical-align:middle; text-align=left; ">
                                    {{ $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system }}</h3>
                            </td>
                            @if ($loop->index == 0)
                                <td style=" font-size: 7px;text-align:center" colspan="2"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px;widith:50%;">{{ $formApmVehicleAirBrakeSystemHarian->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                </td>
                                <td style=" font-size: 7px;text-align:center" colspan="2"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px;widith:50%">{{ $formApmVehicleAirBrakeSystemHarian->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                </td>
                            @else
                                <td style=" font-size: 7px;text-align:center"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px;widith:50%;">{{ $formApmVehicleAirBrakeSystemHarian->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                </td>
                                <td style=" font-size: 7px;text-align:center"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px;widith:50%">{{ $formApmVehicleAirBrakeSystemHarian->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                </td>
                            @endif
                            @if ($loop->index != 0)
                                <td style=" font-size: 7px;text-align:center"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px;widith:50%;">{{ $formApmVehicleAirBrakeSystemHarian->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                                </td>
                                <td style=" font-size: 7px;text-align:center"><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px;widith:50%">{{ $formApmVehicleAirBrakeSystemHarian->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                                </td>
                            @endif
                            </td>
                            <td style="width: 21%" rowspan>
                                <h3 style="font-size: 10px;  text-align:left; vertical-align:middle;">
                                    {{ $formApmVehicleAirBrakeSystemHarian->referensi }}</h3>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    <tr>
                        <td colspan="7" height="60" style="text-align: left; vertical-align:baseline">CATATAN : {!! $formApmVehicleAirBrakeSystemHarians[0]->catatan !!}</td>
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
    <div style="clear: both"></div> --}}
    </div>
</body>

</html>
