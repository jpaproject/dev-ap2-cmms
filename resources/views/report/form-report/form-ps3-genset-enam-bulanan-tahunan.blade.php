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
            margin: 20px 0 0 10%;
            text-align: left;
            width: 45%;
            float: left;
            font-size: 15px;
        }

        .float-right {
            margin: 20px 0 0 0px;
            text-align: left;
            width: 55%;
            float: right;
            font-size: 15px;
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
    @for ($i=0; $i<4 ; $i++)
    @php
        if($i == 0){
            $firstKey = 0;
            $secondKey = 1;
        } else {
            $firstKey = $i+$i;
            $secondKey = $firstKey+1;
        }
        $first = $firstKey+1;
        $second = $secondKey+1;
        // if($i == 1){
        //     $firstKey = 2;
        //     $secondKey = 3;
        // }
        // if($i == 2){
        //     $firstKey = 4;
        //     $secondKey = 5;
        // }
        // if($i == 3){
        //     $firstKey = 6;
        //     $secondKey = 7;
        // }
        
    @endphp
    <div class="content @if($i !== 3)page-break @endif">
        <div class="header">
            <div class="title">
                {{-- <img style="width: 120px; text-align:left; display:inline; margin-right:140px"
                    src="{{ public_path('img/AP2.png') }}" alt=""> --}}
                {{-- <h1 style="font-size: 18px; display:inline; margin-right:240px; ">PEMELIHARAAN PANEL SDP</h1> --}}
                <h1 style="font-size: 18px; text-align:center">POWER STATION 3 - GENSET ENAM BULANAN | TAHUNAN</h1>
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
                            <div class="float-left"><span class="parameter">- LEVEL OLI MESIN</span></div><div class="float-right"><div class="g1"><span style="">G{{ $first }} : {{ $formPs3GensetEnamBulananTahunans[$firstKey]->level_oli_mesin }}</span></div><div class="g2"><span>G{{ $second }} : {{ $formPs3GensetEnamBulananTahunans[$secondKey]->level_oli_mesin }}</span></div></div>
                            <div style="clear: both"></div>
                            <div class="float-left"><span class="parameter">- LEVEL AIR RADIATOR</span></div><div class="float-right"><div class="g1"><span>G{{ $first }} : {{ $formPs3GensetEnamBulananTahunans[$firstKey]->level_air_radiator }}</span></div><div class="g2"><span>G{{ $second }} : {{ $formPs3GensetEnamBulananTahunans[$secondKey]->level_air_radiator }}</span></div></div>
                            <div style="clear: both"></div>
                            <div style="clear: both"></div>
                            <div class="float-left"><span class="parameter">- LEVEL AIR BATTERY/ACCU</span></div><div class="float-right"><div class="g1"><span>G{{ $first }} : {{ $formPs3GensetEnamBulananTahunans[$firstKey]->level_air_battery }}</span></div><div class="g2"><span>G{{ $second }} : {{ $formPs3GensetEnamBulananTahunans[$secondKey]->level_air_battery }}</span></div></div>
                            <div style="clear: both"></div>
                            <div class="float-left"><span class="parameter">- LEVEL BAHAN BAKAR</span></div><div class="float-right"><div class="g1"><span>G{{ $first }} : {{ $formPs3GensetEnamBulananTahunans[$firstKey]->level_bahan_bakar }} L</span></div><div class="g2"><span>G{{ $second }} : {{ $formPs3GensetEnamBulananTahunans[$secondKey]->level_bahan_bakar }} L</span></div></div>
                            <div style="clear: both"></div>
                            <div class="float-left"><span class="parameter">- TEGANGAN BATTERY STARTER</span></div><div class="float-right"><div class="g1"><span>G{{ $first }} : {{ $formPs3GensetEnamBulananTahunans[$firstKey]->tegangan_battery_starter }} Vdc</span></div><div class="g2"><span>G{{ $second }} : {{ $formPs3GensetEnamBulananTahunans[$secondKey]->tegangan_battery_starter }} Vdc</span></div></div>
                            <div style="clear: both"></div>
                            <div class="float-left"><span class="parameter">- COOLANT TEMPERATURE</span></div><div class="float-right"><div class="g1"><span>G{{ $first }} : {{ $formPs3GensetEnamBulananTahunans[$firstKey]->coolant_temperature }} ºC</span></div><div class="g2"><span>G{{ $second }} : {{ $formPs3GensetEnamBulananTahunans[$secondKey]->coolant_temperature }} ºC</span></div></div>
                            <div style="clear: both"></div>
                            <div class="float-left"><span class="parameter">- HOUR METER</span></div><div class="float-right"><div class="g1"><span>G{{ $first }} : {{ $formPs3GensetEnamBulananTahunans[$firstKey]->hour_meter }} Hour</span></div><div class="g2"><span>G{{ $second }} : {{ $formPs3GensetEnamBulananTahunans[$secondKey]->hour_meter }} Hour</span></div></div>
                            <div style="clear: both"></div>
                            <div class="float-left"><span class="parameter">- ALTERNATOR HEATER</span></div><div class="float-right"><div class="g1"><span>G{{ $first }} : {{ $formPs3GensetEnamBulananTahunans[$firstKey]->alternator_heater }} ºC</span></div><div class="g2"><span>G{{ $second }} : {{ $formPs3GensetEnamBulananTahunans[$secondKey]->alternator_heater }} ºC</span></div></div>
                            <div style="clear: both"></div>
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
    @endfor
</body>

</html>
