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
        .block-check {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="content">
        <table style="margin-top:50px; padding:20px; border: none;">
            <tr style=" background-color: white;">
                <td style="border: none; width: 50%;"></td>
                <td style="border: none; width: 50%;">
                    <h1 class="center">PT.ANGKASA PURA II</h1>
                    <h1 class="center">BANDAR UDARA SOEKARNO - HATTA</h1>
                    <br>
                    <h1 class="center" style="color:cornflowerblue; text-decoration:underline;">PEMELIHARAAN BULANAN PANEL 20 KV</h1>
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
                        <td colspan="5" style="border:1px solid black;">
                            <table style="border: none;">
                                <tr style="border: none;">
                                    <td style="border: none;">
                                        <table style="border: none;">
                                            <tr style="border: none;">
                                                <td style="border: none;">EQUIPMENT NUMBER</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvPanelBulanans[0]->equipment_number}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">LOCATION/STATION</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvPanelBulanans[0]->location_station}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">NUMBER OF PANEL</td>
                                                <td style="border: none;border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvPanelBulanans[0]->number_of_panel}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">TYPE</td>
                                                <td style="border: none;">
                                                    <table>
                                                        <tr>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[0]->type == 'AIS' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none; width:35px;">AIS</td>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[0]->type == 'VACCUM' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none; width:35px;">VACCUM</td>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[0]->type == 'SF6' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none; width:35px;">SF6</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            {{-- <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr> --}}
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
                                                    {{$formHmvPanelBulanans[0]->reference_drawing}}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td style="border: none; width: 55%">
                                        <table style="border: none;">
                                            <tr style="border: none;">
                                                <td style="border: none;">INSPECTION DATE</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvPanelBulanans[0]->inspection_date}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">SERIAL NUMBER</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvPanelBulanans[0]->serial_number}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">BRAND/MERK</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvPanelBulanans[0]->brand_merk}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">NAME PLATE</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvPanelBulanans[0]->name_plate}}
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
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[0]->status == 'OPS' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none; width:35px;">OPS</td>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[0]->status == 'STBY' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none; width:35px;">STBY</td>
                                                            <td style="border: 1px solid black; width:10px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[0]->status == 'REPAIR' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none; width:35px;">REPAIR</td>
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
                        <td colspan="5" style="height: 10px; border: 1px solid black;">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 20px; border: 1px solid black;">

                        </td>
                    </tr>

                    <tr class="center">
                        <td class="table-header" colspan="2" style="text-align: center">
                            LEVEL 1 (IN SERVICE INSPECTION)
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
                    </tr>

                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">1</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan Visual
                        </td>
                        <td style="width: 24%;" class="table-data">

                        </td>
                        <td style="width: 24%;" class="table-data">

                        </td>
                        <td style="width: 24%; border: none;" class="table-data">
                        </td>
                    </tr>
                    @foreach ( $formHmvPanelBulanans as $key => $item )
                        @if($key >= 0 && $key <= 2)
                            <tr>
                                <td style="width: 5%;" class="table-no"></td>
                                <td style="width: 22%;" class="table-pertanyaan">
                                    {{$item->pertanyaan}}
                                </td>
                                <td style="width: 24%;" class="table-data">
                                    <table>

                                        <tr>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'ada' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none; width:35px;">Ada</td>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'tidak-ada' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none; width:35px;">Tidak Ada</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 24%;" class="table-data">
                                    <table>

                                        <tr>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'ada' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none; width:35px;">Ada</td>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'tidak-ada' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none; width:35px;">Tidak Ada</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelBulanans[0]->remarks}}</td></tr></table></td>
                            </tr>
                        @endif
                        @if($key == 3)
                            <tr>
                                <td style="width: 5%;" class="table-no"></td>
                                <td style="width: 22%;" class="table-pertanyaan">
                                    {{$item->pertanyaan}}
                                </td>
                                <td style="width: 24%;" class="table-data">
                                    <table>

                                        <tr>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'berfungsi' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none; width:35px;">Berfungsi</td>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none; width:35px;">Tidak Berfungsi</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 24%;" class="table-data">
                                    <table>

                                        <tr>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'berfungsi' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none; width:35px;">Berfungsi</td>
                                            <td style="border: 1px solid black; width:10px;">
                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                            </td>
                                            <td style="border:none; width:35px;">Tidak Berfungsi</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelBulanans[0]->remarks}}</td></tr></table></td>
                            </tr>
                        @endif
                    @endforeach

                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">2</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan Lemari Kontrol
                        </td>
                        <td style="width: 24%;" class="table-data">

                        </td>
                        <td style="width: 24%;" class="table-data">

                        </td>
                        <td style="width: 24%; border: none;" class="table-data">
                        </td>
                    </tr>
                    @foreach ( $formHmvPanelBulanans as $key => $item )
                        @if($key >= 4 && $key <= 6)
                            <tr>
                                <td style="width: 5%;" class="table-no"></td>
                                <td style="width: 22%;" class="table-pertanyaan">
                                    {{$item->pertanyaan}}
                                </td>

                                @if($key == 4)
                                    <td style="width: 24%;" class="table-data">
                                        <table>

                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'berfungsi' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Berfungsi</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Tidak Berfungsi</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width: 24%;" class="table-data">
                                        <table>

                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'berfungsi' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Berfungsi</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Tidak Berfungsi</td>
                                            </tr>
                                        </table>
                                    </td>
                                @elseif($key == 5)
                                    <td style="width: 24%;" class="table-data">
                                        <table>

                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'menyala' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Menyala</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'tidak-menyala' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Tidak Menyala</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width: 24%;" class="table-data">
                                        <table>

                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'menyala' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Menyala</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'tidak-menyala' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Tidak Menyala</td>
                                            </tr>
                                        </table>
                                    </td>
                                @elseif($key == 6)
                                    <td style="width: 24%;" class="table-data">
                                        <table>

                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'bersih' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Bersih</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->awal == 'kotor' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Kotor</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width: 24%;" class="table-data">
                                        <table>

                                            <tr>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'bersih' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Bersih</td>
                                                <td style="border: 1px solid black; width:10px;">
                                                    <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->akhir == 'kotor' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="border:none; width:35px;">Kotor</td>
                                            </tr>
                                        </table>
                                    </td>
                                @endif

                                <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelBulanans[0]->remarks}}</td></tr></table></td>
                            </tr>
                        @endif
                    @endforeach

                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">3</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan struktur mekanik kubikel
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[7]->awal == 'normal' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none; width:35px;">Normal</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[7]->awal == 'tidak-normal' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none; width:35px;">Tidak Normal</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[7]->akhir == 'normal' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none; width:35px;">Normal</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[7]->akhir == 'tidak-normal' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none; width:35px;">Tidak Normal</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelBulanans[7]->remarks}}</td></tr></table></td>
                    </tr>

                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">4</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan visual alat ukur dan rele
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[8]->awal == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none; width:35px;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[8]->awal == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none; width:35px;">Tidak Befungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[8]->akhir == 'berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none; width:35px;">Berfungsi</td>
                                    <td style="border: 1px solid black; width:10px;">
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelBulanans[8]->akhir == 'tidak-berfungsi' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none; width:35px;">Tidak Befungsi</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelBulanans[8]->remarks}}</td></tr></table></td>
                    </tr>
                    <tr class="center">
                        <td class="table-header" colspan="2" style="text-align: center; border:none;">
                            LEVEL 2 (IN SERVICE MEASUREMENT)
                        </td>
                        <td class="table-data" style="text-align: center">

                        </td>
                        <td class="table-data" style="text-align: center">

                        </td>
                        <td class="table-data" style="text-align: center">
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">5</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pengukuran suplai tegangan AC kubikel
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr style="border:none;" class="table-header">
                                    <td style="border:none; width:35px;">Hasil</td>
                                    <td style="border:none; width:35px;"></td>
                                    <td style="border:none; width:35px;">Standar</td>
                                    <td style="border:none; width:35px;"></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvPanelBulanans[9]->awal }}
                                    </td>
                                    <td style="border:none; width:35px;"></td>
                                    <td style="border: 1px solid black; width:40px;">< 85% atau >100% dari 20 kV</td>
                                    <td style="border:none; width:35px;"></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr style="border:none;" class="table-header">
                                    <td style="border:none; width:35px;">Hasil</td>
                                    <td style="border:none; width:35px;"></td>
                                    <td style="border:none; width:35px;">Standar</td>
                                    <td style="border:none; width:35px;"></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvPanelBulanans[9]->akhir }}
                                    </td>
                                    <td style="border:none; width:35px;">&deg;C</td>
                                    <td style="border: 1px solid black; width:40px;">< 85% atau >100% dari 20 kV</td>
                                    <td style="border:none; width:35px;">&deg;C (2)</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelBulanans[9]->remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">6</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pengukuran suhu kubikel
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvPanelBulanans[10]->awal }}
                                    </td>
                                    <td style="border:none; width:35px;"></td>
                                    <td style="border: 1px solid black; width:40px;">35</td>
                                    <td style="border:none; width:35px;">&deg;C (1)</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvPanelBulanans[10]->akhir }}
                                    </td>
                                    <td style="border:none; width:35px;"></td>
                                    <td style="border: 1px solid black; width:40px;">35</td>
                                    <td style="border:none; width:35px;">&deg;C (1)</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelBulanans[10]->remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">7</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pengukuran suhu terminal dan sambungan rel, CT, PT,kabel dalam
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvPanelBulanans[11]->awal }}
                                    </td>
                                    <td style="border:none; width:35px;"></td>
                                    <td style="border: 1px solid black; width:40px;">35</td>
                                    <td style="border:none; width:35px;">&deg;C (1)</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvPanelBulanans[11]->akhir }}
                                    </td>
                                    <td style="border:none; width:35px;"></td>
                                    <td style="border: 1px solid black; width:40px;">35</td>
                                    <td style="border:none; width:35px;">&deg;C (1)</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelBulanans[11]->remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 10px; border: 1px solid black;">
                            REMARKS: {{$formHmvPanelBulanans[0]->catatan}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 10px; border: 1px solid black;">
                            (1) IEC 60051-9
                        </td>
                    </tr>
                </table>
                <br>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>






</body>

</html>
