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

        .center td{
            text-align: center;
            vertical-align: middle;
        }

        .table-data {
            font-size:10px;
            border:none;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .table-no {
            border:none;
            border-left: 1px solid black;
        }

        .table-pertanyaan{
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
    <div class="content page-break">
        <table style="margin-top:50px; padding:20px; border: none; padding-bottom: 0px;">
            <tr style=" background-color: white;">
                <td style="border: none;">1</td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
            </tr>
            <tr style=" background-color: white;">
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border: none;">
                    <img style="width: 150px; text-align:right; display:inline;"
                        src="{{ public_path('img/AP2.png') }}" alt="">
                </td>
            </tr>
            <tr style=" background-color: white;">
                <td style="border: none; width: 25%;">
                    <p style="font-size:10px;">BIDANG FASILITAS BANDARA</p>
                    <br>
                    <p style="font-size:10px;">DIVISI ENERGY & POWER SUPPLY</p>
                    <br>
                    <p style="font-size:10px;">DINAS GARDU INDUK</p>
                </td>
                <td class="center" style="border: 1px solid black; width: 50%; font-weight:bold; font-size:15px;">
                    FORM CHECKLIST HARIAN GIS 150Kv BSH
                </td>
                <td style="border: none;">
                    <p style="font-size:10px;">TANGGAL : {{$tanggal}}</p>
                    <br>
                    <p style="font-size:10px;">PUKUL : {{$jam}}</p>
                    <br>
                    <p style="font-size:10px;">SHIFT : </p>
                </td>
            </tr>
        </table>
        <div class="body">
            <div class="table">
                <table class="table-data">
                    <tr>
                        <th class="center table-header" style="width: 10px; border:1px solid black; background-color:#6ac4eb;">NO</th>
                        <th class="center table-header" colspan="2" style="width: 30px; border:1px solid black; background-color:#6ac4eb;">KOMPONEN YANG DIPERIKSA</th>
                        <th class="center table-header" style="width:73%; border:1px solid black; background-color:#6ac4eb;">KONDISI PERALATAN</th>
                    </tr>
                    <tr>
                        <td class="center table-header" colspan="4" style="border:1px solid black;"></td>
                    </tr>
                    <tr>
                        <td class="center table-header" style="width: 5%; border:1px solid black; background-color:#6ac4eb;">A</td>
                        <td class="center table-header" colspan="2" style="widtd: 30%; border:1px solid black; background-color:#6ac4eb;s">KONDISI LINGKUNGAN</td>
                        <td class="center table-header" style="border:1px solid black;"></td>
                    </tr>
                    @foreach ( $formHmvGisAHarians as $key => $item )
                            <tr>
                                <td rowspan="4" style="width: 5%; border:1px solid black; vertical-align:top; font-weight:bold;">
                                    {{$loop->iteration}}
                                </td>
                                <td rowspan="4" style="text-transform: uppercase; width: 10%; border:1px solid black; vertical-align:top; font-weight:bold;">
                                    {{$item->lokasi}}
                                </td>
                                <td style="border:1px solid black;">
                                    SUHU AMBIENT
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->suhu}}
                                </td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">
                                    KELEMBABAN UDARA
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->kelembaban}}
                                </td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">
                                    BENDA ASING
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->benda_asing}}
                                </td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">

                                </td>
                                <td style="border:1px solid black;">

                                </td>
                            </tr>
                    @endforeach
                </table>
                <table class="table-data">
                    <tr>
                        <th class="center table-header" style="width: 10px; border:1px solid black; background-color:#6ac4eb;">B</th>
                        <th class="center table-header" colspan="2" style="width: 30%; border:1px solid black; background-color:#6ac4eb;">KOMPARTEMEN BAY 150KV</th>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            <th colspan="2" class="center table-header" style="width: 5%; border:1px solid black; background-color:yellow;">{{$item->name}}</th>
                        @endforeach
                        <th class="center table-header" rowspan="2" style="width: 20%; border:1px solid black; background-color: yellow;">KETERANGAN</th>
                    </tr>
                    <tr>
                        <td rowspan="6" style="width: 5%; border:1px solid black; vertical-align:top; font-weight:bold;">
                            1
                        </td>
                        <td colspan="2" style="border:1px solid black; font-weight:bold;">
                            MANOMETER
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            <td style="border:1px solid black; font-weight:bold;">
                                Q1
                            </td>
                            <td style="border:1px solid black; font-weight:bold;">
                                Q2
                            </td>
                        @endforeach

                    </tr>
                    <tr>

                        <td style="border:1px solid black; font-weight:bold; width:10%;">
                            (BAR/20 &deg; C)
                        </td>
                        <td style="border:1px solid black;">
                            PMS BUS
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            <td style="border:1px solid black;">
                                {{$item->pms_bus_q1}}
                            </td>
                            <td style="border:1px solid black;">
                                {{$item->pms_bus_q2}}
                            </td>
                        @endforeach
                        <td rowspan="19" style="border:1px solid black; vertical-align:top;">
                            {{$formHmvGisAHarians[0]->keterangan}}
                        </td>
                    </tr>
                    <tr>

                        <td style="border:1px solid black; font-weight:bold;">
                            Tekanan Gas SF6
                        </td>
                        <td style="border:1px solid black;">
                            PMT
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            {{-- <td colspan="2" style="border:1px solid black;">
                                {{$item->pmt}}
                            </td> --}}
                            {{-- BUS VT --}}
                            @if ($item->name == 'BUS VT')
                                <td colspan="2" style="border:1px solid black; background-color:black;">
                                    {{$item->pmt}}
                                </td>
                            @else
                                <td colspan="2" style="border:1px solid black;">
                                    {{$item->pmt}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td rowspan="3" style="border:1px solid black;">

                        </td>
                        <td style="border:1px solid black;">
                            Ceiling End
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            {{-- <td colspan="2" style="border:1px solid black;">
                                {{$item->ceiling_end}}
                            </td> --}}
                            @if ($item->name == 'BUS VT' || $item->name == 'COUPLER')
                                <td colspan="2" style="border:1px solid black; background-color:black;">
                                    {{$item->ceiling_end}}
                                </td>
                            @else
                                <td colspan="2" style="border:1px solid black;">
                                    {{$item->ceiling_end}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            VT LINE
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            {{-- <td colspan="2" style="border:1px solid black;">
                                {{$item->vt_line}}
                            </td> --}}
                            @if ( $item->name == 'BUS VT' ||
                                    $item->name == 'COUPLER' ||
                                    $item->name == 'OUT 3' ||
                                    $item->name == 'OUT 2' ||
                                    $item->name == 'OUT 1'
                                 )
                                <td colspan="2" style="border:1px solid black; background-color:black;">
                                    {{$item->vt_line}}
                                </td>
                            @else
                                <td colspan="2" style="border:1px solid black;">
                                    {{$item->vt_line}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            ABNORMAL
                        </td>
                        <td colspan="14" style="border:1px solid black;">
                            {{$item->abnormal}}
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="10" style="width: 5%; border:1px solid black; vertical-align:top; font-weight:bold;">
                            2
                        </td>
                        <td style="border:1px solid black; font-weight:bold;">
                            POSISI (OPEN / CLOSE)
                        </td>
                        <td style="border:1px solid black;">
                            PMS BUS
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            <td colspan="2" style="border:1px solid black;">
                                {{$item->posisi_pms_bus}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black; font-weight:bold;">
                            Open - O
                        </td>
                        <td style="border:1px solid black;">
                            PMT
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            <td colspan="2" style="border:1px solid black;">
                                {{$item->posisi_pmt}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td rowspan="5" style="border:1px solid black; font-weight:bold; vertical-align:top;">
                            Close = C
                        </td>
                        <td rowspan="3" style="border:1px solid black;">
                            COUNTER PMT
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            <td colspan="2" style="border:1px solid black;">
                                R {{$item->counter_r}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            <td colspan="2" style="border:1px solid black;">
                                S {{$item->counter_s}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            <td colspan="2" style="border:1px solid black;">
                                T {{$item->counter_t}}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            PMS LINE
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            {{-- <td colspan="2" style="border:1px solid black;">
                                {{$item->posisi_pms_line}}
                            </td> --}}
                            @if ( $item->name == 'BUS VT' ||
                                    $item->name == 'COUPLER' ||
                                    $item->name == 'OUT 3' ||
                                    $item->name == 'OUT 2' ||
                                    $item->name == 'OUT 1'
                                 )
                                <td colspan="2" style="border:1px solid black; background-color:black;">
                                    {{$item->posisi_pms_line}}
                                </td>
                            @else
                                <td colspan="2" style="border:1px solid black;">
                                    {{$item->posisi_pms_line}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            EARTHING BUSBAR
                        </td>
                        <td colspan="3" style="border:1px solid black; text-align:center; font-weight:bold;" class="center">
                            Q 15
                        </td>
                        <td colspan="3" style="border:1px solid black;">
                            {{$formHmvGisAHarians[0]->posisi}}
                        </td>
                        <td colspan="3" style="border:1px solid black; text-align:center; font-weight:bold;" class="center">
                            Q 25
                        </td>
                        <td colspan="3" style="border:1px solid black;">
                            {{$formHmvGisAHarians[1]->posisi}}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center; border:1px solid black; font-weight:bold;">
                            Q51 & Q52
                        </td>
                        <td style="border:1px solid black;">
                            EARTHING PMT
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            {{-- <td colspan="2" style="border:1px solid black;">
                                {{$item->earhing_pmt}}
                            </td> --}}
                            @if ( $item->name == 'BUS VT' )
                                <td colspan="2" style="border:1px solid black; background-color:black;">
                                    {{$item->earhing_pmt}}
                                </td>
                            @else
                                <td colspan="2" style="border:1px solid black;">
                                    {{$item->earhing_pmt}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td class="center" style="text-align:center; border:1px solid black; font-weight:bold;">
                            Q8
                        </td>
                        <td style="border:1px solid black;">
                            EARTHING LINE
                        </td>
                        @foreach ( $formHmvGisBHarians as $key => $item )
                            {{-- <td colspan="2" style="border:1px solid black;">
                                {{$item->earhing_line}}
                            </td> --}}
                            @if ( $item->name == 'BUS VT' ||
                                    $item->name == 'COUPLER' ||
                                    $item->name == 'OUT 3' ||
                                    $item->name == 'OUT 2' ||
                                    $item->name == 'OUT 1'
                                 )
                                <td colspan="2" style="border:1px solid black; background-color:black;">
                                    {{$item->earhing_line}}
                                </td>
                            @else
                                <td colspan="2" style="border:1px solid black;">
                                    {{$item->earhing_line}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="16" style="border:1px solid black;">

                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="center" style="width: 5%; border:1px solid black;">
                            3
                        </td>
                        <td rowspan="3" style="border:1px solid black;">
                            STATUS AC/DC
                        </td>
                        <td style="border:1px solid black;">
                            DC HEALTH 110V
                        </td>
                        <td colspan="7" style="border:1px solid black;">
                            Rectifier 1 {{$formHmvGisAHarians[0]->status_110}} Volt
                        </td>
                        <td colspan="7" style="border:1px solid black;">
                            Rectifier 2 {{$formHmvGisAHarians[1]->status_110}} Volt
                        </td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            DC HEALTH 48V
                        </td>
                        <td colspan="7" style="border:1px solid black;">
                            Rectifier 1 {{$formHmvGisAHarians[0]->status_48}} Volt
                        </td>
                        <td colspan="7" style="border:1px solid black;">
                            Rectifier 2 {{$formHmvGisAHarians[1]->status_48}} Volt
                        </td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            LOCAL / REMOTE
                        </td>
                        <td colspan="7" style="border:1px solid black;">
                            {{$formHmvGisAHarians[0]->local_remote}}
                        </td>
                        <td colspan="7" style="border:1px solid black;">
                            {{$formHmvGisAHarians[1]->local_remote}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="16" style="border:1px solid black;"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="content">
        <div class="body" style="margin-top:50px;">

            <div class="table">
                <p>2</p>
                <br>
                <table class="table-data">

                    <tr>
                        <th class="center table-header" style="width: 10px; border:1px solid black; background-color:#6ac4eb;">C</th>
                        <th class="center table-header" colspan="2" style="width: 200px; border:1px solid black; background-color:#6ac4eb;">TRAFO 150KV 60MVA</th>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            <th class="center table-header" style="width: 10%; border:1px solid black; background-color:yellow;">{{$item->name}}</th>
                        @endforeach
                        <th class="center table-header" style="width: 20%; border:1px solid black; background-color: yellow;">KETERANGAN</th>
                    </tr>
                    <tr>
                        <td rowspan="5" style="width: 5%; border:1px solid black; vertical-align:top;">
                            1
                        </td>
                        <td style="border:1px solid black;">
                            MINYAK TRAFO
                        </td>
                        <td style="border:1px solid black;">
                            LEVEL
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            <td style="border:1px solid black;">
                                {{ $item->level }}
                            </td>
                        @endforeach
                        <td rowspan="14" style="border:1px solid black; vertical-align:top;">
                            {{$formHmvGisAHarians[1]->keterangan}}
                        </td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            N = NORMAL
                        </td>
                        <td style="border:1px solid black; font-weight:bold; text-align:center; background-color:#6ac4eb;">
                            SUHU
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->suhu }}
                            </td> --}}
                            {{-- TRAFO 1 --}}
                            @if ( $item->name == 'TRAFO 1' || $item->name == 'TRAFO 2' )
                                <td style="border:1px solid black; background-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->suhu}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td rowspan="3" style="border:1px solid black; vertical-align:top;">
                            TN = TIDAK NORMAL
                        </td>
                        <td style="border:1px solid black;">
                            OIL TEMP
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->oil }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->oil}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            WIDING HV
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->hv }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->hv}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            WIDING LV
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->lv }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->lv}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="width: 5%; border:1px solid black; vertical-align:top;">
                            2
                        </td>
                        </td>
                        <td colspan="2" style="border:1px solid black;">
                            POSISI TAP
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->posisi }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->posisi}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="width: 5%; border:1px solid black; vertical-align:top;">
                            3
                        </td>
                        </td>
                        <td colspan="2" style="border:1px solid black;">
                            COUNTER OLTC
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->counter }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->counter}}
                                </td>
                            @endif
                        @endforeach
                    </tr>

                    <tr>
                        <td rowspan="7" style="width: 5%; border:1px solid black; vertical-align:top;">
                            4
                        </td>
                        <td style="border:1px solid black;">
                            PROTEKSI
                        </td>
                        <td style="border:1px solid black;">
                            BUCHOLZ
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->bucholz }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->bucholz}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            N = NORMAL
                        </td>
                        <td style="border:1px solid black;">
                            JANSEN
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->jansen }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->jansen}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td rowspan="5" style="border:1px solid black; vertical-align:top;">
                            TN = TIDAK NORMAL
                        </td>
                        <td style="border:1px solid black;">
                            TERMAL
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->termal }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->termal}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            SUDDEN PRESS
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->sudden }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->sudden}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            FIRE PREVENTION (BAR)
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->fire }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->fire}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            NGR (ARUS)
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->ngr }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->ngr}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td style="border:1px solid black;">
                            DC HEALTH
                        </td>
                        @foreach ( $formHmvGisCHarians as $key => $item )
                            {{-- <td style="border:1px solid black;">
                                {{ $item->dc }}
                            </td> --}}
                            @if ( $item->name == 'OLTC 1' || $item->name == 'OLTC 2' || $item->name == 'TRAFO PS')
                                <td style="border:1px solid black; background-color:#6ac4eb; border-color:#6ac4eb;">
                                    {{-- {{$item->suhu}} --}}
                                </td>
                            @else
                                <td style="border:1px solid black;">
                                    {{$item->dc}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                </table>
                <br>
                <table>
                    <tr>
                        <td style="border:none; background-color:white;">ASSISTANT MANAGER OF HIGH & MEDIUM VOLTAGE STATION</td>
                        <td style="border:none; background-color:white;">Tangerang, <br> PETUGAS DINAS</td>
                    </tr>
                    <tr>
                        <td style="border:none; background-color:white;">
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
