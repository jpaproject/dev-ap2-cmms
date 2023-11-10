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
            padding: 5px;
            width: 100px;
            font-size: 10px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
        }

        tr:first-child {
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

        .title-table tr td{
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }

        .center { 
            text-align: center;
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
                            Data teknis perawatan 2 Mingguan
                        </td>
                    </tr>
                    <tr style="background-color: white;">
                        <td>Panel Automation PLC & Panel Marshalling & Charger Gs.Perkins 2x2000 kVA</td>
                    </tr>
                </table>
                {{-- <img style="width: 120px; text-align:left; display:inline; margin-right:30px"
                    src="{{ public_path('img/AP2.png') }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:165px; ">Data teknis perawatan 2 Mingguan
                </h1>
                <br>
                <h1 style="font-size: 18px; display:inline; margin-right:165px; ">Panel Automation PLC & Panel
                    Marshalling & Charger Gs.Perkins 2x2000 kVA
                </h1> --}}
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table>
                    <tr>
                        <th style="width: 20%">Panel Automation</th>
                        <th style="width: 20%">PLC1</th>
                        <th style="width: 20%">PLC2</th>
                        <th style="width: 20%">SATUAN</th>
                        <th style="width: 20%">KETERANGAN</th>
                    </tr>
                    @foreach ($formPs1PanelAutomationDuaMingguanAutomations as $key => $control)
                        <tr>
                            <td>{{ $control->pertanyaan }}</td>
                            @if ($key == 0 || $key == 1)
                                <td class="center">{{ $control->q1 ?? '' }}</td>
                                <td class="center">{{ $control->q2 ?? '' }}</td>
                            @else
                                <td colspan="2" class="center">{{ $control->q1 ?? '' }}</td>
                            @endif
                            <td>{{ $control->satuan }}</td>
                            <td>{{ $control->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="table">
                <table>
                    <tr>
                        <th style="width: 20%">Panel Marshalling</th>
                        <th style="width: 20%">PLC1</th>
                        <th style="width: 20%">PLC2</th>
                        <th style="width: 20%">SATUAN</th>
                        <th style="width: 20%">KETERANGAN</th>
                    </tr>
                    @foreach ($formPs1PanelAutomationDuaMingguanMarshallings as $key => $panel)
                        <tr>
                            <td>{{ $panel->pertanyaan }}</td>
                            @if ($key == 0 || $key == 1)
                                <td class="center">{{ $panel->q1 ?? '' }}</td>
                                <td class="center">{{ $panel->q2 ?? '' }}</td>
                            @else
                                <td colspan="2" class="center">{{ $panel->q1 ?? '' }}</td>
                            @endif
                            <td>{{ $panel->satuan }}</td>
                            <td>{{ $panel->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="catatan" width="100">
            <p style="font-size:10px">CATATAN :</p>
            {!! nl2br($formPs1PanelAutomationDuaMingguanAutomations[0]->catatan) !!}
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
        <div style="clear: both"></div>
    </div> --}}






</body>

</html>
