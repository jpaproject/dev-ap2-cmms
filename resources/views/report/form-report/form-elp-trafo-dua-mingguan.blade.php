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
                            <th style="width: 4%" rowspan="3">NO</th>
                            <th style="width: 9%" rowspan="3">SUBSTATION</th>
                            <th style="width: 9%" rowspan="3">NAMA<br>PANEL</th>
                            <th style="width: 8%" rowspan="3">JENIS<br>TRAFO</th>
                            <th style="width: 8%" rowspan="3">KAPASITAS<br>TRAFO</th>
                            <th style="width: 20%" colspan="3">INDIKASI TRAFO</th>
                            <th style="width: 20%" colspan="4">SUHU (°C)</th>
                            <th style="width: 22%" colspan="5">PROTEKSI TRAFO</th>
                        </tr>
                        <tr style="background-color: #9CC2E5ff">
                            <th rowspan="2">SUHU (°C)</th>
                            <th rowspan="2">LEVEL<br>OLI</th>
                            <th rowspan="2">PRES<br>SURE</th>
                            <th colspan="3">TRAFO</th>
                            <th rowspan="2">RUANG</th>
                            <th>V (Volt)</th>
                            <th rowspan="2">SUHU 1</th>
                            <th rowspan="2" style="text-align: center">SUHU 2 <br> (trip)</th>
                            <th colspan="2">KONDISI</th>
                        </tr>
                        <tr style="background-color: #9CC2E5ff">
                            <th>R</th>
                            <th>S</th>
                            <th>T</th>
                            <th>KONTROL</th>
                            <th>RELE<br>TRAFO</th>
                            <th>KABEL<br>KONTROL</th>
                        </tr>
                        @foreach ( $formElpTrafoDuaMingguans as $formElpTrafoDuaMingguan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->substation }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->panel }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->jenis_trafo }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->kapasitas_trafo }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->indikasi_trafo_suhu }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->indikasi_trafo_level_oli }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->indikasi_trafo_pressure }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->suhu_trafo_r }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->suhu_trafo_s }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->suhu_trafo_t }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->suhu_ruang }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->proteksi_trafo_kontrol_v }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->proteksi_trafo_suhu1 }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->proteksi_trafo_suhu2 }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->proteksi_trafo_kondisi_rele_trafo }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->proteksi_trafo_kondisi_kabel_kontrol }}</td>
                        </tr>
                        @endforeach
                        @for ($i=0;$i<15-$formElpTrafoDuaMingguans->count();$i++)
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
            <div class="body">
                <div class="table">
                    <table style="table-layout: fixed;">
                        <tr style="background-color: #9CC2E5ff">
                            <th style="width: 15%" colspan="3">ARUS TM</th>
                            <th style="width: 20%" colspan="4">DAYA TM</th>
                            <th style="width: 15%" colspan="3"><span style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">Δ </span> DAYA TRAFO</th>
                            <th style="width: 29%" colspan="5">TAHANAN 	<span style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;"> &#x2126; </span></th>
                            <th style="width: 21%" rowspan="3">KETERANGAN</th>
                        </tr>
                        <tr style="background-color: #9CC2E5ff">
                            <th rowspan="2">R</th>
                            <th rowspan="2">S</th>
                            <th rowspan="2">T</th>
                            <th rowspan="2">P</th>
                            <th rowspan="2">Q</th>
                            <th rowspan="2">S</th>
                            <th rowspan="2">PF</th>
                            <th colspan="3">EFISIENSI</th>
                            <th rowspan="2">NG TRAFO</th>
                            <th colspan="4">GARDU</th>
                        </tr>
                        <tr style="background-color: #9CC2E5ff">
                            <th>P</th>
                            <th>Q</th>
                            <th>S</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                        </tr>
                        @foreach ( $formElpTrafoDuaMingguans as $formElpTrafoDuaMingguan)
                        <tr>
                            <td>{{ $formElpTrafoDuaMingguan->arus_tm_r }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->arus_tm_s }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->arus_tm_t }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->daya_tm_p }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->daya_tm_q }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->daya_tm_s }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->daya_tm_pf }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->daya_trafo_efisiensi_p }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->daya_trafo_efisiensi_q }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->daya_trafo_efisiensi_S }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->tahanan_n_g_trafo }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->tahanan_gardu_1 }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->tahanan_gardu_2 }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->tahanan_gardu_3 }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->tahanan_gardu_4 }}</td>
                            <td>{{ $formElpTrafoDuaMingguan->keterangan }}</td>
                        </tr>
                        @endforeach
                        @for ($i=0;$i<15-$formElpTrafoDuaMingguans->count();$i++)
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
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endfor
                        
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
