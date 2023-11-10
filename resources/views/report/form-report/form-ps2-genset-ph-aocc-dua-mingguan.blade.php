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

    {{-- Form Genset Ph Aocc Dua Mingguan --}}
    <div class="content">
        <div class="header">
            <div class="title">
                <img style="width: 120px; text-align:left; display:inline; margin-right:30px"
                    src="{{ public_path('img/AP2.png') }}" alt="">
                <h1 style="font-size: 15px; display:inline; margin-right:150px; ">DATA PARAMETER 2 MINGGUAN GENSET PH
                    AOCC
                </h1>
                <h1 style="text-align: center; font-size: 15px;">TEST RUNNING TANPA BEBAN</h1>
            </div>
        </div>
        <div class="body">

            <div class="table">
                <table class="my-table">
                    <tr>
                        <th style="width: 10%;" rowspan="2">JAM</th>
                        <th colspan="3">TEGANGAN</th>
                        <th colspan="3">ARUS (AMPERE)</th>
                        <th rowspan="2"> DAYA (KW)</th>
                        <th colspan="2">ARUS (AMPERE)</th>
                        <th>COOLANT</th>
                        <th rowspan="2">BATT (VOLT)</th>
                        <th rowspan="2">HC</th>
                        <th rowspan="2">FREQUENCY <br>(HZ)</th>
                        <th rowspan="2">COS PHI</th>
                        <th rowspan="2">DURASI <br>MENIT</th>
                        <th rowspan="2">BBM <br>LITER</th>
                    </tr>
                    <tr>
                        <th>R</th>
                        <th>S</th>
                        <th>T</th>
                        <th>R</th>
                        <th>S</th>
                        <th>T</th>
                        <th>PRES(BAR)</th>
                        <th>TEMP(◦C)</th>
                        <th>TEMP(◦C)</th>
                    </tr>
                    @foreach ($formPs2GensetPhAoccDuaMingguans as $formPs2GensetPhAoccDuaMingguan)
                        <tr>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->waktu ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->tegangan_r ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->tegangan_s ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->tegangan_t ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->arus_r ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->arus_s ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->arus_t ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->daya ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->oil_pres ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->oil_temp ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->coolant_temp ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->batt ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->hc ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->frequency ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->cos_phi ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->durasi ?? '' }}</td>
                            <td>{{ $formPs2GensetPhAoccDuaMingguan->bbm ?? '' }}</td>
                        </tr>
                    @endforeach
                    @for ($i = 0; $i < 7 - $formPs2GensetPhAoccDuaMingguans->count(); $i++)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endfor
                    <tr>
                        <td colspan="17"></td>
                    </tr>
                    <tr>
                        <td colspan="17" style="height: 80px; text-align:left; vertical-align: start">Catatan :
                            {!! $checklistGensetPhAocc->catatan ?? '' !!}</td>
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
