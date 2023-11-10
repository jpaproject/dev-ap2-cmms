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
            text-align: left;
            padding: 8px;
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
            margin: 40px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 15px;
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
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <div class="title">
                <img style="width: 120px; text-align:left; display:inline; margin-right:30px"
                    src="{{ public_path('img/AP2.png') }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:165px; ">FORM CHECKLIST HARIAN GENSET
                    PH AOCC
                </h1>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 40%">Genset</th>
                        <th style="width: 30%">GS AOCC</th>
                        <th style="width: 20%">KETERANGAN</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mode operasi kontrol genset(Deif)</td>
                        <td>{{ $checklistGensetPhAocc->mode_operasi_kontrol_genset ?? '' }}</td>
                        <td>Auto / Semi / Man / Off</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tegangan battery starter</td>
                        <td>{{ $checklistGensetPhAocc->tegangan_battery_starter ?? '' }}</td>
                        <td>Vdc</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tegangan battery starter</td>
                        <td>{{ $checklistGensetPhAocc->kondisi_battery_charger ?? '' }}</td>
                        <td>On / Off</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Lampu Indikator ECU</td>
                        <td>{{ $checklistGensetPhAocc->lampu_indikator_ecu ?? '' }}</td>
                        <td>On/Blinking/Off</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Level Oli mesin</td>
                        <td>{{ $checklistGensetPhAocc->level_oli_mesin ?? '' }}</td>
                        <td>Low / Med / Max</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Level air radiator</td>
                        <td>{{ $checklistGensetPhAocc->level_air_radiator ?? '' }}</td>
                        <td>Low / Med / Max</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>level bbm tangki harian</td>
                        <td>{{ $checklistGensetPhAocc->level_bbm_tangki ?? '' }}</td>
                        <td>(%) Liter </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Indikator filter udara intake</td>
                        <td>{{ $checklistGensetPhAocc->indikator_filter_udara_intake ?? '' }}</td>
                        <td>normal / service</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Water heater pump</td>
                        <td>{{ $checklistGensetPhAocc->water_heater_pump ?? '' }}</td>
                        <td>On / Off</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Oil / engine temperature </td>
                        <td>{{ $checklistGensetPhAocc->oil_engine_temperature ?? '' }}</td>
                        <td>°C</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Valve bbm genset</td>
                        <td>{{ $checklistGensetPhAocc->valve_bbm_genset ?? '' }}</td>
                        <td>Open / Close</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Kondisi Switch Battery</td>
                        <td>{{ $checklistGensetPhAocc->kondisi_switch_battery ?? '' }}</td>
                        <td>Open / Close</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Valve Bbm monthly Tank</td>
                        <td>{{ $checklistGensetPhAocc->valve_bbm_monthly_tank ?? '' }}</td>
                        <td>Open / Close</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Level Bbm Monthly Tank</td>
                        <td>{{ $checklistGensetPhAocc->level_bbm_monthly_tank ?? '' }}</td>
                        <td>Liter</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Kondisi Pintu Ruang Genset</td>
                        <td><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $checklistGensetPhAocc->kondisi_pintu_ruang_genset ? '✔' : '' }}</span>
                        </td>
                        <td>Tertutup & Terkunci</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height: 100px">Catatan : {!! $checklistGensetPhAocc->catatan ?? '' !!}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="ttd-left">
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
    </div>






</body>

</html>
