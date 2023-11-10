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

        .sub-header , .sub-header td, .sub-header th {
            border: none; /* Menghilangkan batas sel */
        }

        table, th, td {
            border: 1px solid black; /* Set border to black color */
        }
    </style>
</head>

<body>
        <div class="content page-break">
            <div class="header">
                <div class="title">
                    {{-- <img style="width: 120px; text-align:left; display:inline; margin-right:140px"
                    src="{{ public_path('img/AP2.png') }}" alt=""> --}}
                    {{-- <h1 style="font-size: 18px; display:inline; margin-right:240px; ">PEMELIHARAAN PANEL SDP</h1> --}}
                    <h1 style="font-size: 18px;">DATA TEKNIS KWH METER UNIT ELECTRICAL PROTECTION</h1>
                </div>
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
                        <td style="text-align: left; width: 80%">{{ date("d-m-Y", strtotime($work_order->date_generate)) }}</td>
                    </tr>
                </table>
            </div>
            <div class="body">
                <div class="table">
                    <table style="table-layout: fixed;">
                        <tr style="background-color: #9CC2E5ff">
                            <th style="width: 5%" rowspan="2">NO</th>
                            <th style="width: 15%" rowspan="2">SUBSTATION</th>
                            <th style="width: 10%" rowspan="2">NAMA<br>PANEL</th>
                            <th style="width: 10%" rowspan="2">JENIS<br>TRAFO</th>
                            <th style="width: 10%" rowspan="2">TEGANGAN<br>POWER SUPLAY<br>(VOLT)</th>
                            <th style="width: 20%" colspan="2">ARUS</th>
                            <th style="width: 10%" rowspan="2">VDC (+) TO GROUND</th>
                            <th style="width: 10%" rowspan="2">VDC (-) TO GROUND</th>
                            <th style="width: 10%" rowspan="2">BODY TO GROUND</th>
                        </tr>
                        <tr style="background-color: #9CC2E5ff">
                            <th>I</th>
                            <th>Ir</th>
                        </tr>
                        @foreach ( $formElpRelayDuaMingguans as $formElpRelayDuaMingguan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $formElpRelayDuaMingguan->substation }}</td>
                            <td>{{ $formElpRelayDuaMingguan->panel }}</td>
                            <td>{{ $formElpRelayDuaMingguan->merek_type_relay }}</td>
                            <td>{{ $formElpRelayDuaMingguan->tegangan_power_suplay }}</td>
                            <td>{{ $formElpRelayDuaMingguan->arus_i }}</td>
                            <td>{{ $formElpRelayDuaMingguan->arus_ir }}</td>
                            <td>{{ $formElpRelayDuaMingguan->vdc_plus_to_ground }}</td>
                            <td>{{ $formElpRelayDuaMingguan->vdc_min_to_ground }}</td>
                            <td>{{ $formElpRelayDuaMingguan->body_to_ground }}</td>
                        </tr>
                        @endforeach
                        @for ($i=0;$i<15-$formElpRelayDuaMingguans->count();$i++)
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
                            </tr>
                        @endfor
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="header">
                <div class="title">
                    {{-- <img style="width: 120px; text-align:left; display:inline; margin-right:140px"
                    src="{{ public_path('img/AP2.png') }}" alt=""> --}}
                    {{-- <h1 style="font-size: 18px; display:inline; margin-right:240px; ">PEMELIHARAAN PANEL SDP</h1> --}}
                    <h1 style="font-size: 18px;">DATA TEKNIS KWH METER UNIT ELECTRICAL PROTECTION</h1>
                </div>
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
                        <td style="text-align: left; width: 80%">{{ date("d-m-Y", strtotime($work_order->date_generate)) }}</td>
                    </tr>
                </table>
            </div>
            <div class="body" style="margin-top: 15%">
                <div class="table">
                    <table style="table-layout: fixed;">
                        <tr style="background-color: #9CC2E5ff">
                            <th style="width: 14%">SUDUT ( ° )</th>
                            <th style="width: 14%">KOMUNIKASI</th>
                            <th style="width: 14%">I DIFF</th>
                            <th style="width: 14%">I BIAS </th>
                            <th style="width: 14%">TEGANGAN<br>POWER KOMPENSASI</th>
                            <th style="width: 30%">KETERANGAN</th>
                        </tr>
                        @foreach ( $formElpRelayDuaMingguans as $formElpRelayDuaMingguan)
                        <tr>
                            <td>{{ $formElpRelayDuaMingguan->sudut }}</td>
                            <td>{{ $formElpRelayDuaMingguan->komunikasi }}</td>
                            <td>{{ $formElpRelayDuaMingguan->i_diff }}</td>
                            <td>{{ $formElpRelayDuaMingguan->i_bias }}</td>
                            <td>{{ $formElpRelayDuaMingguan->tegangan_kompensasi }}</td>
                            <td>{{ $formElpRelayDuaMingguan->keterangan }}</td>
                        </tr>
                        @endforeach
                        @for ($i=0;$i<15-$formElpRelayDuaMingguans->count();$i++)
                            <tr>
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
