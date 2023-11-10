</html>
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
            padding: 5px;
            width: 100px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
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

        .ttd-left {
            margin: 40px 0 0 0px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 15px;
        }

        .ttd-right {
            margin: 40px 0 0 50px;
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

        .left {
            text-align: left;
        }
    </style>
</head>

<body>
    @foreach ( $formPs3GensetCheckEnamBulananTahunans as $key => $formPs3GensetCheckEnamBulananTahunan)
    <div class="content @if(!$loop->last) page-break @endif">
        <div class="header">
            <div class="title">
                <h1 style="font-size: 18px; text-align:center">PEMELIHARAAN 1 TAHUNAN MOTOR RADIATOR DAN ALTERNATOR</h1>
                <h1 style="font-size: 18px; text-align:center">MAINTENANCE CHECKLIST & CATATAN</h1>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table style="table-layout: fixed;">
                    <tr>
                        <th colspan="2">DATA MOTOR RADIATOR</th>
                        <th colspan="2">DATA ALTERNATOR</th>
                    </tr>
                    <tr>
                        <th class="left" style="20%">UNIT</th>
                        <th class="left">: GENSET {{ $loop->iteration }}</th>
                        <th class="left" style="20%">UNIT</th>
                        <th class="left">: GENSET {{ $loop->iteration }}</th>
                    </tr>
                    <tr>
                        <th class="left" style="20%">MERK</th>
                        <th class="left">: MARATHON</th>
                        <th class="left" style="20%">MERK</th>
                        <th class="left">: MAGNA POWER</th>
                    </tr>
                    <tr>
                        <th class="left" style="20%">TIPE</th>
                        <th class="left">:</th>
                        <th class="left" style="20%">TIPE</th>
                        <th class="left">:</th>
                    </tr>
                    <tr>
                        <th class="left" style="20%">NOMOR SERI</th>
                        <th class="left">:</th>
                        <th class="left" style="20%">NOMOR SERI</th>
                        <th class="left">:</th>
                    </tr>
                    <tr>
                        <th class="left" style="20%">DAYA</th>
                        <th class="left">: 75 KW</th>
                        <th class="left" style="20%">DAYA</th>
                        <th class="left">: 2440 KW</th>
                    </tr>
                </table>
            </div>
            <div class="table">
                <table style="table-layout: fixed;">
                    <tr><th colspan="4">MOTOR RADIATOR</th></tr>
                    <tr>
                        <th style="width: 10%">1</th>
                        <th class="left" colspan="3">PEMERIKSAAN TAHANAN BELITAN (AVOMETER)</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">U1 - U2</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_u1_u2 }}</th>
                        <th style="width: 50%"></th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">V1- V2</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_v1_v2 }}</th>
                        <th style="width: 50%"></th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">W1 - W2</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_w1_w2 }}</th>
                        <th style="width: 50%"></th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L1 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_l1_g }}</th>
                        <th style="width: 50%"></th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L2 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_l2_g }}</th>
                        <th style="width: 50%"></th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L3 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_l3_g }}</th>
                        <th style="width: 50%"></th>
                    </tr>
                    <tr>
                        <th style="width: 10%">2</th>
                        <th class="left">PEMERIKSAAN TAHANAN ISOLASI</th>
                        <th colspan="2">500V</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>1 MENIT</th>
                        <th>10 MENIT</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L1 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_g_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_g_10m }}</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L2 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_g_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_g_10m }}</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L3 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l3_g_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l3_g_10m }}</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L1 - L2</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l2_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l2_10m }}</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L1 - L3</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l3_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l3_10m }}</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L2 - L3</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_l3_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_l3_1m }}</th>
                    </tr>
                    <tr><th colspan="4">ALTERNATOR</th></tr>
                    <tr>
                        <th style="width: 10%">1</th>
                        <th class="left">PEMERIKSAAN TAHANAN ISOLASI</th>
                        <th colspan="2">500V</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>1 MENIT</th>
                        <th>10 MENIT</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L1 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_g_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_g_10m }}</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L2 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l2_g_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l2_g_10m }}</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L3 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l3_g_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l3_g_10m }}</th>
                    </tr>
                    <tr>
                        <th style="width: 10%"></th>
                        <th style="width: 40%">L1 - L2 - L3 - G</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_l2_l3_g_1m }}</th>
                        <th style="width: 50%">{{ $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_l2_l3_g_10m }}</th>
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
    @endforeach

</body>

</html>
