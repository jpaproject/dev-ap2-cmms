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
            padding: 5px;
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

        .center {
            text-align: center;
            vertical-align: middle;
        }

        .table-data {
            border: 1px solid black;
        }

        .table-data tr td {
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="content">
        <table style="margin-top:50px; padding:20px; border: none;">
            <tr style=" background-color: white;">
                <td style="border: none; width: 50%;">
                    <h1 style="font-size: 18px; display:inline; color:#054b86;">
                        KCU BANDARA SOEKARNO-HATTA ELECTRICAL UTILITY & VISUAL AID ELECTRICAL UTILITY
                    </h1>
                </td>
                <td style="border: none; width: 50%; text-align:right;">
                    <img style="width: 150px; text-align:right; display:inline;" src="{{ public_path('img/AP2.png') }}"
                        alt="">
                </td>
            </tr>
            <tr style="background-color: white; border: none;">
                <td style="border:none">
                    <h1 style="font-size: 45px; display:inline; font-weight: bolder; color:#054b86;">
                        CHECK LIST 1
                    </h1>
                </td>
                <td style="border:none">
                    {{-- <div class="table"> --}}
                    <table>
                        <tr style=" background-color: grey;">
                            <td colspan="2"></td>
                        </tr>
                        <tr style=" background-color: white; width:30%;">
                            <td style="border-right:none;">Tanggal:</td>
                            <td>{{ $formNvaChecklist1Harians[0]->tanggal }}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td>Jam (Pagi):</td>
                            <td>{{ $formNvaChecklist1Harians[0]->jam_pagi }}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td>RUNWAY 2 (PAGI):</td>
                            <td>{{ $formNvaChecklist1Harians[0]->runway2_pagi }}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td>RUNWAY 3 (PAGI):</td>
                            <td>{{ $formNvaChecklist1Harians[0]->runway3_pagi }}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td>Jam (Sore):</td>
                            <td>{{ $formNvaChecklist1Harians[0]->jam_sore }}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td>RUNWAY 2 (SORE):</td>
                            <td>{{ $formNvaChecklist1Harians[0]->runway2_sore }}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td>RUNWAY 3 (SORE):</td>
                            <td>{{ $formNvaChecklist1Harians[0]->runway3_sore }}</td>
                        </tr>
                    </table>
                    {{-- </div> --}}
                </td>
            </tr>
        </table>
        <div class="body">
            <div class="table">
                <table style="text-align:center" class="table-data">
                    @php
                        $number = range(1, 10);
                        $number = 1;
                    @endphp
                    @foreach ($formNvaChecklist1Harians as $key => $item)
                        @if ($key == 0 || $item->runway !== $formNvaChecklist1Harians[$key - 1]->runway)
                            <tr>
                                <th colspan="6" class="center"
                                    style=" background-color: grey; font-weight:bold; font-size: 15px">
                                    {{ $item->runway }}</th>
                            </tr>
                            <tr>
                                <th style="width: 5%; background-color: white;" rowspan="3" class="center">NO</th>
                                <th style="width: 40%; background-color: white;" rowspan="3" class="center">PERALATAN
                                </th>
                                <th style="width: 30%; background-color: white;" colspan="4" class="center">HASIL
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 5%" colspan="2" class="center" style=" background-color: white;">
                                    PAGI</th>
                                <th style="width: 40%" colspan="2" class="center" style=" background-color: white;">
                                    SORE</th>
                            </tr>
                            <tr>
                                <th class="center" style=" background-color: white;">ON</th>
                                <th class="center" style=" background-color: white;">OFF</th>

                                <th class="center" style=" background-color: white;">ON</th>
                                <th class="center" style=" background-color: white;">OFF</th>
                            </tr>
                        @endif

                        <tr>
                            @if ($key > 9)
                                <td>{{ $number }}</td>
                                @php
                                    $number++;
                                @endphp
                            @else
                                <td>{{ $loop->iteration }}</td>
                            @endif
                            <td>{{ $item->peralatan ?? '' }}</td>
                            <td class="center">
                                <span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $item->hasil_pagi == 'OFF' ? '' : $item->hasil_pagi }}</span>
                            </td>
                            <td class="center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px">
                                    {{ $item->hasil_pagi !== 'OFF' ? '' : $item->hasil_pagi }} </span>
                            </td>

                            <td class="center">
                                <span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $item->hasil_sore == 'OFF' ? '' : $item->hasil_sore }}</span>
                            </td>
                            <td class="center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px">
                                    {{ $item->hasil_sore !== 'OFF' ? '' : $item->hasil_sore }} </span>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <br>
                <table class="table-data">
                    <tr>
                        <td class="center" style=" background-color: grey; font-weight:bold">DI CHECK OLEH</td>
                        <td class="center" style=" background-color: grey; font-weight:bold">PARAF</td>
                    </tr>
                    <tr>
                        <td height="60" style="width:70%; font-weight:bold; font-size:15px;" class="center">
                            {{ $item->oleh }}
                        </td>
                        <td style="" class="center">
                            @if ($user_technicals !== null)
                                <img src="{{ public_path('img/user-technicals/paraf/' . ($user_technicals->paraf ?? 'none.png')) }}"
                                    width="100px" style="display: block">
                            @endif
                        </td>
                    </tr>
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
        </div> --}}
        <div style="clear: both"></div>
    </div>






</body>

</html>
