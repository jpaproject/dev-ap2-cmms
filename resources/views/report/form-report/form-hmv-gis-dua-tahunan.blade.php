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
            font-size:8px;
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
            margin: 0px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 12px;
        }

        .ttd-left {
            margin: 0px 0 0 0px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 12px;
        }

        .ttd-right {
            margin: 0px 0 0 50px;
            text-align: center;
            width: 40%;
            float: right;
            font-size: 12px;
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

        .center td{
            text-align: center;
            vertical-align: middle;
        }

        .table-data {
            border:none;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .table-no {
            border:none;
            border-left: 1px solid black;
        }

        .table-pertanyaan {
            border:none;
            border-right: 1px solid black;
        }
        .table-data tr td {
            background-color: white;
            text-align: left;
            vertical-align: middle;
        }
        .table-header td{
            font-weight: bold;
        }
        .table-header{
            font-weight: bold;
            text-align: center;
            border: 1px solid black;
            border-bottom: none
        }

        .table-end{
            font-weight: bold;
            text-align: center;
            border: 1px solid black;
            border-top: none
        }
        .block-check {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="content page-break">
        <table style="margin-top:50px; padding:20px; border: none;">
            <tr style=" background-color: white;">
                <td style="border: none; width: 50%;"></td>
                <td style="border: none; width: 50%;">
                    <h1 class="center">PT.ANGKASA PURA II</h1>
                    <h1 class="center">BANDAR UDARA SOEKARNO - HATTA</h1>
                    <br>
                    <h1 class="center" style="color:cornflowerblue; text-decoration:underline;">PEMELIHARAAN 2 TAHUNAN GIS 150 KV</h1>
                </td>
                <td style="border: none; width: 50%; text-align:right;">
                    <img style="width: 150px; text-align:right; display:inline;"
                        src="{{ public_path('img/AP2.png') }}" alt="">
                </td>
            </tr>
        </table>
        <div class="body">
            <div class="table">
                <table class="table-data">
                    <tr>
                        <td colspan="5" style="border:1px solid black; width:10px;">
                            <table style="border: none;">
                                <tr style="border: none;">
                                    <td style="border: none;">
                                        <table style="border: none;">
                                            <tr style="border: none;">
                                                <td style="border: none;">EQUIPMENT NUMBER</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvGisDuaTahunans[0]->equipment_number}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">LOCATION/STATION</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvGisDuaTahunans[0]->location_station}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">TYPE</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvGisDuaTahunans[0]->type}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">Reference drawing</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvGisDuaTahunans[0]->reference_drawing}}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td style="border: none; width: 55%">
                                        <table style="border: none;">
                                            <tr style="border: none;">
                                                <td style="border: none;">INSPECTION DATE</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvGisDuaTahunans[0]->inspection_date}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">SERIAL NUMBER</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvGisDuaTahunans[0]->serial_number}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">BRAND/MERK</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvGisDuaTahunans[0]->brand_merk}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">NAME PLATE</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvGisDuaTahunans[0]->name_plate}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;"></td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;"></td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;"></td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">STATUS</td>
                                                <td style="border: none; width:70%;">
                                                    <table>
                                                        <tr>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisDuaTahunans[0]->status == 'OPS' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">OPS</td>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisDuaTahunans[0]->status == 'STBY' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">STBY</td>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvGisDuaTahunans[0]->status == 'REPAIR' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">REPAIR</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 10px; border: 1px solid black; width:10px;">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 20px; border: 1px solid black; width:10px;">

                        </td>
                    </tr>
                    <tr class="center">
                        <td class="table-header" colspan="2" style="text-align: center">
                            LEVEL 1 CEK VISUAL (IN SERVICE INSPECTION)
                        </td>
                        <td class="table-header" style="text-align: center">
                            KONDISI AWAL
                        </td>
                        <td class="table-header" style="text-align: center">
                            KONDISI AKHIR
                        </td>
                        <td class="table-header" style="text-align: center">
                            REMARKS <br> <span style="color:grey">Keterangan Tambahan </span>
                        </td>
                    @foreach ($formHmvGisDuaTahunans as $key => $item)
                        @if($key >= 0 && $key <= 5)
                            <tr>
                                <td style="width: 5%;" class="table-no"><div class="block-check">{{$loop->iteration}}</div></td>
                                <td style="width: 22%;" class="table-pertanyaan">
                                    {{$item->pertanyaan}}
                                </td>
                                @if ($key == 3)
                                    {{-- cacat --}}
                                    <td style="width: 24%;" class="table-data">
                                        <table>
                                            <tr>
                                                <td style="border: 1px solid black; width:10px">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'cacat' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">Cacat</td>
                                                <td style="border: 1px solid black; width:10px">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'tidak-cacat' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">Tidak Cacat</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width: 24%;" class="table-data">
                                        <table>
                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'cacat' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">Cacat</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'tidak-cacat' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">Tidak Cacat</td>
                                            </tr>
                                        </table>
                                    </td>
                                @elseif($key == 5)
                                    {{-- kencang --}}
                                    <td style="width: 24%;" class="table-data">
                                        <table>
                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'kencang' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">kencang</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'longgar' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">Longgar</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width: 24%;" class="table-data">
                                        <table>
                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'kencang' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">kencang</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'longgar' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">Longgar</td>
                                            </tr>
                                        </table>
                                    </td>
                                @else
                                    {{-- berfungsi --}}
                                    <td style="width: 24%;" class="table-data">
                                        <table>
                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'berfungsi' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">berfungsi</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">Tidak berfungsi</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width: 24%;" class="table-data">
                                        <table>
                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'berfungsi' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">Berfungsi</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none;">Tidak Berfungsi</td>
                                            </tr>
                                        </table>
                                    </td>
                                @endif


                                <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$item->remarks}}</td></tr></table></td>
                            </tr>
                        @endif
                    @endforeach

                    <tr>
                        <td class="table-header" colspan="2" style="text-align: left; border:none;">
                            LEVEL 2 (IN SERVICE MEASUREMENT)
                        </td>
                        <td class="table-data" style="text-align: center">
                            {{-- KONDISI AWAL --}}
                        </td>
                        <td class="table-data" style="text-align: center">
                            {{-- KONDISI AKHIR --}}
                        </td>
                        <td class="table-data" style="text-align: center">
                            {{-- REMARKS <br> <span style="color:grey">Keterangan Tambahan </span> --}}
                        </td>
                    </tr>
                    @foreach ($formHmvGisDuaTahunans as $key => $item)
                        @if($key >= 6 && $key <= 12)
                            <tr>
                                <td style="width: 5%;" class="table-no"><div class="block-check">{{$loop->iteration}}</div></td>
                                <td style="width: 22%;" class="table-pertanyaan">
                                    {{$item->pertanyaan}}
                                </td>
                                <td style="width: 24%;" class="table-data">
                                    <table>
                                        @if ($key == 6)
                                        <tr style="border:none;" class="table-header">
                                            <td style="border:none;">Hasil</td>
                                            <td style="border:none;"></td>
                                            <td style="border:none;">Standar</td>
                                            <td style="border:none;"></td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td style="border: 1px solid black; width:40px;">
                                                {{ $item->awal }}
                                            </td>
                                            <td style="border:none;"></td>
                                            @if ($key == 6)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &le; 1
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &#937; (5)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 7)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        97% (6)
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                </td>
                                            @endif
                                            @if ($key == 8)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &lt; 2000
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        ppmv (6)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 9)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &lt; 3960
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        ppmv (6)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 10)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &lt;-5
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &deg; C (6)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 11)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        5-6 (1)
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        bar (6)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 12)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        0,5% /year (7)
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                    </span>
                                                </td>
                                            @endif
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 24%;" class="table-data">
                                    <table>
                                        @if ($key == 6)
                                        <tr style="border:none;" class="table-header">
                                            <td style="border:none;">Hasil</td>
                                            <td style="border:none;"></td>
                                            <td style="border:none;">Standar</td>
                                            <td style="border:none;"></td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td style="border: 1px solid black; width:40px;">
                                                {{ $item->akhir }}
                                            </td>
                                            <td style="border:none;"></td>
                                            @if ($key == 6)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &le; 1
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &#937; (5)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 7)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        97% (6)
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                </td>
                                            @endif
                                            @if ($key == 8)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &lt; 2000
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        ppmv (6)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 9)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &lt; 3960
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        ppmv (6)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 10)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &lt;-5
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &deg; C (6)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 11)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        5-6 (1)
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        bar (6)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 12)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        0,5% /year (7)
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                    </span>
                                                </td>
                                            @endif
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black; width:10px;">{{$item->remarks}}</td></tr></table></td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td colspan="2" class="table-end"></td>
                        <td class="table-end"></td>
                        <td class="table-end"></td>
                        <td class="table-end"></td>
                    </tr>
                </table>
                <br>
                {{-- <table>
                    <tr class="table-hide">
                        <td class="center">Mengetahui <br> ASSISTANT MANAGER ELECTRICAL UTILITY <br> VISUAL AID</td>
                        <td class="center">Penanggung Jawab <br>ELECTRICAL UTILITY SUPERVISOR <br> VISUAL AID</td>
                    </tr>
                </table> --}}
            </div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="content">
        <div class="body">
            <table class="table-data" style="margin-top:50px; padding:20px; border: none;">

                <tr>
                    <td class="table-header" colspan="2" style="text-align: left;">
                        LEVEL 3 (SHUTDOWN MEASUREMENT)
                    </td>
                    <td class="table-header" style="text-align: center">
                        {{-- KONDISI AWAL --}}
                    </td>
                    <td class="table-header" style="text-align: center">
                        {{-- KONDISI AKHIR --}}
                    </td>
                    <td class="table-header" style="text-align: center">
                        {{-- REMARKS <br> <span style="color:grey">Keterangan Tambahan </span> --}}
                    </td>
                </tr>
                @foreach ($formHmvGisDuaTahunans as $key => $item)
                    @if($key >= 13 && $key <= 27)
                        <tr>
                            <td style="width: 5%;" class="table-no"><div class="block-check">{{$loop->iteration}}</div></td>
                            <td style="width: 22%;" class="table-pertanyaan">
                                {{$item->pertanyaan}}
                            </td>
                            @if ($key >= 13 && $key <= 17)
                                <td style="width: 24%;" class="table-data">
                                    <table>
                                        <tr>
                                            <td style="border: 1px solid black; width:40px;">
                                                {{ $item->awal }}
                                            </td>
                                            <td style="border:none;">Hasil</td>
                                            @if ($key == 13)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &ge; 1
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        M&#937;/KV (3)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 14)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &le; 100
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &mu;&#937; (4)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 15)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        120
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        ms (2)
                                                    </span>
                                                </td>
                                            @endif
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 24%;" class="table-data">
                                    <table>
                                        <tr>
                                            <td style="border: 1px solid black; width:40px;">
                                                {{ $item->akhir }}
                                            </td>
                                            <td style="border:none;">Hasil</td>
                                            @if ($key == 13)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &ge; 1
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        M&#937;/KV (3)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 14)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &le; 100
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        &mu;&#937; (4)
                                                    </span>
                                                </td>
                                            @endif
                                            @if ($key == 15)
                                                <td style="border: 1px solid black; width:40px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        120
                                                    </span>
                                                </td>
                                                <td style="border:none;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">
                                                        ms (2)
                                                    </span>
                                                </td>
                                            @endif
                                        </tr>
                                    </table>
                                </td>
                            @elseif($key == 21 || $key == 22 || $key == 23)
                                {{-- kencang --}}
                                <td style="width: 24%;" class="table-data">
                                    <table>
                                        <tr>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'normal' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none;">Normal</td>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'tidak-normal' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none;">Tidak Normal</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 24%;" class="table-data">
                                    <table>
                                        <tr>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'normal' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none;">Normal</td>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'tidak-normal' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none;">Tidak Normal</td>
                                        </tr>
                                    </table>
                                </td>
                            @else
                                {{-- berfungsi --}}
                                <td style="width: 24%;" class="table-data">
                                    <table>
                                        <tr>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'berfungsi' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none;">berfungsi</td>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none;">Tidak berfungsi</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 24%;" class="table-data">
                                    <table>
                                        <tr>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'berfungsi' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none;">Berfungsi</td>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none;">Tidak Berfungsi</td>
                                        </tr>
                                    </table>
                                </td>
                            @endif
                            <td style="width: 24%;" class="table-data">
                                <table>
                                    <tr>
                                        <td style="border:none; border-bottom:1px solid black; width:10px;">
                                            {{$item->remarks}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="5" style="height: 10px; border: 1px solid black;">
                        REMARKS: {{$formHmvGisDuaTahunans[0]->catatan}}
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="height: 10px; border: 1px solid black; width:10px;">
                        (1) standar IEC 480
                        <br>
                        (2) SPUN No. 52-1 1983
                        <br>
                        (3) Standard VDE (catalouge 228/4)
                        <br>
                        (4) SPUN 6921987
                        <br>
                        (5) IEEE std 80:2000
                        <br>
                        (6) CIGRE 234 TF.83.02.01: 2003 (SF6 recycling guide —revision 2003)
                        <br>
                        (7) IEC 62271-203
                    </td>
                </tr>
            </table>
        </div>
    </div>





</body>

</html>
