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
            padding: 8px;
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
                            <h3>Lembar Pemeriksaan 3 Bulanan Jumper Plug</h3>
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
                            {{ $formApmElektrikalVehicleExteriorJPTigaBulanans[0]['created_at']->format('d-m-Y') }}

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
                            {{ $formApmElektrikalVehicleExteriorJPTigaBulanans[0]['created_at']->format('d-m-Y') }}
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
                        <th colspan="4" ">HASIL</th>
                        <th rowspan="2" style="width: 20%;">REFERENSI</th>
                    </tr>
                    <tr>
                        <th style="width: 15px" colspan="2">OK</th>
                        <th style="width: 15px" colspan="2">NOK</th>
                    </tr>
                    @php
                        $alphabet = range('A', 'Z'); // Creates an array with letters A to Z
                        $number = range(1, 10); // Creates an array with numbers from 1 to 100
                        $numberapla = range(1, 27);
                    @endphp
                @php
                    $numberalpa = 0;
                @endphp
                @foreach ($formApmElektrikalVehicleExteriorJPTigaBulanans as $key=>
                            $formApmElektrikalVehicleExteriorJPTigaBulanan)
                            @if ($key == 0)
                                @php
                                    $number = 1;
                                @endphp
                    <tr style="background-color:#999696;">
                        <td rowspan="3" style="text-align: center">{{ $alphabet[$numberalpa] }}.</td>
                        <td colspan="6" style="text-align: left;width: 55%">
                            {{ $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp_group }}
                        </td>
                    </tr>
                    <tr >
                        <th rowspan="2"></th>
                        <th style="width: 15px" colspan="2">750 Vdc</th>
                        <th style="width: 15px" colspan="2">380 Vac</th>
                        <th rowspan="2"></th>
                    </tr>
                    <tr>
                        <th style="width: 15px">OK</th>
                        <th style="width: 15px">NOK</th>
                        <th style="width: 15px">OK</th>
                        <th style="width: 15px">NOK</th>
                    </tr>
                    @php
                        $numberalpa++;
                    @endphp
                @elseif($key == 5 )
                    @php
                        $number = 1;
                    @endphp
                    <tr style="background-color:#999696;">
                        <td rowspan="3" style="text-align: center">{{ $alphabet[$numberalpa] }}.</td>
                        <td colspan="6" style="text-align: left;width: 55%">
                            {{ $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp_group }}
                        </td>
                    </tr>
                    <tr>
                        <th rowspan="2"></th>
                        <th style="width: 30px" colspan="4">HASIL</th>
                        <th rowspan="2"></th>
                    </tr>
                    <tr>
                        <th style="width: 15px" colspan="2">OK</th>
                        <th style="width: 15px" colspan="2">NOK</th>
                    </tr>
                    @php
                        $numberalpa++;
                    @endphp
                    @endif
                    @if ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp_group == 'JUMPER PLUG LJB MC 1 to LJB MC 2')
                        <tr>
                        <th style="width: 5%">{{ $number }} </th>
                        <th style="text-align: left; widith:55%">
                            <h2>{{ $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp }}
                            </h2>

                        </th>

                        <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 12px;">{{ $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                        </td>
                        <td colspan="2" style=" font-size: 7px;text-align:center"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 12px;">{{ $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                        </td>
                        <td  style="width: 21%">
                            <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                {{ $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi }}</h3>
                        </td>
                    </tr>
                    @php
                        $number++;
                    @endphp
                    @else
                    <tr>
                        <th style="width: 5%">{{ $number }} </th>
                        <th style="text-align: left; widith:55%">
                            <h2>{{ $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp }}
                            </h2>

                        </th>

                        <td style=" font-size: 7px;text-align:center"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 12px;">{{ $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc1 == 'ok' ? '✔' : '' }}</span>
                        </td>
                        <td style=" font-size: 7px;text-align:center"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 12px;">{{ $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc1 == 'nok' ? '✔' : '' }}</span>
                        </td>
                        <td style=" font-size: 7px;text-align:center"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 12px;">{{ $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc2 == 'ok' ? '✔' : '' }}</span>
                        </td>
                        <td style=" font-size: 7px;text-align:center"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 12px;">{{ $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc2 == 'nok' ? '✔' : '' }}</span>
                        </td>
                        <td style="width: 21%">
                            <h3 style="font-size: 12px;  text-align:left; vertical-align:middle;">
                                {{ $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi }}</h3>
                        </td>
                    </tr>
                    @php
                        $number++;
                    @endphp
                    @endif
                    @endforeach

                    <td colspan="7"></td>
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align: left">Catatan : {!! $formApmElektrikalVehicleExteriorJPTigaBulanans[0]->catatan !!}</td>
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
