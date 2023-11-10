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
            text-align: center;
            vertical-align: middle;
            padding: 7px;
            width: 100px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
            font-size: 10px;
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

        .float-left {
            margin: 20px 0 0 0px;
            text-align: center;
            width: 50%;
            float: left;
            font-size: 12px;
        }

        .float-right {
            margin: 20px 0 0 0px;
            text-align: left;
            width: 50%;
            float: right;
            font-size: 12px;
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
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <div class="title">
                {{-- <img style="width: 120px; text-align:left; display:inline; margin-right:140px"
                    src="{{ public_path('img/AP2.png') }}" alt=""> --}}
                {{-- <h1 style="font-size: 18px; display:inline; margin-right:240px; ">PEMELIHARAAN PANEL SDP</h1> --}}
                <h1 style="font-size: 18px; text-align:center">POWER STATION 3 - EPCC</h1>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table style="tab;e-layout: fixed">
                    <tr>
                        <th colspan="4">SPESIFIKASI TRANSFORMATOR</th>
                    </tr>
                    <tr>
                        <td>MERK</td>
                        <td style="text-align: left">:</td>
                        <td>KVA</td>
                        <td style="text-align: left">: 3300/4125</td>
                    </tr>
                    <tr>
                        <td>TAHUN</td>
                        <td style="text-align: left">:</td>
                        <td>BERAT</td>
                        <td style="text-align: left">: 3300/4125</td>
                    </tr>
                    <tr>
                        <td>NO TAHUN</td>
                        <td style="text-align: left">:</td>
                        <td>TYPE</td>
                        <td style="text-align: left">: TRIHAL - DYN 05</td>
                    </tr>
                </table>
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="">1. </th>
                        <th style="text-align: left" colspan="3">PEMERIKSAAN SUHU TRANSFORMATOR (°C)</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px; text-align: left" colspan="3">N1 : {{ $formPs3TrafoGensetCheckEnamBulananTahunan->n1 }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px; text-align: left" colspan="3">N2 : {{ $formPs3TrafoGensetCheckEnamBulananTahunan->n2 }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px; text-align: left" colspan="3">N3 : {{ $formPs3TrafoGensetCheckEnamBulananTahunan->n3 }}</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    <tr>
                        <td>2. </td>
                        <td style="text-align: left" colspan="3">PEMERIKSAAN TAHANAN ISOLASI</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1 MENIT</td>
                        <td>10 MENIT</td>
                    </tr>
                    <tr>
                        <td style="width: 10%"></td>
                        <td style="width: 40%; padding-left:10px">HV - G (5000V)</td>
                        <td style="width: 25%">{{ $formPs3TrafoGensetCheckEnamBulananTahunan->hv_g_1m }}</td>
                        <td style="width: 25%">{{ $formPs3TrafoGensetCheckEnamBulananTahunan->hv_g_10m }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px">LV - G (5000V)</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->lv_g_1m }}</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->lv_g_10m }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px">HV - LV (5000V)</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->hv_lv_1m }}</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->hv_lv_10m }}</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td style="text-align: left">PENGUKURAN TAHANAN ISOLASI KABEL MV </td>
                        <td colspan="2">5000V</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: left">JENIS KABEL :</td>
                        <td>1 MENIT</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px">L1 - G</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->l1_g_1m }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px">L2 - G</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->l2_g_1m }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px">L3 - G</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->l3_g_1m }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px">L3 - L2</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->l1_l2_1m }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px">L2 - L3</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->l2_l3_1m }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left : 10px">L1-L3</td>
                        <td>{{ $formPs3TrafoGensetCheckEnamBulananTahunan->l1_l3_1m }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="background-color: white" colspan="4">
                            <p style="margin-left: 20px; text-align:left; font-size:12px ">{{ $formPs3TrafoGensetCheckEnamBulananTahunan->catatan }}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="ttd-left">
            <p><span class="bold">Supervisor</span></p>
            <p><span class="bold">Power Station 3</span></p>
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

    </div>
</body>

</html>
