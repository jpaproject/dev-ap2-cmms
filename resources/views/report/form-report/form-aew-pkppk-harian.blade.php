<!DOCTYPE html>
<html>

<head>
    <title>Report Work Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            margin: 20px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 12px;
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
            vertical-align: middle;
            padding: 5px;
        }
    </style>
</head>

<body>
    {{-- Checklist Genset Harian (Control Room & Genset Room) --}}
    <div class="content">
        <div class="header">
            <div class="title">
                <h1>DAILY CHECK PAR CAR</h1>
                {{-- <div style="font-family: DejaVu Sans, sans-serif;">✔</div> --}}

            </div>
            <p style="text-align:center;">SOEKARNO HATTA INTERNATIONAL AIRPORT</p>
            <p style="text-align:right; margin-right:50px;">Equipment & Workshop Unit</p>
            <img style="width: 200px; margin-left:1000px; margin-top:20px"
                    src="{{ public_path('img/AP2.png') }}" alt="">



        </div>
        <div class="body">
            <div class="table">
                <table class="my-table">

                    <tr class="row-title">
                        <td style="width: 5%; text-align:center;" rowspan="2">NO</td>
                        <td style="width: 15%; text-align:center;" rowspan="2">NAME</td>
                        <td style="text-align:center; width: 6%;" colspan="2">ENGINE STARTS	</td>
                        <td style="text-align:center; width: 6%;" colspan="2">Oil Level Check</td>
                        <td style="text-align:center; width: 6%;" colspan="2">Pneumatic check</td>
                        <td style="text-align:center; width: 6%;" rowspan="2">Error Codes</td>
                        <td style="text-align:center; width: 6%;" colspan="2">Water cooling sytem</td>
                        <td style="text-align:center; width: 6%;" rowspan="2">Ready</td>
                        <td style="text-align:center; width: 6%;" rowspan="2">Remark</td>
                    </tr>
                    <tr>
                        <td style="text-align:center; width: 6%;">Battery Volt</td>
                        <td style="text-align:center; width: 6%;">Ignition time (seconds)</td>
                        <td style="text-align:center; width: 6%;">Engine Oil</td>
                        <td style="text-align:center; width: 6%;">Transmission oil</td>
                        <td style="text-align:center; width: 6%;">Air Supply Good?</td>
                        <td style="text-align:center; width: 6%;">Any Leaks?</td>
                        <td style="text-align:center; width: 6%;">level check</td>
                        <td style="text-align:center; width: 6%;">leakage check</td>
                    </tr>
                    @foreach ($formAewPkppkHarians as $key1 => $item)
                        <tr class="row-white">
                            <td style="text-align:center">{{ $loop->iteration }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q1']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q2']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q3']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q4']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q5']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q6']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q7']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q8']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q9']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q10']}}</span>
                            </td>
                            <td style="text-align:center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px font-weight: bold;">{{$item['q11']}}</span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        {{-- <div class="ttd-left">
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
        <div style="clear: both"></div> --}}
    </div>

</body>

</html>
