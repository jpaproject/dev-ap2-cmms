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
            padding: 8px;
            font-size: 10px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
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
    <div class="content page-break">
        <div class="header">
            <div class="title">
                <table style="padding:20px 20px 0px 20px;" class="title-table">
                    <tr style="background-color: white;">
                        <td style=" width: 20%; text-align:center;">
                            <img style="margin:10px; width: 150px; text-align:left; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt="">
                        </td>
                        <td style=" width: 60%; text-align:center;">
                            LAPORAN PEMELIHARAAN 6 BULANAN
                        </td>
                    </tr>
                </table>

                {{-- <img style="width: 120px; text-align:left; display:inline; margin-right:30px"
                    src="{{ public_path('img/AP2.png') }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:158px; ">LAPORAN PEMELIHARAAN 6 BULANAN</h1>
                <h1 style="font-size: 18px; display:block; text-align:center">CHECKLIST PERAWATAN
                    BULANAN</h1> --}}
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table style="table-layout:fixed;">
                    <tr>
                        <th style="width: 8%; text-align:center">No</th>
                        <th style="width: 62%">SEPSIFIKASI PEMELIHARAAN</th>
                        <th style="width: 30%;; text-align:center" colspan="3">PANEL</th>
                    </tr>
                    @php
                        $indexPointer = 0;
                    @endphp
                    @foreach ($panelMv20Kvs as $panelMv20Kv)
                        @if (!$panelMv20Kv->giga_ohm)
                            <tr class="row-white">
                                <td style="text-align: center">{{ $loop->first ? '1' : $loop->iteration }}</td>
                                <td style="text-align: left">{{ $panelMv20Kv->spesifikasi_pemeliharaan }}</td>
                                <td style="text-align: center; width:10%;">
                                    {{ $panelMv20Kv->panel_1 }}</td>
                                <td style="text-align: center; width:10%;">
                                    {{ $panelMv20Kv->panel_2 }}</td>
                                <td style="text-align: center; width:10%;">
                                    {{ $panelMv20Kv->panel_3 }}</td>
                                {{-- <td style="text-align: center" colspan="3">
                                    {{ $formPs2PemeliharaanEnamBulanans[0]->l1g_panel }}</td> --}}
                            </tr>
                        @else
                            <tr class="row-white">
                                <td style="text-align: center">{{ $loop->first ? '1' : $loop->iteration }}</td>
                                <td style="text-align: left">{{ $panelMv20Kv->spesifikasi_pemeliharaan }}</td>
                                <td style="text-align: center" colspan="3">
                                    {{ $panelMv20Kv->giga_ohm }}</td>
                            </tr>
                        @endif
                        @php
                            $indexPointer++;
                        @endphp
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="header">
            <div class="title">
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table style="table-layout:fixed;">
                    <tr>
                        <th style="width: 8%; text-align:center">No</th>
                        <th style="width: 62%">SEPSIFIKASI PEMELIHARAAN</th>
                        <th style="width: 30%;; text-align:center" colspan="3">PANEL</th>
                    </tr>
                    @foreach ($kabel20Kvs as $kabel20Kv)
                        @if (!$kabel20Kv->giga_ohm)
                            <tr class="row-white">
                                <td style="text-align: center">{{ $loop->first ? '2' : '' }}</td>
                                <td style="text-align: left">{{ $kabel20Kv->spesifikasi_pemeliharaan }}</td>
                                <td style="text-align: center; width:10%;">
                                    {{ $kabel20Kv->panel_1 }}</td>
                                <td style="text-align: center; width:10%;">
                                    {{ $kabel20Kv->panel_2 }}</td>
                                <td style="text-align: center; width:10%;">
                                    {{ $kabel20Kv->panel_3 }}</td>
                            </tr>
                        @else
                            <tr class="row-white">
                                <td style="text-align: center">{{ $loop->first ? '2' : '' }}</td>
                                <td style="text-align: left">{{ $kabel20Kv->spesifikasi_pemeliharaan }}</td>
                                <td style="text-align: center" colspan="3">
                                    {{ $kabel20Kv->giga_ohm }}</td>
                            </tr>
                        @endif
                        @php
                            $indexPointer++;
                        @endphp
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="catatan" width="100">
        <p style="font-size:10px">CATATAN :</p>
        {!! nl2br($panelMv20Kvs[0]->catatan ?? '') !!}
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
    {{-- <div style="clear: both"></div> --}}






</body>

</html>
