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
            padding: 5px;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="content page-break">
        <div class="header">
            <div class="title">
                <img style="width: 120px; text-align:left; display:inline; margin-right:40px"
                    src="{{ public_path('img/AP2.png') }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:150px; ">FORM CHECKLIST HARIAN PANEL LV MPS 2
                </h1>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr>
                        <th rowspan="2" style="width: 5%">No</th>
                        <th rowspan="2" style="">Cubicle</th>
                        <th rowspan="2" style="">Peralatan</th>
                        <th rowspan="2" style="">Merek</th>
                        <th rowspan="2" style="">Tipe</th>
                        <th colspan="2" style="">Posisi Breaker</th>
                        <th rowspan="2" style="">Keterangan</th>
                    </tr>
                    <tr>
                        <td>ON</td>
                        <td>OFF</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Incoming I</td>
                        <td>ACB 3200 A</td>
                        <td>ABB</td>
                        <td>SACE EMAX 2</td>
                        @if ($formPs2GensetPhAoccHarian->q2a == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q1a == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>{{ $formPs2GensetPhAoccHarian->q1a_keterangan }}</td>
                    </tr>

                    {{-- ---------- Rak I ---------- --}}

                    <tr>
                        <td class="row-white" rowspan="6" style="vertical-align: middle;">2</td>
                        <td class="row-white" rowspan="6" style="vertical-align: middle;">RAK I</td>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q2a == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q2a == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>UPS 005B</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q2b == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q2b == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SDP 001B Lantai 2</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q2c == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q2c == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>UPS 005A</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q2d == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q2d == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SDP AC 002</td>
                    </tr>
                    <tr>
                        <td>MCCB 63 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q2e == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q2e == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>Fuel System Ground Tank</td>
                    </tr>
                    <tr>
                        <td>MCCB 16 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q2f == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q2f == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>Power Meter Trafo Aux</td>
                    </tr>

                    {{-- ---------- Rak II ---------- --}}
                    <tr>
                        <td class="row-white" rowspan="6" style="vertical-align: middle;">3</td>
                        <td class="row-white" rowspan="6" style="vertical-align: middle;">RAK II</td>
                        <td>MCCB 32 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q3a == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q3a == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>Rectifier B</td>
                    </tr>
                    <tr>
                        <td>MCCB 80 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q3b == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q3b == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SDP 001A Ruang Panel</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q3c == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q3c == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SDP 001C Ruang Genset</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q3d == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q3d == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SPARE</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q3e == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q3e == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>REKLAME</td>
                    </tr>
                    <tr>
                        <td>MCCB 200 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q3f == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q3f == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>Panel Charging</td>
                    </tr>

                    <tr>
                        <td colspan="8"></td>
                    </tr>

                    {{-- ---------- COUPLER ---------- --}}
                    <tr>
                        <td>4</td>
                        <td>COUPLER </td>
                        <td>ACB 1600 A</td>
                        <td>ABB</td>
                        <td>SACE EMAX 2</td>
                        @if ($formPs2GensetPhAoccHarian->q4a == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q4a == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>{{ $formPs2GensetPhAoccHarian->q4a_keterangan }}</td>
                    </tr>
                    <tr>
                        <td colspan="8"></td>
                    </tr>

                    {{-- ---------- INCOMING II ---------- --}}
                    <tr>
                        <td>5</td>
                        <td>INCOMING II </td>
                        <td>MCCB 3200 A</td>
                        <td>ABB</td>
                        <td>SACE EMAX 2</td>
                        @if ($formPs2GensetPhAoccHarian->q5a == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q5a == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>{{ $formPs2GensetPhAoccHarian->q5a_keterangan }}</td>
                    </tr>

                    {{-- ---------- Rak III ---------- --}}
                    <tr>
                        <td class="row-white" rowspan="6" style="vertical-align: middle;">6</td>
                        <td class="row-white" rowspan="6" style="vertical-align: middle;">RAK III</td>
                        <td>MCCB 32 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q6a == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q6a == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SDP 007 Ruan Genset</td>
                    </tr>
                    <tr>
                        <td>MCCB 32 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q6b == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q6b == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SDP 008 Ruang Genset</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q6c == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q6c == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SDP 006 Ruang Genset</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q6d == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q6d == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>Rectifier A</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q6e == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q6e == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SPARE</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q6f == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q6f == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SPARE</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr>
                        <th rowspan="2" style="width: 5%">No</th>
                        <th rowspan="2" style="">Cubicle</th>
                        <th rowspan="2" style="">Peralatan</th>
                        <th rowspan="2" style="">Merek</th>
                        <th rowspan="2" style="">Tipe</th>
                        <th colspan="2" style="">Posisi Breaker</th>
                        <th rowspan="2" style="">Keterangan</th>
                    </tr>
                    <tr>
                        <td>ON</td>
                        <td>OFF</td>
                    </tr>
                    {{-- ---------- Rak IV ---------- --}}
                    <tr>
                        <td class="row-white" rowspan="6" style="vertical-align: middle;">7</td>
                        <td class="row-white" rowspan="6" style="vertical-align: middle;">RAK IV</td>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q7a == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q7a == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SDP 003 GH 128</td>
                    </tr>
                    <tr>
                        <td>MCCB 32 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q7b == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q7b == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>UPS 005B Ruang Server</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q7c == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q7c == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>UPS 005A Ruang Server</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q7d == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q7d == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>Penerangan Ground Tank</td>
                    </tr>
                    <tr>
                        <td>MCCB 160 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q7e == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q7e == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SDP 002B Ruang Server</td>
                    </tr>
                    <tr>
                        <td>MCCB 32 A</td>
                        <td>ABB</td>
                        <td>SACE TMAX</td>
                        @if ($formPs2GensetPhAoccHarian->q7f == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q7f == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>SPARE</td>
                    </tr>
                    <tr>
                        <td colspan="8"></td>
                    </tr>
                    <tr>
                        <td class="row-white">8</td>
                        <td class="row-white">Panel Outgoing AOCC I</td>
                        <td>ACB 1250 A</td>
                        <td>ABB</td>
                        <td>SACE EMAX 2</td>
                        @if ($formPs2GensetPhAoccHarian->q8a == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q8a == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>{{ $formPs2GensetPhAoccHarian->q8a_keterangan }}</td>
                    </tr>
                    <tr>
                        <td colspan="8"></td>
                    </tr>
                    <tr>
                        <td class="row-white">8</td>
                        <td class="row-white">Panel Outgoing AOCC II</td>
                        <td>ACB 1250 A</td>
                        <td>ABB</td>
                        <td>SACE EMAX 2</td>
                        @if ($formPs2GensetPhAoccHarian->q9a == 'on')
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                        @elseif($formPs2GensetPhAoccHarian->q9a == 'off')
                            <td style="font-family: DejaVu Sans, sans-serif;">✗</td>
                            <td style="font-family: DejaVu Sans, sans-serif;">✔</td>
                        @else
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                            <td style="font-family: DejaVu Sans, sans-serif;"></td>
                        @endif
                        <td>{{ $formPs2GensetPhAoccHarian->q9a_keterangan }}</td>
                    </tr>

                    <tr>
                        <td colspan="8" style="text-align:left;vertical-align: start;height: 50px;">Catatan :
                        </td>
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
