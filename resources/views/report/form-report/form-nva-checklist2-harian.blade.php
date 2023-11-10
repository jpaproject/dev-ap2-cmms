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
            padding: 3px;
            font-size:10px;
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
        {{-- <div class="header">
            <div class="title">
                <table style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none; width: 50%;">
                            <h1 style="font-size: 20px; display:inline;">
                                KCU BANDARA SOEKARNO-HATTA ELECTRICAL UTILITY & VISUAL AID ELECTRICAL UTILITY
                            </h1>
                            <br>
                            <h1 style="font-size: 35px; display:inline;">
                                CHECK LIST 1
                            </h1>
                        </td>
                        <td style="border: none; width: 50%;">
                            <img style="width: 120px; text-align:right; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt="">
                            <div class="table">
                                <table>
                                    <tr>
                                        <td>Tanggal: {{ $formEleChecklist2Harians[0]->tanggal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jam (hasil): {{ $formEleChecklist2Harians[0]->jam_hasil }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jam (Sore): {{ $formEleChecklist2Harians[0]->jam_sore }}</td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>
        </div> --}}
        <table style="margin-top:50px; padding:20px; border: none;">
            <tr style=" background-color: white;">
                <td style="border: none; width: 50%;">
                    <h1 style="font-size: 18px; display:inline; color:#054b86;">
                        KCU BANDARA SOEKARNO-HATTA ELECTRICAL UTILITY & VISUAL AID ELECTRICAL UTILITY
                    </h1>
                </td>
                <td style="border: none; width: 50%; text-align:right;">
                    <img style="width: 150px; text-align:right; display:inline;"
                        src="{{ public_path('img/AP2.png') }}" alt="">
                </td>
            </tr>
            <tr style="background-color: white; border: none;">
                <td style="border:none">
                    <h1 style="font-size: 45px; display:inline; font-weight: bolder; color:#054b86;">
                        CHECK LIST 2
                    </h1>
                </td>
                <td style="border:none">
                    {{-- <div class="table"> --}}
                        <table>
                            <tr style=" background-color: grey; font-weight:bold" class="center">
                                <td colspan="2" class="center"> CHECK</td>
                            </tr>
                            <tr style=" background-color: white;">
                                <td style="border-right:none; width:30%">Tanggal</td>
                                <td>: {{ $formNvaChecklist2Harians[0]->tanggal }}</td>
                            </tr>
                            <tr style=" background-color: white;">
                                <td>Jam</td>
                                <td>: {{ $formNvaChecklist2Harians[0]->jam }}</td>
                            </tr>
                            <tr style=" background-color: white;">
                                <td>R/W IN USE</td>
                                <td>: {{ $formNvaChecklist2Harians[0]->qfu }}</td>
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
                        $number = range(1, 12);
                        $number = 1;
                    @endphp
                    @foreach ( $formNvaChecklist2Harians as $key => $formNvaChecklist2Harian )
                    @if ($key == 0 || $key == 12)
                        <tr>
                        <th colspan="5" class="center" style=" background-color: grey; font-weight:bold;font-size:15px">{{ $formNvaChecklist2Harian->jenis ?? '' }}</th>
                    </tr>
                    <tr>
                        <th style="width: 5%; background-color: white;" rowspan="2" class="center">NO</th>
                        <th style="width: 40%; background-color: white;" rowspan="2" class="center">PERALATAN</th>
                        <th style="width: 30%; background-color: white;" colspan="2" class="center">HASIL</th>
                        <th style="width: 30%; background-color: white;" rowspan="2" class="center">KETERANGAN</th>
                    </tr>
                    <tr>
                        <th class="center" style=" background-color: white;">RUN</th>
                        <th class="center" style=" background-color: white;">OFF</th>
                    </tr>
                    
                        <tr>
                            @if ($key > 11)
                                <td>{{ $number }}</td>
                                @php
                                    $number++;
                                @endphp
                            @else
                                <td>{{ $loop->iteration }}</td>
                            @endif
                            <td>{{ $formNvaChecklist2Harian->pertanyaan ?? '' }}</td>
                            <td class="center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px"> @if($formNvaChecklist2Harian->hasil == "RUN")  ✔ @else  @endif </span>
                            </td>
                            <td class="center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px"> @if($formNvaChecklist2Harian->hasil == "OFF")  ✔ @else  @endif </span>
                            </td>
                            <td >
                                {{$formNvaChecklist2Harian->keterangan}}
                            </td>
                        </tr>
                    @else
                    <tr>
                            @if ($key > 11)
                                <td>{{ $number }}</td>
                                @php
                                    $number++;
                                @endphp
                            @else
                                <td>{{ $loop->iteration }}</td>
                            @endif
                            <td>{{ $formNvaChecklist2Harian->pertanyaan ?? '' }}</td>
                            <td class="center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px"> @if($formNvaChecklist2Harian->hasil == "RUN")  ✔ @else  @endif </span>
                            </td>
                            <td class="center">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 15px"> @if($formNvaChecklist2Harian->hasil == "OFF")  ✔ @else  @endif </span>
                            </td>
                            <td >
                                {{$formNvaChecklist2Harian->keterangan}}
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </table>
                <br>
                <table class="table-data">
                    <tr>
                        <td class="center" style=" background-color: grey; font-weight:bold">DI CHECK OLEH</td>
                        <td class="center" style=" background-color: grey; font-weight:bold">PARAF</td>
                    </tr>
                    <tr >
                        <td height="60" style="width:70%; font-weight:bold; font-size:25px;" class="center">
                            @if ($user_technicals !== null)
                                {{$user_technicals->name}}
                            @endif
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
