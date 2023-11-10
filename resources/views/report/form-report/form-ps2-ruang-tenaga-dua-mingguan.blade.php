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
    <div class="content">
        <div class="header">
            <div class="title">
                <img style="width: 120px; text-align:left; display:inline; margin-right:30px"
                    src="{{ public_path('img/AP2.png') ?? '' }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:100px; ">DATA PARAMETER 2 MINGGUAN RUANG TENAGA
                    MPS2
                </h1>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table class="my-table" style="table-layout:fixed;">
                    <tr class="row-title">
                        <th style="width: 5%" rowspan="2">NO</th>
                        <th style="width: 15%" rowspan="2">NAMA PERALATAN</th>
                        <th style="" colspan="3">TEGANGAN</th>
                        <th style="" colspan="3">ARUS</th>
                        <th style="width: 7%" rowspan="2">DAYA</th>
                        <th style="width: 7%"rowspan="2">FREK</th>
                        <th style="width: 7%" rowspan="2">COS PHI</th>
                        <th style="width: 10%" rowspan="2">STATUS</th>
                        <th style="width: 19%" rowspan="2">KET</th>
                    </tr>
                    <tr>
                        <th style="width: 5%">R</th>
                        <th style="width: 5%">S</th>
                        <th style="width: 5%">T</th>
                        <th style="width: 5%">R</th>
                        <th style="width: 5%">S</th>
                        <th style="width: 5%">T</th>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="13">ER 1A BUS A</td>
                    </tr>
                    @foreach ($er1a as $value)
                        <tr class="row-white">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->nama_peralatan ?? '' }}</td>
                            <td>{{ $value->tegangan_r ?? '' }}</td>
                            <td>{{ $value->tegangan_s ?? '' }}</td>
                            <td>{{ $value->tegangan_t ?? '' }}</td>
                            <td>{{ $value->arus_r ?? '' }}</td>
                            <td>{{ $value->arus_s ?? '' }}</td>
                            <td>{{ $value->arus_t ?? '' }}</td>
                            <td>{{ $value->daya ?? '' }}</td>
                            <td>{{ $value->frekuensi ?? '' }}</td>
                            <td>{{ $value->cos_phi ?? '' }}</td>
                            <td>{{ $value->status ?? '' }}</td>
                            <td>{{ $value->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="row-white" colspan="13">ER 1B BUS B</td>
                    </tr>
                    @foreach ($er1b as $value)
                        <tr class="row-white">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->nama_peralatan ?? '' }}</td>
                            <td>{{ $value->tegangan_r ?? '' }}</td>
                            <td>{{ $value->tegangan_s ?? '' }}</td>
                            <td>{{ $value->tegangan_t ?? '' }}</td>
                            <td>{{ $value->arus_r ?? '' }}</td>
                            <td>{{ $value->arus_s ?? '' }}</td>
                            <td>{{ $value->arus_t ?? '' }}</td>
                            <td>{{ $value->daya ?? '' }}</td>
                            <td>{{ $value->frekuensi ?? '' }}</td>
                            <td>{{ $value->cos_phi ?? '' }}</td>
                            <td>{{ $value->status ?? '' }}</td>
                            <td>{{ $value->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="row-white" colspan="13">ER 2A</td>
                    </tr>
                    @foreach ($er2a as $value)
                        <tr class="row-white">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->nama_peralatan ?? '' }}</td>
                            <td>{{ $value->tegangan_r ?? '' }}</td>
                            <td>{{ $value->tegangan_s ?? '' }}</td>
                            <td>{{ $value->tegangan_t ?? '' }}</td>
                            <td>{{ $value->arus_r ?? '' }}</td>
                            <td>{{ $value->arus_s ?? '' }}</td>
                            <td>{{ $value->arus_t ?? '' }}</td>
                            <td>{{ $value->daya ?? '' }}</td>
                            <td>{{ $value->frekuensi ?? '' }}</td>
                            <td>{{ $value->cos_phi ?? '' }}</td>
                            <td>{{ $value->status ?? '' }}</td>
                            <td>{{ $value->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="row-white" colspan="13">ER 2B</td>
                    </tr>
                    @foreach ($er2b as $value)
                        <tr class="row-white">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->nama_peralatan ?? '' }}</td>
                            <td>{{ $value->tegangan_r ?? '' }}</td>
                            <td>{{ $value->tegangan_s ?? '' }}</td>
                            <td>{{ $value->tegangan_t ?? '' }}</td>
                            <td>{{ $value->arus_r ?? '' }}</td>
                            <td>{{ $value->arus_s ?? '' }}</td>
                            <td>{{ $value->arus_t ?? '' }}</td>
                            <td>{{ $value->daya ?? '' }}</td>
                            <td>{{ $value->frekuensi ?? '' }}</td>
                            <td>{{ $value->cos_phi ?? '' }}</td>
                            <td>{{ $value->status ?? '' }}</td>
                            <td>{{ $value->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="row-white" colspan="13">PANEL MV GENSET</td>
                    </tr>
                    @foreach ($mv as $value)
                        <tr class="row-white">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->nama_peralatan ?? '' }}</td>
                            <td>{{ $value->tegangan_r ?? '' }}</td>
                            <td>{{ $value->tegangan_s ?? '' }}</td>
                            <td>{{ $value->tegangan_t ?? '' }}</td>
                            <td>{{ $value->arus_r ?? '' }}</td>
                            <td>{{ $value->arus_s ?? '' }}</td>
                            <td>{{ $value->arus_t ?? '' }}</td>
                            <td>{{ $value->daya ?? '' }}</td>
                            <td>{{ $value->frekuensi ?? '' }}</td>
                            <td>{{ $value->cos_phi ?? '' }}</td>
                            <td>{{ $value->status ?? '' }}</td>
                            <td>{{ $value->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="row-white" colspan="13">LV PANEL</td>
                    </tr>
                    @foreach ($lv as $value)
                        <tr class="row-white">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->nama_peralatan ?? '' }}</td>
                            <td>{{ $value->tegangan_r ?? '' }}</td>
                            <td>{{ $value->tegangan_s ?? '' }}</td>
                            <td>{{ $value->tegangan_t ?? '' }}</td>
                            <td>{{ $value->arus_r ?? '' }}</td>
                            <td>{{ $value->arus_s ?? '' }}</td>
                            <td>{{ $value->arus_t ?? '' }}</td>
                            <td>{{ $value->daya ?? '' }}</td>
                            <td>{{ $value->frekuensi ?? '' }}</td>
                            <td>{{ $value->cos_phi ?? '' }}</td>
                            <td>{{ $value->status ?? '' }}</td>
                            <td>{{ $value->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
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
