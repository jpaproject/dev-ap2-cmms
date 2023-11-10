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
            padding: 8px;
            width: 100px;
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
                <h1 style="font-size: 18px; text-align:center">PEMELIHARAAN PANEL SDP</h1>
                <h1 style="font-size: 18px; text-align:center">MAINTENANCE CHECKLIST & CATATAN</h1>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <p style="font-weight: bold; margin-bottom: 10px">1. PEMERIKSAAN TEGANGAN DAN ARUS</p>
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="width: 15%" rowspan="2">PANEL SDP</th>
                        <th style="width: 15%" rowspan="2">TEGANGAN (V)</th>
                        <th style="width: 30%" colspan="3">ARUS ( A )</th>
                        <th style="width: 15%" rowspan="2">HZ</th>
                        <th style="width: 25%" rowspan="2">KETERANGAN</th>
                    </tr>
                    <tr>
                        <th>L1</th>
                        <th>L2</th>
                        <th>L3</th>
                    </tr>
                    @foreach ($formPs3PanelSdpDuaMingguans as $key => $formPs3PanelSdpDuaMingguan)
                            <tr>
                                <td>{{ $formPs3PanelSdpDuaMingguan->panel_sdp ?? '' }}</td>
                                <td>{{ $formPs3PanelSdpDuaMingguan->tegangan ?? '' }}</td>
                                <td>{{ $formPs3PanelSdpDuaMingguan->arus_l1 ?? '' }}</td>
                                <td>{{ $formPs3PanelSdpDuaMingguan->arus_l2 ?? '' }}</td>
                                <td>{{ $formPs3PanelSdpDuaMingguan->arus_l3 ?? '' }}</td>
                                <td>{{ $formPs3PanelSdpDuaMingguan->hz ?? '' }}</td>
                                <td>{{ $formPs3PanelSdpDuaMingguan->keterangan ?? '' }}</td>
                            </tr>
                    @endforeach
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
