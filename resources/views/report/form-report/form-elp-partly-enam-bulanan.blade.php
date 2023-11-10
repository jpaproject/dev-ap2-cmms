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
            padding: 0 20px 0 20px;
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
            margin: 0 20px 0 20px;

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            vertical-align: middle;
            padding: 7px;
            width: 100px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
            font-size: 12px;
            text-align: center
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
            text-align: left;
            width: 70%;
            float: right;
            font-size: 15px;
        }

        .table-left {
            padding: 0 0 0 10%;
            width: 50%;
            float: left;
            font-size: 15px;
        }

        .table-right {
            margin: 0 0 0 20%;
            width: 50%;
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

        .sub-heade {
            width: 100%
        }

        .sub-header,
        .sub-header td,
        .sub-header th {
            border: none;
            /* Menghilangkan batas sel */
        }

        table,
        th,
        td {
            border: 1px solid black;
            /* Set border to black color */
        }

        .table-title {
            width: 100%;
        }

        h1 {
            font-size: 15px
        }

        .table-title th {
            padding: 2px;
            font-weight: normal;
        }

        .table-title th h1 {
            padding: 2px;
            font-weight: bold;
        }

        th .img-logo {
            width: 50%
        }

        .table-title .isian th {
            height: 35px;
        }

        .catatan {
            margin: 20px 0;
            border: 1px solid black;
            height: 250px;
            padding: 5px
        }

        .th-wrap {
            overflow: visible;
            white-space: wrap;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <div class="title">
                <table class="table-title">
                    <tr>
                        <th style="width:80%; border-bottom: none" colspan="5">
                            <h1>PT. ANGKASA PURA 2 (PERSERO)</h1>
                        </th>
                        <th class="" style="width:20%" rowspan="2"><img style="max-width: 100%"
                                src="{{ public_path('img/AP2.png') }}" alt=""></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="border-top: none">
                            <h1>ELECTRICAL PROTECTION MAINTENANCE REPORT</h1>
                        </th>
                    </tr>
                    <tr>
                        <th>PENGAWAS AP2</th>
                        <th>SUBSTATION</th>
                        <th>HARI</th>
                        <th>TANGGAL</th>
                        <th>BULAN</th>
                        <th>TAHUN</th>
                    </tr>

                    <tr class="isian">
                        <th></th>
                        <th>{{ $formElpPartlyEnamBulanans[0]->substation }}</th>
                        <th>{{ $hari }}</th>
                        <th>{{ substr($tanggal, 3, 2) }}</th>
                        <th>{{ $bulan }}</th>
                        <th>{{ substr($tanggal, 6) }}</th>
                    </tr>
                </table>
            </div>

        </div>
        <div class="body">
            <div class="table">
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="width: 10%" rowspan="2">GARDU</th>
                        <th style="width: 10%" rowspan="2">RELAY</th>
                        <th style="width: 10%" rowspan="2">ELEMENT</th>
                        <th style="width: 12%" rowspan="2"></th>
                        <th style="width: 12%" rowspan="2">CALCULATION</th>
                        <th style="width: 20%" colspan="2">TEST TRIP</th>
                        <th style="width: 10%" rowspan="2">RASIO<br>CT</th>
                        <th style="width: 16%" rowspan="2">KETERANGAN</th>
                    </tr>
                    <tr>
                        <th>RELAY</th>
                        <th>CB</th>
                    </tr>

                    {{-- First Row --}}
                    <tr>
                        <td class="th-wrap" rowspan="24">{{ $formElpPartlyEnamBulanans[0]->gardu }}</td>
                        <td class="th-wrap" rowspan="24">{{ $formElpPartlyEnamBulanans[0]->substation }}</td>
                        <td class="th-wrap" rowspan="6">{{ $formElpPartlyEnamBulanans[0]->element }}</td>
                        <td>Curve Tripping</td>
                        <td colspan="4">{{ $formElpPartlyEnamBulanans[0]->curve_tripping }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Isset (A)</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->isset_a_calculation }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->isset_a_test_trip_relay }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->isset_a_test_trip_cb }}</td>
                        <td rowspan="5">{{ $formElpPartlyEnamBulanans[0]->rasio_ct }}</td>
                        <td rowspan="5">{{ $formElpPartlyEnamBulanans[0]->keterangan }}</td>
                    </tr>
                    <tr>
                        <td>Ifault (A)</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->ifault_a_calculation }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->ifault_a_test_trip_relay }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->ifault_a_test_trip_cb }}</td>
                    </tr>
                    <tr>
                        <td>10I/Is (s)</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->ten_i_calculation }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->ten_i_test_trip_relay }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->ten_i_test_trip_cb }}</td>
                    </tr>
                    <tr>
                        <td>TMS (s)</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->tms_calculation }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->tms_test_trip_relay }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->tms_test_trip_cb }}</td>
                    </tr>
                    <tr>
                        <td>t (s)</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->t_calculation }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->t_test_trip_relay }}</td>
                        <td>{{ $formElpPartlyEnamBulanans[0]->t_test_trip_cb }}</td>
                    </tr>
                    @foreach ($formElpPartlyEnamBulanans->slice(1) as $formElpPartlyEnamBulanan)
                        <tr>
                            <td rowspan="6">{{ $formElpPartlyEnamBulanan->element }}</td>
                            <td>Curve Tripping</td>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Isset (A)</td>
                            <td>{{ $formElpPartlyEnamBulanan->isset_a_calculation }}</td>
                            <td>{{ $formElpPartlyEnamBulanan->isset_a_test_trip_relay }}</td>
                            <td>{{ $formElpPartlyEnamBulanan->isset_a_test_trip_cb }}</td>
                            <td rowspan="5">{{ $formElpPartlyEnamBulanan->rasio_ct }}</td>
                            <td rowspan="5">{{ $formElpPartlyEnamBulanan->keterangan }}</td>
                        </tr>
                        @foreach ($properties as $property)
                            @php
                                $tempName = $property['name'] . '_';
                                $tempCalculation = $tempName . 'calculation';
                                $tempTestTripRelay = $tempName . 'test_trip_relay';
                                $tempTestTripCb = $tempName . 'test_trip_cb';
                            @endphp
                            <tr>
                                <td>{{ $property['title'] }}</td>
                                <td>{{ $formElpPartlyEnamBulanan->$tempCalculation }}</td>
                                <td>{{ $formElpPartlyEnamBulanan->$tempTestTripRelay }}</td>
                                <td>{{ $formElpPartlyEnamBulanan->$tempTestTripCb }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    {{-- Second Row --}}
                    {{-- <tr>
                        <td rowspan="6">SC</td>
                        <td>Curve Tripping</td>
                        <td colspan="4"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Isset (A)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="5"></td>
                        <td rowspan="5"></td>
                    </tr>
                    <tr>
                        <td>Ifault (A)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10I/Is (s)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>TMS (s)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>t (s)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> --}}

                    {{-- Third Row --}}
                    {{-- <tr>
                        <td rowspan="6">GF</td>
                        <td>Curve Tripping</td>
                        <td colspan="4"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Isset (A)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="5"></td>
                        <td rowspan="5"></td>
                    </tr>
                    <tr>
                        <td>Ifault (A)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10I/Is (s)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>TMS (s)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>t (s)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> --}}

                    {{-- Fourth Row --}}
                    {{-- <tr>
                        <td rowspan="6">GF</td>
                        <td>Curve Tripping</td>
                        <td colspan="4"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Isset (A)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="5"></td>
                        <td rowspan="5"></td>
                    </tr>
                    <tr>
                        <td>Ifault (A)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10I/Is (s)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>TMS (s)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>t (s)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> --}}
                </table>
                <div class="catatan">
                    <span>Catatan:</span>
                    <br><br>{!! nl2br($formElpPartlyEnamBulanans[0]->catatan) !!}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
