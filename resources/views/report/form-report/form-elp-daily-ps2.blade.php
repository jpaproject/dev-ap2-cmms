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
            margin-top: 0;
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
            padding: 2px;
            width: 100px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
            font-size: 10px;
            text-align: center
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

        .float-left {
            margin: 20px 0 0 10%;
            text-align: left;
            width: 30%;
            float: left;
            font-size: 15px;
        }

        .float-right {
            margin: 20px 0 0 0px;
            text-align: left;
            width: 70%;
            float: right;
            font-size: 15px;
        }

        .ttd-left {
            margin: 20px 0 0 20px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 15px;
        }

        .ttd-right {
            margin: 20px 0 0 20px;
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

        .g1 {
            width: 50%;
            text-align: left;
            display: inline;
        }

        .g2 {
            width: 50%;
            text-align: left;
            display: inline;
            position: absolute;
            left: 30%;
        }

        .sub-header,
        .sub-header td,
        .sub-header th {
            border: none;
            /* Menghilangkan batas sel */
        }

        table,
        th,
        td {
            border: 1px solid black;
            /* Set border to black color */
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <div class="title">
                <h1 class="bold" style="font-size: 18px;">CHEKLIST PERALATAN HARIAN </h1>
                <h1 class="bold" style="font-size: 18px;">ELECTRICAL PROTECTION</h1>
            </div>
            {{-- <table class="sub-header">
                    <tr>
                        <td style="text-align:right; width:20%">No. Pekerjaan :</td>
                        <td style="text-align: left; width: 80%"></td>
                    </tr>
                    <tr>
                        <td style="text-align:right; width:20%">Hari :</td>
                        <td style="text-align: left; width: 80%">{{ $tanggal_hari }}</td>
                    </tr>
                    <tr>
                        <td style="text-align:right; width:20%">Tanggal : </td>
                        <td style="text-align: left; width: 80%">{{ date("d-m-Y", strtotime($work_order->date_generate)) }}</td>
                    </tr>
                </table> --}}
        </div>
        <div class="body">
            <p class="bold"style="font-size: 12px; text-align: right; margin-right: 10%;">PS/M</p>
            <div class="table">
                {{-- Panel --}}
                <table style="table-layout: fixed;">
                    <tr>
                        <td style="text-align:center" colspan="12">POWER STATION 2</td>
                    </tr>
                    <tr>
                        <td style="text-align:left" colspan="12">MCA / MCB / MCD / MCE</td>
                    </tr>
                    <tr style="border-top: 2px solid rgba(0, 0, 0, 0.5);">
                        <td style="text-align:left" colspan="12">JIAC : GIS</td>
                    </tr>
                    <tr>
                        <td class="bold" colspan="6">ER 2A</td>
                        <td class="bold" colspan="6">ER 2B</td>
                    </tr>
                    <tr>
                        <td rowspan="2">NO</td>
                        <td rowspan="2">PANEL</td>
                        <td>SIPROTEC</td>
                        <td>SIPROTEC</td>
                        <td>SIPROTEC</td>
                        <td>MICOM</td>
                        <td rowspan="2">NO</td>
                        <td rowspan="2">PANEL</td>
                        <td>SIPROTEC</td>
                        <td>SIPROTEC</td>
                        <td>SIPROTEC</td>
                        <td>MICOM</td>
                    </tr>
                    <tr>
                        <td>7SD8051</td>
                        <td>7SJ8041</td>
                        <td>7RW801</td>
                        <td>P543</td>
                        <td>7SD8051</td>
                        <td>7SJ8041</td>
                        <td>7RW801</td>
                        <td>P543</td>
                    </tr>
                    @php
                        $er2bNumber = 16;
                    @endphp
                    @for ($i = 0; $i < 16; $i++)
                        <tr>
                            {{-- ER2A --}}
                            @php
                                $panelEr2a = $formElpDailyEr2as[$i]->panel ?? '';
                                $panelEr2b = $formElpDailyEr2bs[$i]->panel ?? '';
                            @endphp
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $panelEr2a }}</td>
                            <td style="{{ $er2as[$panelEr2a][0] == false ? 'background-color:#9ea0a3' : '' }}">{{ $formElpDailyEr2as[$i]->q1_a ?? '' }}</td>
                            <td style="{{ $er2as[$panelEr2a][1] == false ? 'background-color:#9ea0a3' : '' }}">{{ $formElpDailyEr2as[$i]->q2_a ?? '' }}</td>
                            <td style="{{ $er2as[$panelEr2a][2] == false ? 'background-color:#9ea0a3' : '' }}">{{ $formElpDailyEr2as[$i]->q3_a ?? '' }}</td>
                            <td style="{{ $er2as[$panelEr2a][3] == false ? 'background-color:#9ea0a3' : '' }}">{{ $formElpDailyEr2as[$i]->q4_a ?? '' }}</td>

                            {{-- ER2B --}}
                            <td>{{ $er2bNumber++ }}</td>
                            <td>{{ $panelEr2b}}</td>
                            <td style="{{ $er2bs[$panelEr2b][0] == false ? 'background-color:#9ea0a3' : '' }}">{{ $formElpDailyEr2bs[$i]->q1_b ?? ''}}</td>
                            <td style="{{ $er2bs[$panelEr2b][1] == false ? 'background-color:#9ea0a3' : '' }}">{{ $formElpDailyEr2bs[$i]->q2_b ?? ''}}</td>
                            <td style="{{ $er2bs[$panelEr2b][2] == false ? 'background-color:#9ea0a3' : '' }}">{{ $formElpDailyEr2bs[$i]->q3_b ?? ''}}</td>
                            <td style="{{ $er2bs[$panelEr2b][3] == false ? 'background-color:#9ea0a3' : '' }}">{{ $formElpDailyEr2bs[$i]->q4_b ?? ''}}</td>
                        </tr>
                    @endfor
                </table>

                {{-- Gardu --}}
                <table style="table-layout: fixed;">
                    <tr>
                        <td style="text-align:center" colspan="12">NETWORK SCADA & RCMS</td>
                    </tr>
                    <tr>
                        <td rowspan="2">NO</td>
                        <td rowspan="2">GARDU</td>
                        <td colspan="2">Kondisi</td>
                        <td rowspan="2">NO</td>
                        <td rowspan="2">GARDU</td>
                        <td colspan="2">Kondisi</td>
                        <td rowspan="2">NO</td>
                        <td rowspan="2">GARDU</td>
                        <td colspan="2">Kondisi</td>
                    </tr>
                    <tr>
                        <td>SCADA</td>
                        <td>RCMS</td>
                        <td>SCADA</td>
                        <td>RCMS</td>
                        <td>SCADA</td>
                        <td>RCMS</td>
                    </tr>
                    
                    {!! $gardu !!}
                    <tr>
                        <td style="text-align:left" colspan="12"><span style="font-family: DejaVu Sans, sans-serif;">✔:Normal</span> ;<span style="font-family: DejaVu Sans, sans-serif;">✗:Alarm</span>;</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; vertical-align: top;" colspan="12" height="80">{!! nl2br($formElpDailyEr2as[0]->panel) ?? '' !!}</td>
                    </tr>
                </table>
            </div>
        </div>
        {{-- <div class="ttd-left">
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
        <div style="clear: both"></div> --}}
    </div>
</body>

</html>
