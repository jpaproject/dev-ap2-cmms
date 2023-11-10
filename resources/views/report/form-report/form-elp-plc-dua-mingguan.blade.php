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
            text-align: center;
            vertical-align: middle;
            padding: 7px;
            width: 100px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
            font-size: 12px;
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
            text-align: left;
            width: 70%;
            float: right;
            font-size: 15px;
        }

        .table-left {
            padding: 0 0 0 10%;
            width: 50%;
            float: left;
            font-size: 15px;
        }

        .table-right {
            margin: 0 0 0 20%;
            width: 50%;
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

        .sub-heade {
            width: 100%
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
    </style>
</head>

<body>
    <div class="content page-break">
        <div class="header">
            <div class="title">
                <h1 style="font-size: 18px;">DATA TEKNIS KWH METER UNIT ELECTRICAL PROTECTION</h1>
            </div>
            <div class="table-left">
                <table class="sub-header">
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
                        <td style="text-align: left; width: 80%">
                            {{ date('d-m-Y', strtotime($work_order->date_generate)) }}</td>
                    </tr>
                </table>
            </div>
            <div class="table-right">
                <table class="sub-header">
                    <tr>
                        <td style="text-align:left;"><span
                                style="font-family: DejaVu Sans, sans-serif; margin-left: 55%">✔ : NORMAL</span></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;"><span
                                style="font-family: DejaVu Sans, sans-serif; margin-left: 55%">✗ : TIDAK NORMAL
                                NORMAL</span></td>
                    </tr>
                </table>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="body">
            <div class="table">
                <table style="table-layout: fixed;">
                    <tr style="background-color: #9CC2E5ff">
                        <th style="width: 5%" rowspan="2">NO</th>
                        <th style="width: 20%" rowspan="2">SUBSTATION</th>
                        <th style="width: 10%" colspan="2">TEGANGAN POWER SUPPLY</th>
                        <th style="width: 10%">MODUL POWER SUPPLY</th>
                        <th style="width: 10%" colspan="2">CPU</th>
                        <th style="width: 15%" colspan="3">PTQ</th>
                        <th style="width: 10%">DDI</th>
                        <th style="width: 10%">DRA</th>
                        <th style="width: 10%">NOE</th>
                    </tr>
                    <tr style="background-color: #9CC2E5ff">
                        <th>AC</th>
                        <th>DC</th>
                        <th>POWER OK</th>
                        <th>RUN</th>
                        <th>LCD</th>
                        <th>ACTIVE</th>
                        <th>E DATA</th>
                        <th>E LINK</th>
                        <th>ACTIVE</th>
                        <th>ACTIVE</th>
                        <th>ACTIVE</th>
                    </tr>
                    @foreach ($formElpPlcDuaMingguans as $formElpPlcDuaMingguan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $formElpPlcDuaMingguan->substation }}</td>
                            <td>{{ $formElpPlcDuaMingguan->tegangan_power_supply_ac }}</td>
                            <td>{{ $formElpPlcDuaMingguan->tegangan_power_supply_dc }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->modul_power_supply_power_ok == '✓' ? '✓' : ($formElpPlcDuaMingguan->modul_power_supply_power_ok == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->cpu_run == '✓' ? '✓' : ($formElpPlcDuaMingguan->cpu_run == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->cpu_lcd == '✓' ? '✓' : ($formElpPlcDuaMingguan->cpu_lcd == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->ptq_active == '✓' ? '✓' : ($formElpPlcDuaMingguan->ptq_active == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->ptq_e_data == '✓' ? '✓' : ($formElpPlcDuaMingguan->ptq_e_data == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->ptq_e_link == '✓' ? '✓' : ($formElpPlcDuaMingguan->ptq_e_link == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->ddi_active == '✓' ? '✓' : ($formElpPlcDuaMingguan->ddi_active == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->dra_active == '✓' ? '✓' : ($formElpPlcDuaMingguan->dra_active == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->noe_active == '✓' ? '✓' : ($formElpPlcDuaMingguan->noe_active == '✗' ? '✗' : '') }}</span>
                            </td>
                        </tr>
                    @endforeach
                    @for ($i = 0; $i < 15 - $formElpPlcDuaMingguans->count(); $i++)
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
                        </tr>
                    @endfor

                </table>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="header">
            <div class="title">
                <h1 style="font-size: 18px;">DATA TEKNIS KWH METER UNIT ELECTRICAL PROTECTION</h1>
            </div>
            <div class="table-left">
                <table class="sub-header">
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
                        <td style="text-align: left; width: 80%">
                            {{ date('d-m-Y', strtotime($work_order->date_generate)) }}</td>
                    </tr>
                </table>
            </div>
            <div class="table-right">
                <table class="sub-header">
                    <tr>
                        <td style="text-align:left;"><span
                                style="font-family: DejaVu Sans, sans-serif; margin-left: 55%">✔ : NORMAL</span></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;"><span
                                style="font-family: DejaVu Sans, sans-serif; margin-left: 55%">✗ : TIDAK NORMAL
                                NORMAL</span></td>
                    </tr>
                </table>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="body">
            <div class="table">
                <table style="table-layout: fixed;">
                    <tr style="background-color: #9CC2E5ff">
                        <th style="width: 20%" colspan="2">EGX</th>
                        <th style="width: 10%">CONEX</th>
                        <th style="width: 13%" rowspan="2">SUHU PLC</th>
                        <th style="width: 13%" rowspan="2">LAMPU</th>
                        <th style="width: 13%" rowspan="2">FAN</th>
                        <th style="width: 30%" rowspan="2">KETERANGAN</th>
                    </tr>
                    <tr style="background-color: #9CC2E5ff">
                        <th>TX</th>
                        <th>RX</th>
                        <th>ACTIVE</th>
                    </tr>
                    @foreach ($formElpPlcDuaMingguans as $formElpPlcDuaMingguan)
                        <tr>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->egx_tx == '✓' ? '✓' : ($formElpPlcDuaMingguan->egx_tx == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->egx_rx == '✓' ? '✓' : ($formElpPlcDuaMingguan->egx_rx == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif;">{{ $formElpPlcDuaMingguan->conex_active == '✓' ? '✓' : ($formElpPlcDuaMingguan->conex_active == '✗' ? '✗' : '') }}</span>
                            </td>
                            <td>{{ $formElpPlcDuaMingguan->suhu_plc }}</td>
                            <td>{{ $formElpPlcDuaMingguan->lampu }}</td>
                            <td>{{ $formElpPlcDuaMingguan->fan }}</td>
                            <td>{!! $formElpPlcDuaMingguan->keterangan !!}</td>
                        </tr>
                    @endforeach
                    @for ($i = 0; $i < 15 - $formElpPlcDuaMingguans->count(); $i++)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endfor

                </table>
            </div>
        </div>
    </div>
</body>

</html>
