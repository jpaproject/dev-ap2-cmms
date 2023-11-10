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
            padding: 1px;
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
                        <td rowspan="4" style="width: 25%;text-align:center">
                            <h3>Lembar Pemeriksaan 3 Bulanan Battery Box & Battery</h3>
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
                            {{ $formApmElektrikalVehicleExteriorBATTigaBulanans[0]['created_at']->format('d-m-Y') }}

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
                        <th style="width: 30%; font-size: 7px;text-align:left">4 Halaman</td>
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
                            {{ $formApmElektrikalVehicleExteriorBATTigaBulanans[0]['created_at']->format('d-m-Y') }}
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
                <table class="my-table">
                    <tr>
                        <th colspan="2" rowspan="2" style="width:55%">PEMERIKSAAN </th>
                        <th colspan="2" ">HASIL</th>
                        <th rowspan="2" style="width: 20%;">REFERENSI</th>
                    </tr>
                    <tr>
                        <th style="width: 50px" >OK</th>
                        <th style="width: 50px" >NOK</th>
                    </tr>
                    @php
                    $alphabet = range('A', 'Z'); // Creates an array with letters A to Z
                    $number = range(1, 10); // Creates an array with numbers from 1 to 100
                    $numberapla =  range(1, 27);
                @endphp
                @php
                    $numberalpa =0;
                @endphp
                @foreach ($formApmElektrikalVehicleExteriorBATTigaBulanans as $key => $formApmElektrikalVehicleExteriorBATTigaBulanan) 
                    @if ($key == 0 || $formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat_group != $formApmElektrikalVehicleExteriorBATTigaBulanans[$key - 1]->pemeriksaan_bat_group)
                        @php
                            $number = 1;
                        @endphp    
                        <tr style="background-color:#999696;">
                                <td  style="text-align: center">{{ $alphabet[$numberalpa] }}.</td>
                                <td colspan="4" style="text-align: left;width: 55%">
                                    {{ $formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat_group }}
                                </td>
                            </tr>
                            @php
                                $numberalpa++;
                            @endphp
                        @endif
                            
                                <tr>
                                    <th style="width: 5%">{{ $number }} </th>
                                    <th style="text-align: left; widith:55%">
                                        <h2>{{ $formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat }}
                                        </h2>

                                    </th>

                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formApmElektrikalVehicleExteriorBATTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formApmElektrikalVehicleExteriorBATTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="width: 21%">
                                        <h3 style="font-size: 10px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorBATTigaBulanan->referensi }}</h3>
                                    </td>
                                </tr>
                                @php
                                    $number++;
                                    @endphp
                                    @break($key == 6)
                @endforeach
                </table>

                {{-- DATA NILAI BATERRY --}}
                <table class="my-table">
                
                @php
                    $numberlooping = range(1, 100);
                    $numberlooping = 7;
                @endphp
                @foreach ($formApmElektrikalVehicleExteriorBAThasilTigaBulanans as $key => $formApmElektrikalVehicleExteriorBAThasilTigaBulanan)
                @if ($key == 0 || $key == 7 || $key == 14 || $key == 21 || $key == 28 || $key == 35 || $key == 42 || $key == 49 || $key == 56 || $key == 63)
                    <tr>
                    <th rowspan="10" style="width: 5%">{{ $number }} </th>
                    <td colspan="4">Pengukuran Terminal Battery 1.2 Vdc, 50 Ah, 70 Cell ( 70 x 1.2 = 84 Vdc )</td>
                </tr>
                @php
                    $number++;
                @endphp
                <tr>
                    <th colspan="4">{{ $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->pemeriksaan_bat_group }}{{ "  RAK " }}{{ $number-4 }}</th>
                </tr>
                <tr>
                    <th colspan="2">Baterai</th>
                    <th>Nilai Pengukuran (VDC)</th>
                    <th>Referensi</th>
                </tr>
                <tr>
                    <th>{{ $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->pemeriksaan_bat }}</th>
                    <th> = </th>
                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->hasil_pengukuran }}</span>
                                    </td>
                    <td  rowspan="7" style="width: 21%">
                                        <h3 style="font-size: 10px;  text-align:left; vertical-align:middle;">
                                            {{ $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->referensi }}</h3>
                                    </td>
                </tr>
                
                @else
                <tr>
                    <th>{{ $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->pemeriksaan_bat }}</th>
                    <th> = </th>
                    <td style=" font-size: 7px;text-align:center"><span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->hasil_pengukuran }}</span>
                                    </td>
                    
                </tr>
                @if ($key == 27 )
                    <tr style="padding-top: 300px">
                        <td style="border: none"></td>
                    </tr>
                @endif
                @endif
                @endforeach
                <tr>
                    <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: left;vertical-align:baseline" height="60">Catatan : {!! $formApmElektrikalVehicleExteriorBAThasilTigaBulanans[0]->catatan !!}</td>
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
