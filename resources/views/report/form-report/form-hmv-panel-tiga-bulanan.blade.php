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
                    <h1 class="center" style="color:cornflowerblue; text-decoration:underline;">PEMELIHARAAN 3 BULANAN PANEL 20 KV</h1>
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
                                                    {{$formHmvPanelTigaBulanans[0]->equipment_number}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">LOCATION/STATION</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvPanelTigaBulanans[0]->location_station}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;"></td>
                                                <td style="border: none;"></td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">NUMBER OF PANEL</td>
                                                <td style="border: none;border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvPanelTigaBulanans[0]->number_of_panel}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">TYPE</td>
                                                <td style="border: none;">
                                                    <table>
                                                        <tr>
                                                            <td style="border: 1px solid black; width:15px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->type == 'AIS' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">AIS</td>
                                                            <td style="border: 1px solid black; width:15px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->type == 'VACCUM' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">VACCUM</td>
                                                            <td style="border: 1px solid black; width:15px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->type == 'SF6' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">SF6</td>
                                                        </tr>
                                                    </table>
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
                                                <td style="border: none;">Reference drawing</td>
                                                <td style="border: none; border-bottom:1px solid black; width: 50%;">
                                                    {{$formHmvPanelTigaBulanans[0]->reference_drawing}}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td style="border: none; width: 55%">
                                        <table style="border: none;">
                                            <tr style="border: none;">
                                                <td style="border: none;">INSPECTION DATE</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvPanelTigaBulanans[0]->inspection_date}}
                                                </td>
                                            </tr>
                                            <tr style="border: none;">
                                                <td style="border: none;">SERIAL NUMBER</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvPanelTigaBulanans[0]->serial_number}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">BRAND/MERK</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvPanelTigaBulanans[0]->brand_merk}}
                                                </td>
                                            </tr>

                                            <tr style="border: none;">
                                                <td style="border: none;">NAME PLATE</td>
                                                <td style="border: none; border-bottom:1px solid black; width:70%;">
                                                    {{$formHmvPanelTigaBulanans[0]->name_plate}}
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
                                                            <td style="border: 1px solid black; width:15px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->status == 'OPS' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">OPS</td>
                                                            <td style="border: 1px solid black; width:15px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->status == 'STBY' ? '✔' : '' }}</span>
                                                            </td>
                                                            <td style="border:none;">STBY</td>
                                                            <td style="border: 1px solid black; width:15px;">
                                                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->status == 'REPAIR' ? '✔' : '' }}</span>
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
                        <td colspan="5" style="height: 10px; border: 1px solid black;">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 20px; border: 1px solid black;">

                        </td>
                    </tr>
                    <tr class="center">
                        <td class="table-header" colspan="2" style="text-align: center">
                            LEVEL 2 (IN SERVICE MEASUREMENT)
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
                            Pemeriksaan indicator posisi CB Close/Open
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:15px;">
                                        {{-- {{ $formHmvPanelTigaBulanans[0]->awal }} --}}
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->awal == 'normal' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Normal</td>
                                    <td style="border: 1px solid black; width:15px;">
                                        {{-- {{ $formHmvPanelTigaBulanans[0]->awal }} --}}
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->awal == 'tidak-normal' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Normal</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:15px;">
                                        {{-- {{ $formHmvPanelTigaBulanans[0]->akhir }} --}}
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->akhir == 'normal' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Normal</td>
                                    <td style="border: 1px solid black; width:15px;">
                                        {{-- {{ $formHmvPanelTigaBulanans[0]->akhir }} --}}
                                        <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $formHmvPanelTigaBulanans[0]->akhir == 'tidak-normal' ? '✔' : '' }}</span>
                                    </td>
                                    <td style="border:none;">Tidak Normal</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelTigaBulanans[0]->remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td style="width: 5%;" class="table-no"><div class="block-check">2</div></td>
                        <td style="width: 22%;" class="table-pertanyaan">
                            Pemeriksaan counter kerja CB
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvPanelTigaBulanans[1]->awal }}
                                    </td>
                                    <td style="border:none;"></td>
                                    <td style="border: 1px solid black; width:40px;">10000 operating cycles (1)</td>
                                    <td style="border:none;"></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%;" class="table-data">
                            <table>
                                <tr>
                                    <td style="border: 1px solid black; width:40px;">
                                        {{ $formHmvPanelTigaBulanans[1]->akhir }}
                                    </td>
                                    <td style="border:none;"></td>
                                    <td style="border: 1px solid black; width:40px;">10000 operating cycles (1)</td>
                                    <td style="border:none;"></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 24%; border: none;" class="table-data"> <table> <tr><td style="border:none; border-bottom:1px solid black;">{{$formHmvPanelTigaBulanans[0]->remarks}}</td></tr></table></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 10px; border: 1px solid black;">
                            REMARKS: {{$formHmvPanelTigaBulanans[0]->catatan}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 10px; border: 1px solid black;">
                            (1) Catalogue NXPlus-C
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
