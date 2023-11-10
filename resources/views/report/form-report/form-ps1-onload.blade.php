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
            font-size: 15px;
            font-weight: 700;
            text-align: center;
        }

        .body {
            margin-top: 10px;
            margin-bottom: 10px;
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

        .table td,
        th {
            border: 1px solid #000000;
            text-align: center;
            vertical-align: middle;
            padding: 10px;
            font-size: 12px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
        }

        tr:first-child{
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
            table-layout: fixed;
        }

        .center {
            text-align: center;
        }

        .title-table tr td {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }

        .catatan {
            margin: 20px;
            padding: 5px;
            height: 100px;
            border: 1px solid black;
            text-size: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <div class="title">
                <table style="padding:20px 20px 0px 20px;" class="title-table">
                    <tr style="background-color: white;">
                        <td style=" width: 20%; text-align:center;" rowspan="2">
                            <img style="margin:10px; width: 150px; text-align:left; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt="">
                        </td>
                        <td style=" width: 60%; text-align:center;">
                            FORM CEKLIST RUNTEST ONLOAD GENSET
                        </td>
                    </tr>
                    <tr style="background-color: white;">
                        <td>GARDU P50 MTU 1250 KVA</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table>
                    <tr>
                        <th style="width:40%">URAIAN PELAKSANAAN</th>
                        <th style="width:10%; white-space: wrap;" class="center">Tegangan (volt)</th>
                        <th style="width:10%; white-space: wrap;" class="center">Arus (A)</th>
                        <th style="width:10%; white-space: wrap;" class="center">Freq (Hz)</th>
                        <th style="width:10%; white-space: wrap;" class="center">waktu (ontime)</th>
                        <th style="width:20%" class="center">Keterangan</th>
                    </tr>
                    @foreach ($formPs1TestOnloadUraianGensets as $key => $uraian)
                        <tr>
                            <td>{{ $uraianGensets[$key]['name'] }}</td>
                            <td class="center">{{ $uraian->tegangan ?? '' }}</td>
                            <td class="center">{{ $uraian->arus ?? '' }}</td>
                            <td class="center">{{ $uraian->freq ?? '' }}</td>
                            <td class="center">{{ $uraian->waktu ?? '' }}</td>
                            <td class="center">{{ $uraian->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="table">
                <table style="table-layout: fixed; border:none;">
                    <tr>
                        <td>Jeda waktu PLN Off sampai Genset Onload (SECOND) :</th>
                        <td>{{ $formPs1TestOnloadGenset->q1 ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Jeda waktu Gs Off sampai PLN Onload / Recovery (SECOND) :</th>
                        <td>{{ $formPs1TestOnloadGenset->q2 ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Level Bahan Bakar Mesin awal (Liter) :</th>
                        <td>{{ $formPs1TestOnloadGenset->q3 ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Level Bahan Bakar Mesin setelah onload (Liter) :</th>
                        <td>{{ $formPs1TestOnloadGenset->q4 ?? '' }}</td>
                    </tr>
                </table>
            </div>
            <div class="table">
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="width: 30%" rowspan="2">DATA TEKNIS</th>
                        <th style="" class="center" colspan="13">WAKTU (MENIT)</th>
                    </tr>
                    <tr>
                        <th style="width: 5%" class="center">10</th>
                        <th style="width: 5%" class="center">20</th>
                        <th style="width: 5%" class="center">30</th>
                        <th style="width: 5%" class="center">40</th>
                        <th style="width: 5%" class="center">50</th>
                        <th style="width: 5%" class="center">60</th>
                        <th style="width: 5%" class="center">70</th>
                        <th style="width: 5%" class="center">80</th>
                        <th style="width: 5%" class="center">90</th>
                        <th style="width: 5%" class="center">100</th>
                        <th style="width: 5%" class="center">110</th>
                        <th style="width: 5%" class="center">120</th>
                        <th style="width: 5%" class="center">DST</th>
                    </tr>
                    @foreach ($formPs1TestOnloadParameterGensets as $key => $parameter)
                        <tr>
                            <td>{{ $parameterGensets[$key]['name'] }}</td>
                            <td class="center">{{ $parameter->waktu10 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu20 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu30 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu40 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu50 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu60 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu70 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu80 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu90 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu100 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu110 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktu120 ?? '' }}</td>
                            <td class="center">{{ $parameter->waktudst ?? '' }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="table">
                <table style="table-layout: fixed;">
                    <tr>
                        <td style="text-align: left">CATATAN / RESUME :</th>
                    </tr>
                    <tr>
                        <td style="text-align: left">{!! nl2br($formPs1TestOnloadGenset->catatan ?? '') !!}</td>
                    </tr>
                </table>
            </div>
        </div>
        {{-- <div class="ttd-left">
            <p><span class="bold">Supervisor</span></p>
            <p><span class="bold">Power Station 1</span></p>
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
