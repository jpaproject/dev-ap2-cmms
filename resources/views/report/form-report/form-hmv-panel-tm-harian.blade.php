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
            font-size: 10px;
            font-weight: 700;
            text-align: center;
        }

        .body {
            /* margin-top: 30px; */
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
            padding: 7px;
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
            margin: 0px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 12px;
        }

        .ttd-left {
            margin: 0px 0 0 0px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 12px;
        }

        .ttd-right {
            margin: 0px 0 0 50px;
            text-align: center;
            width: 40%;
            float: right;
            font-size: 12px;
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
        .header {
            text-align: left;
        }
        .center td{
            text-align: center;
            vertical-align: middle;
        }
        table, tr, td, th {
            text-align: center;
        }

        .table-data {
            margin:1;
            padding:1;
            border:none;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .table-no {
            border:none;
            border-left: 1px solid black;
        }

        .table-pertanyaan {
            border:none;
            border-right: 1px solid black;
        }
        .table-data tr td {
            background-color: white;
            text-align: left;
            vertical-align: middle;
            margin: 1;
            padding:1;
        }
        .table-header td{
            font-weight: bold;
        }
        .table-header{
            font-weight: bold;
            text-align: center;
            border: 1px solid black;
            border-bottom: none;
            font-size: 10px;
            background-color: #5f9ea0;
        }
        .block-check {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="content">
        <table style="margin-top:10px; padding:20px; border: none; padding-bottom: 0px;">
            <tr style=" background-color: white;">
                <td class="header" style="border: none; width: 50%;">
                    <p>BIDANG FASILITAS BANDARA</p>
                    <p>DIVISI ENERGY & POWER SUPPLY</p>
                    <p>DINAS GARDU INDUK</p>
                    <p>Tanggal : {{$tanggal}}</p>
                    <p>Pukul : {{$jam}}</p>
                </td>
                <td style="border: none; width: 50%;"></td>
                <td style="border: none; width: 50%;"></td>

            </tr>
        </table>
        <div class="body">
            <div class="table">
                <table class="table-data">
                    <tr>
                        <th class="center table-header" style="width: 7px; border:1px solid black; background-color: #deb887;">D</th>
                        <th colspan="2" class="center table-header" style="width: 30%; border:1px solid black; background-color: #deb887;">PANEL TM 20KV</th>
                        @foreach ($formHmvPanelTmHarians as $item)
                            <th class="center table-header" style="border:1px solid black; background-color: #ffff00;">{{$item->name}}</th>
                        @endforeach
                    </tr>

                    <tr>
                        <td rowspan="2" class="center" style="width: 1%; border:1px solid black;">
                            1
                        </td>
                        <td rowspan="2" style=" border:1px solid black;">
                            CB
                        </td>
                        <td style=" border:1px solid black;">
                            OPEN
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                {{-- {{$item->q1}} --}}
                                <span style="text-align:center; font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q1 == 'open' ? '✔' : '' }}</span>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;">
                            CLOSE
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                {{-- {{$item->q1}} --}}
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q1 == 'close' ? '✔' : '' }}</span>
                            </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td style=" border:1px solid black; height:10px;" colspan="23"></td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="center" style="width: 5%; border:1px solid black;">
                            2
                        </td>
                        <td rowspan="2" style=" border:1px solid black;">
                            DS GROUNDING
                        </td>
                        <td style=" border:1px solid black;">
                            OPEN
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q2 == 'open' ? '✔' : '' }}</span>
                                {{-- {{$item->q2}} --}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;">
                            CLOSE
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q2 == 'close' ? '✔' : '' }}</span>
                                {{-- {{$item->q2}} --}}
                            </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td style=" border:1px solid black; height:10px;" colspan="23"></td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="center" style="width: 5%; border:1px solid black;">
                            3
                        </td>
                        <td rowspan="2" style=" border:1px solid black;">
                            GROUNDING
                        </td>
                        <td style=" border:1px solid black;">
                            OPEN
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q3 == 'open' ? '✔' : '' }}</span>
                                {{-- {{$item->q3}} --}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;">
                            CLOSE
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q3 == 'close' ? '✔' : '' }}</span>
                                {{-- {{$item->q3}} --}}
                            </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td style=" border:1px solid black; height:10px;" colspan="23"></td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="center" style="width: 5%; border:1px solid black;">
                            4
                        </td>
                        <td rowspan="2" style=" border:1px solid black;">
                            SPRING
                        </td>
                        <td style=" border:1px solid black;">
                            CHARGE
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                {{-- {{$item->q4}} --}}
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q4 == 'charge' ? '✔' : '' }}</span>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;">
                            DISCHARGE
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q4 == 'discharge' ? '✔' : '' }}</span>
                                {{-- {{$item->q4}} --}}
                            </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td style=" border:1px solid black; height:10px;" colspan="23"></td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="center" style="width: 5%; border:1px solid black;">
                            5
                        </td>
                        <td rowspan="2" style=" border:1px solid black;">
                            PROTEKSI
                        </td>
                        <td style=" border:1px solid black;">
                            NORMAL
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q5 == 'normal' ? '✔' : '' }}</span>
                                {{-- {{$item->q5}} --}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;">
                            ABNORMAL
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                <span style="font-family: DejaVu Sans, sans-serif; font-size: 10px;">{{ $item->q5 == 'abnormal' ? '✔' : '' }}</span>
                                {{-- {{$item->q5}} --}}
                            </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td style=" border:1px solid black; height:10px;" colspan="23"></td>
                    </tr>

                    <tr>
                        <td rowspan="4" class="center" style="width: 5%; border:1px solid black;">
                            6
                        </td>
                        <td rowspan="4" style=" border:1px solid black;">
                            METERING
                        </td>
                        <td style=" border:1px solid black;">
                            ARUS (A)
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                {{$item->q6a}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;">
                            TEGANGAN (KV)
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black;  text-align:center;">
                                {{$item->q6b}}
                            </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td style=" border:1px solid black;">
                            DAYA (MVA)
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black;  text-align:center;">
                                {{$item->q6c}}
                            </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td style=" border:1px solid black;">
                            FREKUENSI (HZ)
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black;  text-align:center;">
                                {{$item->q6d}}
                            </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td class="center" style="width: 5%; border:1px solid black;">
                            7
                        </td>
                        <td style=" border:1px solid black;">
                            TCS
                        </td>
                        <td style=" border:1px solid black;">
                            ALARM
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; text-align:center;">
                                {{$item->q7}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="center" style="width: 5%; border:1px solid black;">
                            8
                        </td>
                        <td colspan="2" style=" border:1px solid black;">
                            KETERANGAN
                        </td>
                        @foreach ( $formHmvPanelTmHarians as $key => $item )
                            <td style=" border:1px solid black; background-color: #adff2f;">
                                {{$item->q8}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td style=" border:1px solid black; height:10px;" colspan="23"></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; border:1px solid black;" rowspan="5">
                            E
                        </td>
                        <td style=" border:1px solid black;" colspan="2">
                            Battery Room
                        </td>
                        <td style=" border:1px solid black;" colspan="2">BATTERY BANK 1</td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;" colspan="2">BATTERY BANK 2</td>
                        <td style=" border:1px solid black;" colspan="14">CATATAN</td>
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;" rowspan="2">110 V</td>
                        <td style=" border:1px solid black;">Status</td>
                        <td style=" border:1px solid black;" colspan="2">{{$formHmvPanelTmHarians[0]->b1_110_status}}</td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;" colspan="2">{{$formHmvPanelTmHarians[0]->b2_110_status}}</td>
                        <td style=" border:1px solid black; vertical-align: top;" rowspan="4" colspan="14">{{$formHmvPanelTmHarians[0]->catatan}}</td>
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;">Metering</td>
                        <td style=" border:1px solid black;" colspan="2">{{$formHmvPanelTmHarians[0]->b1_110_metering}}</td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;" colspan="2">{{$formHmvPanelTmHarians[0]->b2_110_metering}}</td>
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;" rowspan="2">48 V</td>
                        <td style=" border:1px solid black;">Status</td>
                        <td style=" border:1px solid black;" colspan="2">{{$formHmvPanelTmHarians[0]->b1_48_status}}</td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;" colspan="2">{{$formHmvPanelTmHarians[0]->b2_48_status}}</td>
                    </tr>
                    <tr>
                        <td style=" border:1px solid black;">Metering</td>
                        <td style=" border:1px solid black;" colspan="2">{{$formHmvPanelTmHarians[0]->b1_48_metering}}</td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;"></td>
                        <td style=" border:1px solid black;" colspan="2">{{$formHmvPanelTmHarians[0]->b2_48_metering}}</td>
                    </tr>
                </table>
                <br>
                <table>
                    <tr>
                        <td style="border:none; background-color:white; text-align:left;">ASSISTANT MANAGER OF HIGH & MEDIUM VOLTAGE STATION</td>
                        <td style="border:none; background-color:white;">Tangerang, <br> PETUGAS DINAS</td>
                    </tr>
                    <tr>
                        <td style="border:none; background-color:white; text-align:left;">
                            @if($qrCodeAdmin != "kosong")
                                <img style="width: 80px; vertical-align: bottom; text-align: right;"
                                    src="data:image/png;base64,{{ base64_encode($qrCodeAdmin) }}" alt="QR Code">

                                    <br>
                                    ({{$userNameAdmin}})
                            @endif
                        </td>
                        <td style="border:none; background-color:white;">
                            @if($qrCode != "kosong")
                                <img style="width: 80px; vertical-align: bottom; text-align: right;"
                                    src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">

                                    <br>
                                    ({{$userName}})
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>

</body>

</html>
