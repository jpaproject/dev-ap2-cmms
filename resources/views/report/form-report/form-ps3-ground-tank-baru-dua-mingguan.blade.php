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

        .float-left {
            margin: 10px 0 0 0px;
            padding: 0 0 0 10%;
            text-align: left;
            width: 45%;
            float: left;
            font-size: 10px;
        }

        .float-right {
            margin: 10px 0 0 0;
            text-align: left;
            width: 55%;
            float: right;
            font-size: 10px;
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

        p {
            margin-top: 5px
        }

        .group {
            margin-bottom: 5%;
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
                <h1 style="font-size: 18px; text-align:center">POWER STATION 3 - GROUND TANK BARU DUA MINGGUAN</h1>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="text-align: center">CATATAN</th>
                    </tr>
                    <tr>
                        <td style="background-color: white">
                            <div class="float-left">
                                <h2 style="font-weight: bold; text-align: left;">PEMERIKSAAN ARUS MOTOR POMPA
                                    TRANSFER</h2>
                                <h3 style="margin-top: 5px; text-align: left;">MAIN TANK</h3>
                                <div class="group">
                                    <p>· TRANSFER PUMP ANTAR TANK 1</p>
                                    <p>· TRANSFER PUMP ANTAR TANK 2</p>
                                    <p>· TRANSFER PUMP 1</p>
                                    <p>· TRANSFER PUMP 2</p>
                                    <h3 style="margin-top: 10px; text-align: left;">SUMP TANK</h3>
                                    <p>· DRAIN PUMP</p>
                                    <h3 style="margin-top: 10px; text-align: left;">SUMPIT TANK</h3>
                                    <p>· P1</p>
                                    <p>· P2</p>
                                </div>
                                <h2 style="font-weight: bold; text-align: left;">LEVEL BAHAN BAKAR</h2>
                                <div class="group">
                                    <p>· MAIN TANK 1</p>
                                    <p>· MAIN TANK 2</p>
                                    <p>· MAIN TANK 3</p>
                                    <p>· SUMP TANK 1</p>
                                </div>
                                <h2 style="font-weight: bold; text-align: left;">TEGANGAN INPUT PANEL POMPA</h2>
                                <div class="group">
                                    <p>· PANEL MONITOR MAIN TANK</p>
                                    <p>· PANEL KONTROL POMPA TRANSFER</p>
                                    <p>· PANEL SUMPIT PUMP </p>
                                </div>
                            </div>
                            <div class="float-right">
                                <div class="group">
                                    <p style="margin-top:30px;">:
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank1_1 }}
                                        A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank1_2 }}
                                        A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank1_3 }}
                                        A</p>
                                    <p>: {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank2_1 }}
                                        A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank2_2 }}
                                        A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank2_3 }}
                                        A</p>
                                    <p>: {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump1_1 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump1_2 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump1_3 }} A</p>
                                    <p>: {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump2_1 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump2_2 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump2_3 }} A</p>
                                    <p style="margin-top:25px;">:
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->drain_pump_1 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->drain_pump_2 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->drain_pump_3 }} A</p>
                                    <p style="margin-top:25px;">:
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p1_1 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p1_2 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p1_3 }} A</p>
                                    <p>: {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p2_1 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p2_2 }} A/
                                        {{ $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p2_3 }} A</p>
                                </div>
                                <div class="group">
                                    <p style="margin-top:10px;">: {{ $formPs3GroundTankBaruDuaMingguan->main_tank1 }} L</p>
                                    <p>: {{ $formPs3GroundTankBaruDuaMingguan->main_tank2 }} L</p>
                                    <p>: {{ $formPs3GroundTankBaruDuaMingguan->main_tank3 }} L</p>
                                    <p>: {{ $formPs3GroundTankBaruDuaMingguan->sump_tank1 }} L</p>
                                </div>
                                <div class="group">
                                    <p style="margin-top:10px;">: {{ $formPs3GroundTankBaruDuaMingguan->panel_monitor_maint_tank }} VAC</p>
                                        <p>: {{ $formPs3GroundTankBaruDuaMingguan->panel_kontrol_pompa_transfer }} VAC</p>
                                        <p>: {{ $formPs3GroundTankBaruDuaMingguan->panel_sumpit_pump }} VAC</p>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                            <p style="margin:20px 0 0 10%; text-align:left; font-size:12px ">Visual Check Kondisi Panel , Peralatan dan Segala Aspek dalam Kondisi Normal</p>
                            <p style="margin:0 0 0 10%; text-align:left; font-size:12px ">Selesai Perawatan , Peralatan Kembali Ke Posisi Auto </p>
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
